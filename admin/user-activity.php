<?php 
include('include/security.php');

if(isset($_GET['usrid']))
{
	$usrid = $_GET['usrid'];
	$usrPartiQuery = $conn->query("select p.*, c.status as cstatus from tbl_participants as p left join tbl_contest as c on c.id=p.contest_id where username='$usrid' order by id desc");
	$conn->close();
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
		<title><?php echo $_GET['usrid']; ?>'s activity | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkUserIn(){
	          return confirm('Are you sure you want to inactive this user?');
	      }
	      function checkUserAc(){
	          return confirm('Are you sure you want to Active this user?');
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
												<div class="table-responsive">
													<table class="table table-hover">
												        <thead>
												            <tr>
												                <th>Contest ID</th>
												                <th>Date</th>
												                <th>Ticket</th>
												                <th>Contest Fee</th>
												                <th>Won Prize</th>
												                <th>Status</th>
												            </tr>
												        </thead>
												        <tbody>
												        	<?php while($selres = $usrPartiQuery->fetch_assoc()){ ?>
												        		<tr>
														        	<td><?php echo $selres['contest_id']; ?></td>
														        	<td><?php echo date('d-m-Y H:i:s', $selres['date_created']); ?></td>
														        	<td><?php echo $selres['ticket_no']; ?></td>
														        	<td><?php echo $selres['entry_fee']; ?></td>
														        	<td><?php echo $selres['win_prize']; ?></td>
														        	<td><?php if($selres['status']==0) { ?>
															        		<?php if($selres['cstatus']==4) { ?>
															        		<span class="label font-weight-bold label-lg label-light-danger label-inline">Lose</span>
															        		<?php } else { ?>
															        		<span class="label font-weight-bold label-lg label-light-warning label-inline">Pending</span>
															        		<?php } ?>
														        		<?php } elseif($selres['status']==1) { ?><span class="label font-weight-bold label-lg label-light-success label-inline">Won</span>
														        		<?php } if($selres['status']==2) { ?><span class="label font-weight-bold label-lg label-light-danger label-inline">Lose</span>
														        		<?php } ?>
														        	</td>
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