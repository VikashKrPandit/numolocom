<?php 
include('include/security.php');

if(isset($_GET['fid']))
{
  	$fid = $_GET['fid'];

  	$getPPdata = $conn->query("select * from prizepool_master where fees_id=$fid");
  	$getFdata = $conn->query("select * from fees_master where id=$fid");
	$getFdataRes = $getFdata->fetch_assoc();
}

$upQueryAcc = $conn->query("select count(*) as livecontest from tbl_contest where status in (2,3)");
$upQueryAccRes = $upQueryAcc->fetch_assoc();

if(isset($_POST['btnSave']))
{
	if($upQueryAccRes['livecontest'] >=0)
  	{
  		$totPrizepool = $conn->query("select count(id) as totPP from prizepool_master where fees_id=$fid");
  		$totPrizepoolRes = $totPrizepool->fetch_assoc();

  		if($totPrizepoolRes['totPP'] < $getFdataRes['no_of_winners'])
  		{
			$txtRank= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtRank']), ENT_QUOTES, 'UTF-8');
			$txtPrize= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPrize']), ENT_QUOTES, 'UTF-8');

			$sql = "INSERT INTO prizepool_master (fees_id, rank, prize) VALUES ($fid, $txtRank, $txtPrize)";

			if ($conn->query($sql) === TRUE) {
				flash( 'fmsg', 'fmsg', 'Record added successfully.', 'success', 'TRUE' );
			    header("Location:prizepool-master?fid=".$fid);
			    exit();
			} else {
			  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
			  header("Location:prizepool-master?fid=".$fid);
			  exit();
			}
		}
		else
		{
			flash( 'fmsg', 'fmsg', 'You must change total number of winner in fees master to add more prize.', 'danger', 'TRUE' );
			header("Location:prizepool-master?fid=".$fid);
			exit();
		}

		$conn->close();
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to add any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:prizepool-master?fid=".$fid);
        exit();
	}
}

if(isset($_GET['fid']) && isset($_GET['uid']))
{
	$fid = $_GET['fid'];
	$uid = $_GET['uid'];
	$getPdata = $conn->query("select * from prizepool_master where id=$uid");
	$getPdataRes = $getPdata->fetch_assoc();

	if(isset($_POST['btnUpdate']))
	{
		if($upQueryAccRes['livecontest'] >=0)
	  	{
			$txtRank= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtRank']), ENT_QUOTES, 'UTF-8');
			$txtPrize= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPrize']), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE prizepool_master SET rank=$txtRank, prize=$txtPrize where id=$uid";

			if ($conn->query($sql) === TRUE) {
				flash( 'fmsg', 'fmsg', 'Record updated successfully.', 'success', 'TRUE' );
			    header("Location:prizepool-master?fid=".$fid);
			    exit();
			} else {
			  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
			  header("Location:prizepool-master?fid=".$fid);
			  exit();
			}

			$conn->close();
		}
		else
		{
			flash( 'fmsg', 'fmsg', 'Not able to add any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
	        header("Location:prizepool-master?fid=".$fid);
	        exit();
		}
	}
}

if(isset($_GET['fid']) && isset($_GET['did']))
{
	$fid = $_GET['fid'];
	$did = $_GET['did'];
	
	if($upQueryAccRes['livecontest'] >0)
  	{
		$sql = "DELETE from prizepool_master where id=$did";

		if ($conn->query($sql) === TRUE) {
		  flash( 'fmsg', 'fmsg', 'Record Deleted.', 'success', 'TRUE' );
	      header("Location:prizepool-master?fid=".$fid);
	      exit();
		} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:prizepool-master?fid=".$fid);
	      exit();
		}

		$conn->close();
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to delete any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:prizepool-master?fid=".$fid);
        exit();
	}
}

if(isset($_POST['btnDelete']))
{
	if($upQueryAccRes['livecontest']==0)
  	{
		$txtFid = mysqli_real_escape_string($conn,$_POST['txtFid']);
		$txtFPrc = mysqli_real_escape_string($conn,$_POST['txtFPrc']);
		$sql = "DELETE from prizepool_master where fees_id=$txtFid";

		if ($conn->query($sql) === TRUE) {
		  flash( 'fmsg', 'fmsg', 'All data deleted from '.$txtFPrc.' rupees contest.', 'success', 'TRUE' );
	      header("Location:fees-master");
	      exit();
		} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:prizepool-master?fid=".$txtFid);
	      exit();
		}

		$conn->close();
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to delete any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:prizepool-master?fid=".$fid);
        exit();
	}
}

