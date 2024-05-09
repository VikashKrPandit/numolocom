<?php 
include('include/security.php');
ob_start();
if(isset($_GET['usrid']))
{
	$usrid = $_GET['usrid'];
	$usrPartiQuery = $conn->query("select won_balance,bonus_balance from tbl_user where id='$usrid'");
	//$conn->close();
}
else
{
	flash( 'fmsg', 'fmsg', 'You may broken something!', 'warning', 'TRUE' );
	header("Location:user");
	exit();
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title><?php echo $_GET['usrid']; ?>'s activity | <?php // echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php echo $_GET['usrid']; ?>'s activity</h5>
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
										<div class="card card-custom">
											<div class="card-body">
												<?php $selres = $usrPartiQuery->fetch_assoc(); ?>
											
													<div class="row">
														<div class="col-md-5">
															<div class="form-group" >
																<form method="post" action="">
																<label for="usr">Won Balance:<?php echo $selres['won_balance']; ?></label>
																<input type="number" name="wonbal" class="form-control" id="wonbal" value="" required>
																<input type="submit" value="-" name="won_minus" class="btn btn-danger">
																<input type="submit" value="+" name="won_plus" class="btn btn-success pull-right">
																</form>
															</div>
														</div>
														<div class="col-md-5">
														<div class="form-group">
														<form method="post" action="">
															<label for="usr">Bonus Balance:<?php echo $selres['bonus_balance']; ?></label>
															<input type="number" name="bonbal" class="form-control" id="bonusbal" value="" required>
															<input type="submit" value="-" name="bonus_minus" class="btn btn-danger">
															<input type="submit" value="+" name="bonus_plus" class="btn btn-success">
														</form>
														</div>
														</div>
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
					<!--end::Page Vendors-->
					<!--begin::Page Scripts(used by this page)-->
					<script src="assets/js/pages/crud/ktdatatable/base/html-table.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>


<?php
$won_blnce = $selres['won_balance'];
$bon_blnce = $selres['bonus_balance'];
if(isset($_POST['won_minus']) && !empty($_POST['wonbal']) ){
	$wonbal1=$_POST['wonbal'];
	$new_won1 = $won_blnce-$wonbal1;
	$conn->query("update tbl_user set won_balance=$new_won1 where id='$usrid'");
	if($conn->affected_rows > 0){
		flash( 'fmsg', 'fmsg', $wonbal1.' subtracted!', 'danger', 'TRUE' );
		refreshPage($usrid);
	}
}
else if(isset($_POST['won_plus']) && !empty($_POST['wonbal'])){
	$wonbal2=$_POST['wonbal'];
	$new_won2 = $won_blnce+$wonbal2;
	//echo "update tbl_user set won_balance=$new_won2 where id='$usrid'";
	$conn->query("update tbl_user set won_balance='$new_won2' where id='$usrid'");
	if($conn->affected_rows > 0){
		flash( 'fmsg', 'fmsg', $wonbal2.' added!', 'success', 'TRUE' );
		refreshPage($usrid);
	}
}
else if(isset($_POST['bonus_minus'])&& !empty($_POST['bonbal'])){
	$bonbal1=$_POST['bonbal'];
	$new_bon1 = $bon_blnce-$bonbal1;
	//echo "update tbl_user set won_balance=$new_won2 where id='$usrid'";
	$conn->query("update tbl_user set bonus_balance='$new_bon1' where id='$usrid'");
	if($conn->affected_rows > 0){
		flash( 'fmsg', 'fmsg', $bonbal1.' subtracted!', 'danger', 'TRUE' );
		refreshPage($usrid);
	}
}
else if(isset($_POST['bonus_plus'])&& !empty($_POST['bonbal'])){
	$bonbal2=$_POST['bonbal'];
	$new_bon2 = $bon_blnce+$bonbal2;
	//echo "update tbl_user set won_balance=$new_won2 where id='$usrid'";
	$conn->query("update tbl_user set bonus_balance='$new_bon2' where id='$usrid'");
	if($conn->affected_rows > 0){
		flash( 'fmsg', 'fmsg', $bonbal2.' added!', 'success', 'TRUE' );
		refreshPage($usrid);
	}
}

function refreshPage($usrid){
	header("Location:user_won_bonus_update.php?usrid={$usrid}");
	exit();
}
ob_end_flush();
?>