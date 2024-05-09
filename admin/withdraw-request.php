<?php 
include('include/security.php');

if(isset($_POST['btnReject']))
{
  $txtRid= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtRid']), ENT_QUOTES, 'UTF-8');
  $txtRejReason= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtRejReason']), ENT_QUOTES, 'UTF-8');

	$selRecord = $conn->query("select id, user_id, mobile, req_amount from tbl_transaction where status=0 and id=$txtRid");
	
	if($getTranRec = $selRecord->fetch_assoc())
	{
		$sql = "UPDATE tbl_user set cur_balance=cur_balance+".$getTranRec['req_amount']." where id=".$getTranRec['user_id'];
		if ($conn->query($sql) === TRUE) {
			$sqlUp = "UPDATE tbl_transaction set status=2, remark='$txtRejReason' where id=".$getTranRec['id'];
			if ($conn->query($sqlUp) === TRUE) {
				flash( 'fmsg', 'fmsg', 'Request rejected successfully.', 'success', 'TRUE' );
		        header("Location:withdraw-request");
		        exit();
			}
			else
			{
				flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
		        header("Location:withdraw-request");
		        exit();
			}
		}
		else
		{
			flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	        header("Location:withdraw-request");
	        exit();
		}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
        header("Location:withdraw-request");
        exit();
	}

	$conn->close();
}

if(isset($_GET['aid']))
{
	$aid = $_GET['aid'];
  	$selRecord = $conn->query("select id, mobile, req_amount from tbl_transaction where status=0 and id=$aid");
	
	if($getTranRec = $selRecord->fetch_assoc())
	{
		$sqlUp = "UPDATE tbl_transaction set status=1, remark='Withdraw Successful' where id=".$getTranRec['id'];
		if ($conn->query($sqlUp) === TRUE) {
			flash( 'fmsg', 'fmsg', 'Request accepted successfully.', 'success', 'TRUE' );
	        header("Location:withdraw-request");
	        exit();
		}
		else
		{
			flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	        header("Location:withdraw-request");
	        exit();
		}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
        header("Location:withdraw-request");
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
		<title>Withdraw Request | <?php echo $appDetRes['app_name'] ?></title>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Withdraw Request</h5>
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
									   <div class="col-lg-3 mb-2">
    									<form action="" method="post">
    									<label>Download Csv</label>
    		  							<a href="csv1.php" target="_blank" class="btn btn-success">Download</a>
    									  </form>
							        	</div>
										<div class="card card-custom">
											<div class="card-body">
												<div class="table-responsive">
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											                <th>Username</th>
											                <th>Mobile</th>
											                <th>Order Id</th>
											                <th>Payment Id</th>
											                <th>Amount</th>
											                <th>Wallet</th>
											                <th>Account No</th>
											                <th>Date</th>
											                <th>Remark</th>
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

					<div id="myModal" class="modal fade" role="dialog">
				      <div class="modal-dialog">

				        <!-- Modal content-->
				        <div class="modal-content">
				          <div class="modal-header">
				            <h4 class="modal-title">Reject Withdraw Request</h4>
				            <button type="button" class="close" data-dismiss="modal">&times;</button>
				          </div>
				          <div class="modal-body">
				            <form method="post" action="withdraw-request">
				            <input type="hidden" id="txtRid" value="" name="txtRid" >
				            <label>Reject Reason</label>
				            <textarea class="form-control" name="txtRejReason" placeholder="e.g Invalid bank details..." required></textarea>
				          </div>
				          <div class="modal-footer">
				            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            <button type="submit" class="btn btn-danger" name="btnReject">Reject</button>
				            </form>
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
						        "ajax": "data-processing/getWithReq.php",
						        "columnDefs": [{"render": function ( data, type, full, meta ) {
					                     var buttonID = full[0];
					                     var tranStatus = full[10];
					                     if(tranStatus==='0')
					                     {
					                     return '<a href="#" data-rid="'+buttonID+'" class="btn btn-icon btn-danger rejectreq mr-5"><i class="fas fa-times-circle" data-toggle="modal" data-target="#myModal"></i></a>&nbsp;&nbsp;<a href="withdraw-request?aid='+buttonID+'" class="btn btn-icon btn-success mr-5"><i class="far fa-check-circle"></i></a>';
					                 	}
					                 	else if(tranStatus==='1')
					                 	{
					                 		return '<span class="label font-weight-bold label-lg label-light-success label-inline">Approved</span>'
					                 	}
					                 	else if(tranStatus==='2')
					                 	{
					                 		return '<span class="label font-weight-bold label-lg label-light-danger label-inline">Reject</span>'
					                 	}
					                 }, "data": null, "targets": [10]}],
						    } );
						} );
				    </script>
				    <script type="text/javascript">
				        $(document).on("click", ".rejectreq", function () {
				             var myrecordId = $(this).data('rid');
				             $(".modal-body #txtRid").val( myrecordId );
				        });
				    </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>


