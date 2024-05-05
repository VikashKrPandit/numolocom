<?php 
include('include/security.php');

if(isset($_POST['btnSave']))
{
  $txtFname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtFname']), ENT_QUOTES, 'UTF-8');
  $txtLname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtLname']), ENT_QUOTES, 'UTF-8');
  $txtUname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtUname']), ENT_QUOTES, 'UTF-8');

	$chkUser = $conn->query("select count(*) as usravl from tbl_user where username='$txtUname'");
	$chkUserRes = $chkUser->fetch_assoc();

	if($chkUserRes['usravl']==0)
	{
	  	$sql = "INSERT INTO tbl_user (fname, lname, username, is_dummy)
		VALUES ('$txtFname', '$txtLname', '$txtUname', 1)";

		if ($conn->query($sql) === TRUE) {
			flash( 'fmsg', 'fmsg', 'User added successfully.', 'success', 'TRUE' );
	        header("Location:dummy-user");
	        exit();
		} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:dummy-user");
	      exit();
		}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Already exits!', 'danger', 'TRUE' );
        header("Location:dummy-user");
        exit();
	}


	$conn->close();
}

if(isset($_GET['uid']))
{
  $uid = $_GET['uid'];
  
  $query   = $conn->query("select * from tbl_user where id=$uid"); 
  $result = $query->fetch_assoc();

  if(isset($_POST['btnUpdate']))
	{
		$txtFname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtFname']), ENT_QUOTES, 'UTF-8');
	  	$txtLname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtLname']), ENT_QUOTES, 'UTF-8');
	  	$txtUname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtUname']), ENT_QUOTES, 'UTF-8');

	  	$sql = "UPDATE tbl_user set fname='$txtFname', lname='$txtLname', username='$txtUname' where id=$uid";

		if ($conn->query($sql) === TRUE) {
			flash( 'fmsg', 'fmsg', 'Record update successfully.', 'success', 'TRUE' );
	        header("Location:dummy-user");
	        exit();
		} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:dummy-user");
	      exit();
		}

		$conn->close();
	}

}

if(isset($_GET['did']))
{
  	$did = $_GET['did'];

  	$sql = "DELETE from tbl_user where id=$did";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'User deleted successfully.', 'success', 'TRUE' );
        header("Location:dummy-user");
        exit();
	} else {
		flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
		header("Location:dummy-user");
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
		<title>Manage Dummy User | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Record?');
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Manage Dummy User</h5>
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
											</div>
											<!--begin::Form-->
											<?php if(isset($_GET['uid'])): ?>
											<form class="form" action="dummy-user.php?uid=<?php echo $_GET['uid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-3">
														<div class="form-group">
															<label>First Name:</label>
															<input type="text" name="txtFname" class="form-control" value="<?php echo $result['fname']; ?>" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>Last Name:</label>
															<input type="text" name="txtLname" class="form-control" value="<?php echo $result['lname']; ?>" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Username:</label>
															<input type="text" name="txtUname" class="form-control" required value="<?php echo $result['username']; ?>" />
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
											<form class="form" action="dummy-user.php" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-3">
														<div class="form-group">
															<label>First Name:</label>
															<input type="text" name="txtFname" class="form-control" value="" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>Last Name:</label>
															<input type="text" name="txtLname" class="form-control" value="" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Username:</label>
															<input type="text" name="txtUname" class="form-control" required value="" />
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
												<div class="table-responsive">
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											                <th>First Name</th>
											                <th>Last Name</th>
											                <th>User Name</th>
											                <th>Action</th>
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
						        "ajax": "data-processing/getDummyUser.php",
						        "columnDefs": [{"render": function ( data, type, full, meta ) {
					                     var buttonID = full[0];
					                     return '<a href="dummy-user?uid='+buttonID+'" class="mr-5" ><i class="far fa-edit"></i></a> &nbsp;&nbsp;<a href="dummy-user?did='+buttonID+'" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a>';
					                 }, "data": null, "targets": [4]}],
						    } );
						} );
				    </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>