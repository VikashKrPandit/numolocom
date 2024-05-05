<?php 
include('include/security.php');

if(isset($_GET['contestId']))
{
	$contestId = $_GET['contestId'];
	$verifyConQry = $conn->query("select * from tbl_contest where id='$contestId' and status=3");
	$verifyRes = $verifyConQry->fetch_assoc();
	
	if($verifyRes['status']==1 | $verifyRes['status']==2)
	{
		flash( 'fmsg', 'fmsg', 'Contest is not finished yet!', 'danger', 'TRUE' );
		header("Location:create-contest");
		exit();
	}
	else
	{
		/*rank distribution*/
		if(isset($_POST['btnAutoRank']))
		{
			$txtConId = $_POST['txtConId'];

			$conn -> autocommit(FALSE);
			try 
			{
				$conn->begin_transaction();
				$getFeesId = $conn->query("select distinct(fees_id) as dfid from tbl_participants where contest_id=$txtConId");
				while ($getFeesIdRes = $getFeesId->fetch_assoc())
				{
					$feesId = $getFeesIdRes['dfid'];
					$getPPId = $conn->query("select * from prizepool_master where fees_id=$feesId and distri_type=1");
					while ($getppIdRes = $getPPId->fetch_assoc())
					{
						$ppId = $getppIdRes['id'];
						$disPer = $getppIdRes['distri_percentage'];
						$prize = $getppIdRes['prize'];
						$rank = range($getppIdRes['rank_from'],$getppIdRes['rank_to']);

						$participants = $conn->query("select * from tbl_participants where contest_id=$txtConId and status=0 and is_dummy=0 and fees_id=$feesId and res_type is null");
						$row_cnt = $participants->num_rows;
						$calTotParti = $disPer*$row_cnt/100;
						$calTotParti = floor($calTotParti);
						$resTime = time();
						// echo"<script>alert(\"working $disPer*$row_cnt/100\");</script>";

						if($calTotParti > 0)
						{
							$selFinParti = $conn->query("select DISTINCT(id), username from tbl_participants where contest_id=$txtConId and fees_id=$feesId and status=0 and is_dummy=0 and res_type is null ORDER BY RAND() LIMIT $calTotParti");
							$i=0;
							while ($getFinParti = $selFinParti->fetch_assoc())
							{
								$conn->query("update tbl_participants set win_prize=".$prize.", rank=".$rank[$i].", status=1, result_time='".$resTime."', res_type=1 where id=".$getFinParti['id']. " and win_prize=0 and fees_id=$feesId");
								
								$upUserWallet = $conn->query("update tbl_user set cur_balance=cur_balance+$prize, won_balance=won_balance+$prize where username='".$getFinParti['username']."'");
								
								$i++;
							}
						}
						// echo"<script>alert(\"total parti: $calTotParti\");</script>";
					}
				}

				$upContestManFlag = $conn->query("update tbl_contest set status=4, auto_result_flag=1 where id=".$txtConId);

				$conn->commit();
			}
			catch (\Throwable $e) {
			    // An exception has been thrown
			    // We must rollback the transaction
			    $conn->rollback();
			    throw $e; // but the error must be handled anyway
			}

			flash( 'fmsg', 'fmsg', 'Rank distribution is completed and marked this contest as completed.', 'success', 'TRUE' );
			header("Location:create-contest");
			exit();
		}
		/*rank distribution end*/
	}
	$conn->close();
}
else
{
	flash( 'fmsg', 'fmsg', 'You may broken something!', 'warning', 'TRUE' );
	header("Location:create-contest");
	exit();
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Generate Result | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Record? By deleting this record all associated data are deleted.');
	      }
	    </script>
	    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include('include/mobile-header.php'); ?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<?php include('include/sidebar.php'); ?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?php include('include/topbar.php'); ?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Generate Result</h5>
									<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
										<li class="breadcrumb-item">
											<a href="create-contest" class="text-muted">Contest</a>
										</li>
									</ul>
									<!--end::Page Title-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Daterange-->
									<a href="#" class="btn btn-sm btn-light font-weight-bold mr-2">
										<span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
										<span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date"><?php echo date("F j, Y, g:i a"); ?></span>
									</a>
									<!--end::Daterange-->
									<!--begin::Dropdowns-->
									
									<!--end::Dropdowns-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<?php flash( 'fmsg' ); ?>
								
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<!--begin::Engage Widget 7-->
										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 p-12 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start" style="background-color: #FFF4DE; background-position: right bottom; background-size: auto 100%; background-image: url(assets/media/svg/humans/custom-8.svg)">
													<h4 class="text-danger font-weight-bolder m-0">Manual Rank Distribution</h4>
													<p class="text-dark-50 my-5 font-size-xl font-weight-bold">
														<ul>
															<li>Once the auto result is calculated, you can not able to make it reverse.</li>
															<li>Not allow to give manual rank after auto Rank.</li>
															<li>Click below button (Manual Rank) to give manual rank.</li>
														</ul>
													</p>
													<?php if($verifyRes['status']==3) { ?>
													<a href="manual-rank.php?contestId=<?php echo $contestId; ?>" class="btn btn-danger font-weight-bold py-2 px-6">Manual Rank</a>
													<?php } else { ?>
													<button disabled class="btn btn-danger font-weight-bold py-2 px-6">Manual Rank</button>
													<?php } ?>
												</div>
											</div>
										</div>
										<!--end::Engage Widget 7-->
										<!--end::Card-->
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 p-20 pb-10 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #1B283F; background-position: calc(100% + 0.5rem) bottom; background-size: 20% auto; background-image: url(assets/media/svg/humans/custom-10.svg)">
													<h2 class="text-white font-weight-bolder">Automatic(Random) Rank Distribution</h2>
													<p class="text-muted mb-2 pb-5 font-size-h5">
														<ul class="text-white">
															<li>Make sure you have announced manual rank to user (1st, 2nd, etc.)</li>
															<li>It will take time, do not refresh the page or close browser</li>
															<li>If 'Auto Rank' button is disable, then you have not given any manual rank.</li>
														</ul>
													</p>
													<?php if($verifyRes['status']==3) { ?>
													<form action="generate-result?contestId=<?php echo $contestId; ?>" method="post">
														<input type="hidden" name="txtConId" value="<?php echo $contestId; ?>">
														<button <?php if($verifyRes['man_result_flag']==1) { ?>type="submit" name="btnAutoRank" <?php } else { ?>disabled <?php } ?> class="btn btn-danger font-weight-bold py-2 mt-3 px-6">Auto Rank</button>
													</form>
													<?php } else { ?>
														<button disabled class="btn btn-danger font-weight-bold py-2 mt-3 px-6">Auto Rank</button>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>