<?php 
include('include/security.php');

if(isset($_GET['iaid']))
{
  $iaid = $_GET['iaid'];
  $sql = "UPDATE tbl_user set acc_status='0' where id=$iaid";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Inactive bank detail successfully.', 'success', 'TRUE' );
		header("Location:bank-details-verification");
		exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:bank-details-verification");
      exit();
	}

	$conn->close();
}

if(isset($_GET['aid']))
{
  $aid = $_GET['aid'];
  $sql = "UPDATE tbl_user set acc_status='1' where id=$aid";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Bank details approved successfully.', 'success', 'TRUE' );
		header("Location:bank-details-verification");
		exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:bank-details-verification");
      exit();
	}

	$conn->close();
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Bank Details Verification | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Record? By deleting this record all associated data are deleted.');
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Bank Details Verification</h5>
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
											<div class="table-responsive">
											<div class="card-body">
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											                <th>Username</th>
											                <th>Account Name</th>
											                <th>Account Number</th>
											                <th>IFSC</th>
											                <th>PAN No</th>
											                <th>Proof</th>
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
					<!--end::Content-->

					<!-- Modal-->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <div class="modal-dialog" role="document">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h5 class="modal-title" id="exampleModalLabel">Bank Proof</h5>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <i aria-hidden="true" class="ki ki-close"></i>
					                </button>
					            </div>
					            <div class="modal-body">
			            			<div style="overflow: auto;">
			                			<img src="" id="proofimg">
			            			</div>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					            </div>
					        </div>
					    </div>
					</div>

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
						        "ajax": "data-processing/getBankDet.php",
						        "columnDefs": [{"render": function ( data, type, full, meta ) {
				                     var bStatus = full[7];
				                     var bdid = full[0];
				                     if(bStatus==='1'){
				                     	return '<a href="bank-details-verification?iaid='+bdid+'"><span class="label font-weight-bold label-lg label-light-success label-inline">Active</span></a>';
				                     }
				                     else if(bStatus==='0')
				                     {
				                     	return '<a href="bank-details-verification?aid='+bdid+'"><span class="label font-weight-bold label-lg label-light-danger label-inline">Inactive</span></a>';
				                     }
				                 }, "data": null, "targets": [7]},{"render": function ( data, type, full, meta ) {
				                     var proofpath = full[6];
				                     if(proofpath===''|proofpath===null){
				                     	return '<img src="media/no-preview.png" class="img-responsive" width=100 height="100"/>';
				                     }
				                     else
				                     {
				                     	return '<img src="'+proofpath+'" class="img-responsive viewProof" width=100 height="100" data-imgpath="'+proofpath+'" data-toggle="modal" data-target="#exampleModal"/>';
				                     }
				                 }, "data": null, "targets": [6]}],
						    } );
						} );
				    </script>
				    <script type="text/javascript">
				        $(document).on("click", ".viewProof", function () {
				             var imgpath = $(this).data('imgpath');
				             $(".modal-body #proofimg").attr("src",imgpath);
				        });
				    </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>