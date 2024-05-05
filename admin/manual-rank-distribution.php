<?php 
include('include/security.php');

if(isset($_GET['contestId'])&isset($_GET['fid']))
{
	$contestId = $_GET['contestId'];
	$fid = $_GET['fid'];
	$verifyConQry = $conn->query("select * from tbl_contest where id='$contestId' and status=3");
	$verifyRes = $verifyConQry->fetch_assoc();
	
	if($verifyRes['status']!=3)
	{
		flash( 'fmsg', 'fmsg', 'Contest is not finished yet!', 'danger', 'TRUE' );
		header("Location:create-contest");
		exit();
	}
	else
	{
		// $getConManQry = $conn->query("select p.*, u.username, u.email, u.mobile from tbl_participants p left join tbl_user u on u.username=p.username where p.contest_id=$contestId and p.fees_id=$fid and p.status=0"); 
		$getConManQry = $conn->query("select p.* from tbl_participants p where p.contest_id=$contestId and p.fees_id=$fid and p.status=0"); 
		$getManRankStatus = $conn->query("select id from tbl_participants where contest_id=$contestId and fees_id=$fid and res_type=0");
		$resManRankStatus = $getManRankStatus->num_rows;
		// and p.status=0	

		$selRank = $conn->query("select rank_from, rank_to, prize from prizepool_master where fees_id=$fid and distri_type=0");
		$array = array();

		while($rankRes = $selRank->fetch_assoc()) {
			foreach(range($rankRes['rank_from'], $rankRes['rank_to']) as $i) {
			    $array[] = $i.'.'.$rankRes['prize'];
			}
		}

	}

	/*submit winner*/
	if(isset($_POST['btnSubmit'])){

    	$txtPid = $_POST['txtPid'];
    	$dropRank = $_POST['dropRank'];

    	$finalPartiId1 = array_unique($txtPid);
    	$finalPartiId = array_values($finalPartiId1);
		
		for($i=0;$i<count($finalPartiId);$i++)
	    {
	        $p_id = $finalPartiId[$i];
	        $getUser = $conn->query("select username, status from tbl_participants where id=$p_id");
			$getUserRes = $getUser->fetch_assoc();
			if($getUserRes['status']==0)
			{
				$rank = substr($dropRank[$i], 0, strpos($dropRank[$i], "."));
				$prize = substr($dropRank[$i], strpos($dropRank[$i], ".") + 1);
				$resultTime = time();
				$upParti = $conn->query("update tbl_participants set win_prize=$prize, rank=$rank, status=1, result_time='$resultTime', res_type=0 where id=$p_id");
				$upUserWallet = $conn->query("update tbl_user set cur_balance=cur_balance+$prize, won_balance=won_balance+$prize where username='".$getUserRes['username']."'");
				// $insTran = $conn->query("insert into tbl_transaction (order_id, req_amount, remark, type, status, date)");
			}
		}

		$upContestManFlag = $conn->query("update tbl_contest set man_result_flag=1 where id=".$contestId);
		
		$conn->close();
		
		flash( 'fmsg', 'fmsg', 'Manual distribution successfully set. now you can distribute automatic(random) prize ', 'success', 'TRUE' );
		header("Location:manual-rank-distribution?fid=$fid&contestId=$contestId");
		exit();
	}
	/*submit winner end*/

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
		<title>Manual rank distribution | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Manual rank distribution</h5>
									<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
										<li class="breadcrumb-item">
											<a href="create-contest" class="text-muted">Contest</a>
										</li>
										<li class="breadcrumb-item">
											<a href="generate-result?contestId=<?php echo $contestId; ?>" class="text-muted">Generate Result</a>
										</li>
										<li class="breadcrumb-item">
											<a href="manual-rank?contestId=<?php echo $contestId; ?>" class="text-muted">Manual Rank</a>
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
									<div class="col-xl-12">
										<form method="post" action="manual-rank-distribution?fid=<?php echo $fid; ?>&contestId=<?php echo $contestId; ?>">
											<div class="card card-custom gutter-b">
												<div class="card-header flex-wrap py-3">
													<div class="card-title">
														<h3 class="card-label">Participants List
														<span class="d-block text-muted pt-2 font-size-sm">Make sure you don't give same rank to multiple participants.</span></h3>
													</div>
													<div class="card-toolbar">
														<!--begin::Button-->
														<?php if($resManRankStatus==0) {?>
														<button class="btn btn-primary font-weight-bolder" type="submit" name="btnSubmit">
														<span class="svg-icon svg-icon-md">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<circle fill="#000000" cx="9" cy="15" r="6" />
																	<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>Submit</button>
														<?php } ?>
														<!--end::Button-->
													</div>
												</div>
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-bordered" id="example">
															<thead>
																<tr>
																	<th>User</th>
																	<th>Entry Type</th>
																	<th>Ticket</th>
																	<th>Contest Price</th>
																	<th>Won Prize</th>
																	<th>Rank</th>
																	<th>Status</th>
																	<th>Select Rank</th>
																</tr>
															</thead>
															<tbody>
																<?php while($manConRes = $getConManQry->fetch_assoc()) { ?>
																<tr>
																	<input type="hidden" name="txtPid[]" value="<?php echo $manConRes['id']; ?>" />
																	<td><?php echo $manConRes['username']; ?> </td>
																	<td>
																		<?php if($manConRes['is_dummy']==0) { ?>
																		<span class="label font-weight-bold label-lg label-light-primary label-inline">Genuine</span>
																		<?php } else { ?>
																		<span class="label font-weight-bold label-lg label-light-warning label-inline">Dummy</span>
																		<?php } ?>
																	</td>
																	<td><?php echo $manConRes['ticket_no']; ?></td>
																	<td><?php echo $manConRes['entry_fee']; ?></td>
																	<td><?php echo $manConRes['win_prize']; ?></td>
																	<td><?php if($manConRes['rank']==0) { ?>-<?php } else { echo $manConRes['rank']; }?></td>
																	<td><?php if($manConRes['status']==0) { echo '-'; } elseif($manConRes['status']==1) { echo 'Won'; } elseif($manConRes['status']==2) { echo 'Lose'; } ?></td>
																	<td nowrap="nowrap">
																		<select name="dropRank[]" class="form-control">
																			<option value="
																			0"> - </option>
																			<?php foreach ($array as $key => $value) { ?>
																			<option value="<?php echo $value; ?>" <?php $selVal=$manConRes['rank'].'.'.$manConRes['win_prize']; if($selVal==$value) { echo 'selected'; }?> ><?php echo substr($value, 0, strpos($value, ".")); ?></option>
																			<?php } ?>
																		</select>
																	</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
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
					<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
					<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
						    $('#example').DataTable();
						} );
					</script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>