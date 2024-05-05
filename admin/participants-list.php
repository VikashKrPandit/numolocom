<?php 
include('include/security.php');

if(isset($_GET['contestId']))
{
  	$contestId = $_GET['contestId'];
	$getQuery = $conn->query("select * from tbl_contest where id=$contestId"); 
	$getResult = $getQuery->fetch_assoc();
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Participants List</title>
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
					<?php if(isset($_GET['contestId'])) { ?>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Participants List - Contest #<?php echo $getResult['id']; ?> (<?php echo date('d/m/Y', $getResult['start_time']); ?> - <?php echo date('d/m/Y', $getResult['end_time']); ?>)</h5>
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
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											            	<th>User</th>
											                <th>Date</th>
											                <th>Ticket</th>
											                <th>Contest Fee</th>
											                <th>Won Prize</th>
											                <th>Entry Type</th>
											                <th>Status</th>
											            </tr>
											        </thead>
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
					    <div class="alert-text">Please select <a href="create-contest" class="alert-link">contest</a> first!</div>
					</div>
					<?php } ?>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
					<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/crud/datatables/data-sources/ajax-server-side.js"></script>
		<script type="text/javascript">
	    	$(document).ready(function() {
			    $('#example').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": {
			            "url": "data-processing/getParticipants.php?conid=<?php echo $contestId; ?>",
			        },
	                 "columnDefs": [{"render": function ( data, type, full, meta ) {
	                     var pType = full[6];
	                     if(pType==='0'){
	                     	return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Genuine</span>';
	                     }
	                     else if(pType==='1')
	                     {
	                     	return '<span class="label font-weight-bold label-lg label-light-warning label-inline">Dummy</span>';
	                     }
	                 }, "data": null, "targets": [6]},{"render": function ( data, type, full, meta ) {
	                     var pStatus = full[7];
	                     var cStatus = full[8];
	                     if(pStatus==='0'){
	                     	if(cStatus==='4'){
	                     		return '<span class="label label-danger label-pill label-inline mr-2">Lose</span>';
	                     	}
	                     	else
	                     	{
	                     		return '<span class="label label-warning label-pill label-inline mr-2">Pending</span>'
	                     	}
	                     }
	                     else if(pStatus==='1')
	                     {
	                     	return '<span class="label label-success label-pill label-inline mr-2">Won</span>';
	                     }
	                     else if(pStatus==='2')
	                     {
	                     	return '<span class="label label-danger label-pill label-inline mr-2">Lose</span>';
	                     }
	                 }, "data": null, "targets": [7]}],
			    });
			} );
	    </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>