if(isset($_POST['btnAddParti']))
{
	$txtFid = mysqli_real_escape_string($conn,$_POST['txtFid']);
	$txtPrizepool = mysqli_real_escape_string($conn,$_POST['txtPrizepool']);
	$txtNoParti = mysqli_real_escape_string($conn,$_POST['txtNoParti']);
	$txtFees = mysqli_real_escape_string($conn,$_POST['txtFees']);
	$txtDate = time();
	
	function generateRandomString($length = 8) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	$getLiveContest = $conn->query("select * from tbl_contest where status=2 limit 1");
	$row_cnt = $getLiveContest->num_rows;
	$liveContestRes = $getLiveContest->fetch_assoc();
	
	if($row_cnt==0)
	{
		flash( 'fmsg', 'fmsg', 'There is no live contest', 'danger', 'TRUE' );
	    header("Location:prizepool-master?fid=".$fid);
	    exit();
	}
	else
	{
		for($i=0;$i<$txtNoParti;$i++)
		{
			$ticketNo = generateRandomString();
			$insParti = "INSERT INTO tbl_participants (contest_id, fees_id, user_id, entry_fee, date_created, ticket_no, username, is_dummy)
						SELECT ".$liveContestRes['id'].", $txtFid, id, $txtFees, '$txtDate', '$ticketNo', username, 1 
						FROM tbl_user
						WHERE is_dummy=1
						ORDER BY RAND()
						LIMIT 1";
			$conn->query($insParti);	  
		}

		flash( 'fmsg', 'fmsg', $txtNoParti.' participants added successfully.', 'success', 'TRUE' );
	    header("Location:prizepool-master?fid=".$fid);
	    exit();

	    $conn->close();
	}
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Prizepool Master | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Record? By deleting this record all data from this contest are deleted.');
	      }
	    </script>
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
					<?php if(isset($_GET['fid'])) { ?>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Prizepool Master - <?php echo $getFdataRes['price']; ?> Rupees Contest</h5>
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
										<div class="card card-custom">
											<div class="card-header">
												<h3 class="card-title">Add New</h3>
												<form action="prizepool-master?fid=<?php echo $fid; ?>" method="post">
													<input type="hidden" name="txtFid" value="<?php echo $fid; ?>">
													<input type="hidden" name="txtFPrc" value="<?php echo $getFdataRes['price']; ?>">
													<button class="btn btn-light-danger font-weight-bold mr-2 card-title" type="submit" name="btnDelete" id="btnDelete" onclick="return confirm('Are you sure you want to delete this Record? By deleting this record all data from this contest are deleted.')">Delete All</button>
												</form>
											</div>
											<!--begin::Form-->
											<?php if(isset($_GET['fid']) && isset($_GET['uid'])): ?>
											<form class="form" action="prizepool-master.php?uid=<?php echo $_GET['uid']; ?>&fid=<?php echo $_GET['fid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Rank:</label>
															<input type="number" name="txtRank" id="txtRank" class="form-control" required value="<?php echo $getPdataRes['rank']; ?>" />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Prize:</label>
															<input type="number" name="txtPrize" class="form-control" required value="<?php echo $getPdataRes['prize']; ?>" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>&nbsp;</label>
															<button class="btn btn-success form-control" type="submit" name="btnUpdate">Update</button>
														</div>
													</div>
													</div>
												</div>
											</form>
											<?php else: ?>
											<form class="form" action="prizepool-master.php?fid=<?php echo $_GET['fid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Rank:</label>
															<input type="number" name="txtRank" id="txtRank" class="form-control" required />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Prize:</label>
															<input type="number" name="txtPrize" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>&nbsp;</label>
															<button class="btn btn-success form-control" type="submit" name="btnSave">Save</button>
														</div>
													</div>
													</div>
												</div>
											</form>
											<?php endif ?>
											<!--end::Form-->
										</div>
									</div>
								</div>	
								<br>
								<div class="row">
									<div class="col-lg-12">
										<div class="card card-custom">
											<div class="card-body">
												<!--<h3>Total Prize: <?php // echo $getFdataRes['tot_prize']; ?></h3><br>-->
												<div class="table-responsive">
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											            	<th>Range</th>
											                <th>Prize</th>
											                <th>Action</th>
											            </tr>
											        </thead>
											        <tbody>
														<?php while($ppdata = $getPPdata->fetch_assoc()) { ?>
														<tr>
															<td><?php echo $ppdata['id']; ?></td>
															<td><?php echo $ppdata['rank']; ?></td>
															<td><?php echo $ppdata['prize']; ?></td>
															<td><a href="prizepool-master?fid=<?php echo $_GET['fid']; ?>&did=<?php echo $ppdata['id']; ?>" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a> &nbsp;&nbsp;<a href="prizepool-master?fid=<?php echo $_GET['fid']; ?>&uid=<?php echo $ppdata['id']; ?>" class="mr-5" ><i class="far fa-edit"></i></a></td>
														</tr>
														<?php } ?>
													</tbody>
											    </table>
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
					<?php } else { ?>					
					<div class="alert alert-custom alert-warning" role="alert">
					    <div class="alert-icon"><i class="flaticon-warning"></i></div>
					    <div class="alert-text">Please select <a href="fees-master" class="alert-link">contest price</a> first!</div>
					</div>
					<?php } ?>
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