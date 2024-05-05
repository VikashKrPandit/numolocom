<?php 
include('include/security.php');

if(isset($_POST['btnSave']))
{
  $txtPname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPname']), ENT_QUOTES, 'UTF-8');
  $pkg_status=1;
  $sql = "INSERT INTO tbl_packages (pkg_name,pkg_status)
	VALUES ('$txtPname','$pkg_status')";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Record added successfully.', 'success', 'TRUE' );
        header("Location:package-master");
        exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:package-master");
      exit();
	}

	$conn->close();
}
// select pkges 
$selectPkg   = $conn->query("select * from tbl_packages"); 
if(mysqli_num_rows($selectPkg)> 0){
	$pkgRow = array();
	while($result = $query->fetch_assoc()){
		$pkgRow=$result;
		return $pkgRow;
	}
}



$upQueryAcc = $conn->query("select count(*) as livecontest from tbl_contest where status in (2,3)");
$upQueryAccRes = $upQueryAcc->fetch_assoc();

$winner = $winner2 = $winner3 = $winner4 = $winner5 = '';

if(isset($_GET['uid']))
{
  $uid = $_GET['uid'];
  
  	if($upQueryAccRes['livecontest']==0)
  	{
		  $query   = $conn->query("select * from tbl_packages where id=$uid"); 
		  $result = $query->fetch_assoc();

		  if(isset($_POST['btnUpdate']))
			{
				$txtPname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPname']), ENT_QUOTES, 'UTF-8');

			  $verify = 1;

			  if($txtPname==''){
					$verify = 0;
					$winner = 'This field is required';
			  }

			  if($verify==1)
			  {
				  $sql = "UPDATE tbl_packages set pkg_name='$txtPname' where id=$uid";

					if ($conn->query($sql) === TRUE) {
						flash( 'fmsg', 'fmsg', 'Record update successfully.', 'success', 'TRUE' );
				        header("Location:package-master");
				        exit();
					} else {
					  flash( 'fmsg', 'fmsg', $sql.'Something went wrong!', 'danger', 'TRUE' );
				      header("Location:package-master");
				      exit();
					}
				}
				else
				{
					flash( 'fmsg', 'fmsg', 'Please fill all the mandatory fields!', 'danger', 'TRUE' );
		      // header("Location:package-master");
		      // exit();
				}


				$conn->close();
			}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to update any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:package-master");
        exit();
	}
}

if(isset($_GET['did']))
{
  $did = $_GET['did'];

  if($upQueryAccRes['livecontest']==0)
  {
	  	$sql = "DELETE from tbl_packages where id=$did";

		if ($conn->query($sql) === TRUE) {
				flash( 'fmsg', 'fmsg', 'Record deleted successfully.', 'success', 'TRUE' );
        header("Location:package-master");
        exit();
  	} else {
	  	flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:package-master");
      exit();
    }
		$conn->close();
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to update any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:package-master");
        exit();
	}
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Package Master | <?php echo $appDetRes['app_name'] ?></title>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Package Master</h5>
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
										<?php if(isset($_GET['uid'])): ?>
										<!--begin::Card-->
										<div class="card card-custom">
											<div class="card-header">
												<h3 class="card-title">Update Package</h3>
											</div>
											<!--begin::Form-->
											<form class="form" action="package-master.php?uid=<?php echo $_GET['uid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-3">
															<div class="form-group">
																<label>* Name :</label>
																<input type="text" name="txtPname" class="form-control" required value="<?php echo $result['pkg_name']; ?>" />
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
											<!--end::Form-->
										</div>
										<?php else: ?>
										<!--begin::Card-->
										<div class="card card-custom">
											<div class="card-header">
												<h3 class="card-title">Add Package</h3>
											</div>
											<!--begin::Form-->
											<form class="form" action="package-master.php" method="post">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-3">
															<div class="form-group">
																<label>* Name :</label>
																<input type="text" name="txtPname" class="form-control" required />
															</div>
														</div>
														<div class="col-lg-3">
															<div class="form-group">
																<label>&nbsp;</label>
																<button class="btn btn-success form-control" type="submit" name="btnSave">Add</button>
															</div>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<?php endif ?>
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
										                <th>Name</th>
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
						        "ajax": "data-processing/getPackages.php",
						        "columnDefs": [{"render": function ( data, type, full, meta ) {
										//console.log(full);
					                     var buttonID = full[0];
										 var pkg_st=full[7];
										 console.log(pkg_st);
										 for(var i=0;i<pkg_st.length;i++){
											if(pkg_st=='1'){
												$('#questionStat').css("color", "green");
												i++;
										 	}
										 }
									
										
					                     return '<a href="package-master?did='+buttonID+'" title="Delete" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a> &nbsp;&nbsp;<a href="package-master?uid='+buttonID+'" title="Edit" class="mr-5" ><i class="far fa-edit"></i></a>&nbsp;<a href="#" data-toggle="modal" data-target="#myModal3 "title="Status" data-pkgId="'+buttonID+'" class="mr-5 pkgSt" ><i class="fas fa-calendar-alt"></i></a> <i class="fa fa-circle  <?php //if( (int)$getFeesRes['pkg_status']==2) {echo 'deactivateQuestion';}elseif((int)$getFeesRes['pkg_status']==1){echo 'activeQuestion';} else{echo 'activeQuestion';} ?>" aria-hidden="true" id="questionStat"></i>';
					                 }, "data": null, "targets": [2]}],
						    } );
						} );
				    </script>
		<!--end::Page Scripts-->

					   <!-- status modal ends -->
			    <!-- Anser key modal -->
				<div id="myModal3" class="modal fade" role="dialog">
			     <div class="modal-dialog">

			   		<!-- Modal content-->
					<div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title">Answer Key</h4>
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			          </div>
			          <div class="modal-body">
						
			            <!-- <form method="post" action="" id="pkgStatus"> -->
			            <label style="font-size:20px;">Package Status:</label><br>
						<input type="hidden" class="pkg_id" name="pkg_id" value="">
						<select name="pkg_status_change" class="pkg_status_change">
							<option selected disabled> Select Status</option>
							
									<option value="2">disable</option>
									<option value="1">enable</option>
							
							
						</select>
						<div class="sucMsg" style="color:green; font: size 20px; font-weight:bolder;"></div>
						<div class="errorMsg" style="color:brown; font: size 20px; font-weight:bolder;"></div>
		
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <!-- <button type="submit" class="btn btn-primary" name="ansKeySubmit" id="ansKeySubmit"><i class="fas fa-plus"></i> ADD</button> -->
			            <!-- </form> -->
			          </div>
			        </div>

			      </div>
			    </div>

			   <!-- Answer key modal ends -->
			   <script>
				$(document).on('click','.pkgSt',function(){
					
					var data_pkgId = $(this).attr('data-pkgId');
					$('.pkg_id').val(data_pkgId);
					//pkg_id
				});
			   </script>

			   <script>
					$('.pkg_status_change').change(function(){
						var pkg_id=$('.pkg_id').val().trim();
						var packgChange =$(this).val().trim();
						$.ajax({
							url:'pkg_status_update.php',
							data:{pkg_id:pkg_id, pkg_stat:packgChange},
							type:'POST',
							success:function(res){
								console.log(res);
								$('.sucMsg').html('status updated !');
								refreshpage();
								
							},
							error:function(er){
								$('.errorMsg').html('unable to updated status !');
								refreshpage();
							}


						});
						//console.log("dfdffd",packgChange+" "+pkg_id);
					});
				</script>
	</body>
	<!--end::Body-->
</html>