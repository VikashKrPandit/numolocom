<?php 
include('include/security.php');
//include('testResult.php');
$getContest = $conn->query("select * from tbl_contest where status=2");
$getPkg = $conn->query("select * from tbl_packages where pkg_status!=2");

$getFees = $conn->query("select f.*, p.pkg_name from fees_master as f left join tbl_packages as p on p.id=f.pkg_id order by f.id DESC");

if(isset($_POST['btnSave']))
{
    
  $txtPrice= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPrice']), ENT_QUOTES, 'UTF-8');
  $textQuestion= mysqli_real_escape_string($conn,$_POST['textQuestion']);
  $txtNwin= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtNwin']), ENT_QUOTES, 'UTF-8');
  $txtPkg= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPkg']), ENT_QUOTES, 'UTF-8');
  $txtNticket= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtNticket']), ENT_QUOTES, 'UTF-8');
  $sql = "INSERT INTO fees_master (pkg_id, price, question, no_of_winners, no_of_tickets,status)
	VALUES ('$txtPkg', '$txtPrice', '$textQuestion',  '$txtNwin', '$txtNticket',1)";

	
	 
	if ($conn->query($sql) === TRUE) {
	//if ($conn->query($sql)) {
	   
		flash( 'fmsg', 'fmsg', 'Record added successfully.', 'success', 'TRUE' );
        header("Location:fees-master");
       exit(); 
	} else {
	  flash( 'fmsg', 'fmsg', $sql.'Something went wrong!', 'danger', 'TRUE' );
      header("Location:fees-master");
	  die();
      
      
	}

	$conn->close();
}


$upQueryAcc = $conn->query("select count(*) as livecontest from tbl_contest where status in (2,3)");
$upQueryAccRes = $upQueryAcc->fetch_assoc();

if(isset($_GET['uid']))
{
  $uid = $_GET['uid'];
  
  	if($upQueryAccRes['livecontest']==0)
  	{
		  $query   = $conn->query("select * from fees_master where id=$uid"); 
		  $result = $query->fetch_assoc();

		  if(isset($_POST['btnUpdate']))
			{
				$txtPrice= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPrice']), ENT_QUOTES, 'UTF-8');
				$textQuestion= mysqli_real_escape_string($conn,$_POST['textQuestion']);
			  	$txtNwin= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtNwin']), ENT_QUOTES, 'UTF-8');
			  	$txtPkg= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtPkg']), ENT_QUOTES, 'UTF-8');
  				$txtNticket= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtNticket']), ENT_QUOTES, 'UTF-8');
				//echo "UPDATE fees_master set pkg_id=$txtPkg, price=$txtPrice, question=$textQuestion, no_of_winners=$txtNwin, no_of_tickets=$txtNticket where id=$uid";
			  	$sql = "UPDATE fees_master set pkg_id=$txtPkg, price=$txtPrice, question='$textQuestion', no_of_winners=$txtNwin, no_of_tickets=$txtNticket where id=$uid";

				if ($conn->query($sql) === TRUE) {
					flash( 'fmsg', 'fmsg', 'Record update successfully.', 'success', 'TRUE' );
			        header("Location:fees-master");
			        exit();
				} else {
				  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
			      header("Location:fees-master");
			      exit();
				}

				$conn->close();
			}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to update any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:fees-master");
        exit();
	}
}

if(isset($_GET['did']))
{
  $did = $_GET['did'];

  if($upQueryAccRes['livecontest']==0)
  {
	  	$sql = "DELETE from fees_master where id=$did";

		if ($conn->query($sql) === TRUE) {
			flash( 'fmsg', 'fmsg', 'Record deleted successfully.', 'success', 'TRUE' );
	        header("Location:fees-master");
	        exit();
    	} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:fees-master");
	      exit();
		}
		$conn->close();
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Not able to update any record, As some contest are live or result not declared yet!', 'danger', 'TRUE' );
        header("Location:fees-master");
        exit();
	}
}



?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Fees Master | <?php echo $appDetRes['app_name'] ?></title>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Fees Master</h5>
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
											<form class="form" action="fees-master.php?uid=<?php echo $_GET['uid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Select Package:</label>
															<select class="form-control" name="txtPkg">
																<?php while($getPkgRes = $getPkg->fetch_assoc()) { ?>
																	<option <?php if($result['pkg_id']==$getPkgRes['id']): echo 'selected'; endif ?> value="<?php echo $getPkgRes['id']; ?>"><?php echo $getPkgRes['pkg_name']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													
														<div class="col-lg-2">
														<div class="form-group">
															<label>* Question:</label>
															<input type="text" name="textQuestion" class="form-control" required value="<?php echo $result['question']; ?>" />
														</div>
													</div>
													
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Price:</label>
															<input type="number" name="txtPrice" class="form-control" required value="<?php echo $result['price']; ?>" />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Noumber of Winner:</label>
															<input type="number" name="txtNwin" class="form-control" required value="<?php echo $result['no_of_winners']; ?>" />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* No. of Ticket:</label>
															<input type="number" name="txtNticket" class="form-control" required value="<?php echo $result['no_of_tickets']; ?>" />
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
											<form class="form" action="fees-master.php" method="post">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Select Package:</label>
															<select class="form-control" name="txtPkg">
																<?php while($getPkgRes = $getPkg->fetch_assoc()) { ?>
																	<option value="<?php echo $getPkgRes['id']; ?>"><?php echo $getPkgRes['pkg_name']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Question:</label>
															<input type="text" name="textQuestion" class="form-control" required value="<?php if(isset($result['question'])){echo $result['question'];}  ?>" />
														</div>
													</div>
													
													<div class="col-lg-2">
														<div class="form-group">
															<label>* Price:</label>
															<input type="number" name="txtPrice" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* No. of Winner:</label>
															<input type="number" name="txtNwin" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label>* No. of Ticket:</label>
															<input type="number" name="txtNticket" class="form-control" required value="" />
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
											<div class="col-lg-2">
														<div class="form-group">
															<label>Select Package:</label>
															<select name="selctPackage" class="form-control packgChange" required>
																<option selected>select package</option>
																<?php 
																	foreach($getPkg  as $allPkg):
																		if($allPkg['pkg_status'] != 2):
																	?>
																			<option value="<?php echo $allPkg['id'];?>"><?php echo  $allPkg['pkg_name'];?></option>
																		<?php 
																		endif;
																		endforeach;
																	
																?>

															</select>
														</div>
											</div>
										<div class="card card-custom">
											<div class="card-body">
												<div class="table-responsive" id="ajaxTable">
												
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											      
												<thead>
											            <tr>
											            <th>ID</th>
										                <th>Package</th>
										                <th>Question</th>
														<th>Answer</th>
										                <th>Price</th>
										                <th>No of Winner</th>
										                <th>No of Ticket</th>
										                <th>Action</th>
											            </tr>
											        </thead>
				
											        <tbody class="dataTable">
											        	<?php while($getFeesRes = $getFees->fetch_assoc()) {  ?>
											        	<tr>
											        		<td><?php echo $getFeesRes['id']; ?></td>
											        		<td><?php echo $getFeesRes['pkg_name']; ?></td>
											        		<td><?php echo $getFeesRes['question']; ?></td>
															<td><?php echo $getFeesRes['answer_key']; ?></td>
											        		<td><?php echo $getFeesRes['price']; ?></td>
											        		<td><?php echo $getFeesRes['no_of_winners']; ?></td>
											        		<td><?php echo $getFeesRes['no_of_tickets']; ?></td>
											        		<td><a href="fees-master?uid=<?php echo $getFeesRes['id']; ?>" title="Update" class="mr-5" ><i class="far fa-edit"></i></a>
																	 &nbsp;&nbsp;
																	 <a href="fees-master?did=<?php echo $getFeesRes['id']; ?>" title="Delete" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a>
																	 	 &nbsp;&nbsp; <a href="prizepool-master?fid=<?php echo $getFeesRes['id']; ?>" title="prize pool" class="mr-5"><i class="fas fa-external-link-alt"></i></a>
																		  &nbsp;&nbsp; <!--<a href="#" data-toggle="modal" data-target="#myModal" data-fid="<?php echo $getFeesRes['id']; ?>" data-efee="<?php echo $getFeesRes['price']; ?> " class="addparti mr-5"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			        <polygon points="0 0 24 0 24 24 0 24"/>
																			        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																			        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																			    </g>
																			</svg></span></a>-->
																			&nbsp;&nbsp;<a href="#" data-toggle="modal" title="Status" data-target="#myModal2" data-qid="<?php if(isset( $getFeesRes['id'])){ echo $getFeesRes['id']; }  ?>" data-endDate="<?php if(isset( $getFeesRes['endDate'])){ echo $getFeesRes['endDate']; }  ?>" data-endTime="<?php if(isset( $getFeesRes['endTime'])){ echo $getFeesRes['endTime']; }  ?>" class="qStatus"><i class="fas fa-calendar-alt"></i></a>
																			&nbsp;&nbsp;<a href="#" data-toggle="modal" title="Answer Key" data-target="#myModal3" data-qid="<?php if(isset( $getFeesRes['id'])){ echo $getFeesRes['id']; }  ?>" class="qAnsKey"><i class="fa fa-reply"></i></a>
																			&nbsp;&nbsp;<i class="fa fa-circle <?php if( (int)$getFeesRes['status']==2) {echo 'deactivateQuestion';}elseif((int)$getFeesRes['status']==1){echo 'activeQuestion';} else{echo 'activeQuestion';} ?>" aria-hidden="true" id="questionStat"></i>
																			
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

			  <!--<div id="myModal" class="modal fade" role="dialog">
			     <div class="modal-dialog">-->

			        <!-- Modal content-->
			        <!--<div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title">Add dummy participant to live contest</h4>
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			          </div>
			          <div class="modal-body">
			            <form method="post" action="addDummyUser">
						<diV>
						<select name="getContest" id="" required>
							<option >select contestent</option>
							<?php
							/*
								if(mysqli_num_rows($getContest)>0){
									while($fc =$getContest->fetch_assoc()){?>
										<option value="<?php echo $fc['id']; ?>">contestent-<?php echo $fc['id']; ?></option>
									<?php
									}
								}
								*/
							 ?>
						</select>
						
						</diV>
						
			            <label>Enter no. of participant:</label>
			            <input type="hidden" name="txtFid" id="txtFid" value="">
			            <input type="hidden" name="txtFees" id="txtFees" value="">
			            <input type="number" class="form-control" min="1" name="txtNoParti" id="txtNoParti" placeholder="e.g. 10" required />
			            <small class="text-danger">Note: <span id="partiVal">0</span> random participant will be add to live contest (from dummy user data)</small>
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="submit" class="btn btn-primary" name="btnAddParti"><i class="fas fa-plus"></i> ADD</button>
			            </form>
			          </div>
			        </div>

			      </div>
			    </div> -->

			   <!-- status modal -->
			   <div id="myModal2" class="modal fade" role="dialog">
			     <div class="modal-dialog">

			        <!-- Modal content-->
			        <div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title">Status</h4>
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			          </div>
			          <div class="modal-body">
						
			            <form method="post" action="" id="questionStatus">
			            <label style="font-size:20px;">Enter End Date & Time:</label><br>
			            <input type="hidden" name="questionId" id="txtFid" class="questionId" value="">
						<label>End Date :</label>
			            <input type="date" class="form-control endDateGame"  name="endDateGame" id="txtNoParti"  placeholder="" value="" required /> 
						<label>End Time:</label>
						<input type="time" class="form-control endTimeGame"  name="endTimeGame" id="txtNoParti"  placeholder="" value="" required /> 
						<div class="successMsg" style="color:#0BB7AF; font: size 20px; font-weight:bolder;"></div>
						<div class="errorMsg" style="color:brown; font: size 20px; font-weight:bolder;"></div>
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="submit" class="btn btn-primary" name="btnAddEndDateTime"><i class="fas fa-plus"></i> ADD</button>
			            </form>
			          </div>
			        </div>

			      </div>
			    </div>

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
						
			            <form method="post" action="" id="answerKey">
			            <label style="font-size:20px;">Enter Answer:</label><br>
			            <input type="hidden" name="questionId" id="txtFid" class="questionId2" value="">
						
			            <input type="text" class="form-control ans_key"  name="ans_key" id="txtNoParti"  placeholder="Enter Answer" value="" required /> 
						<div class="successMsg" style="color:#0BB7AF; font: size 20px; font-weight:bolder;"></div>
						<div class="errorMsg" style="color:brown; font: size 20px; font-weight:bolder;"></div>
		
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="submit" class="btn btn-primary" name="ansKeySubmit" id="ansKeySubmit"><i class="fas fa-plus"></i> ADD</button>
			            </form>
			          </div>
			        </div>

			      </div>
			    </div>

			   <!-- Answer key modal ends -->

					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
					<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
					<!--end::Page Vendors-->
					<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
						    $('#example').DataTable();
						} );
					</script>
					<script type="text/javascript">
						$(document).on("click", ".addparti", function () {
	             var myrecordId = $(this).data('fid');
	             var myrecordFee = $(this).data('efee');
	             $(".modal-body #txtFid").val( myrecordId );
	             $(".modal-body #txtFees").val( myrecordFee );
		        });
		        $('#txtNoParti').keyup(function () {
						    var partiVal = $(this).val();
						    document.getElementById("partiVal").innerHTML = partiVal;
						});
				  </script>
		<!--end::Page Scripts-->
			<script>
					$(document).on("click", ".qStatus", function () {				
						var dataId=$(this).data('qid');
						var endDate=$(this).attr('data-endDate');
						var endTime=$(this).attr('data-endTime');
						console.log(endDate);
						$(".questionId").val(dataId);
						$(".endDateGame").val(endDate);
						$(".endTimeGame").val(endTime);						
					});				
			</script>
			<script>
				$(document).on("click", ".qAnsKey", function () {			
					var dataId=$(this).data('qid');
					console.log(dataId);
					$(".questionId2").val(dataId);					
				});		
			</script>
			<script>
				$(document).ready(function(){
					$("#questionStatus").submit(function(e){
						e.preventDefault();
						var form =$("#questionStatus");
						console.log(form.serialize())
						$.ajax({
							url:"checkDateTime.php",
							data:form.serialize(),
							type:'post',
							success:function(res){
								$(".successMsg").text("Data Added !");
								console.log(res);
								$('#questionStatus').trigger("reset");
								refreshpage();
							},
							error:function(er){
								$(".errorMsg").text("Error occured !");
								refreshpage();
							}

						});

					});
				});
			</script>
				<script>
					$('.packgChange').change(function(){
						var packgChange =$(this).val().trim();
						$.ajax({
							url:'pckg_filter.php',
							data:{pkg_id:packgChange},
							type:'POST',
							success:function(res){
								console.log(res);
								$('#example').remove();
								$('#ajaxTable').html(res);
								refreshpage();
								
								
							}

						});
						//console.log("dfdffd",packgChange);
					});
				</script>

			<script>
				$(document).ready(function(){
					$("#answerKey").submit(function(e){
						e.preventDefault();
						var form =$("#answerKey");
						console.log(form.serialize())
						$.ajax({
							url:"insertAnswerKey.php",
							data:form.serialize(),
							type:'post',
							success:function(res){
								$(".successMsg").text("Answer Added !");
								console.log(res);
								$('#questionStatus').trigger("reset");
								refreshpage();
							},
							error:function(er){
								$(".errorMsg").text("Error occured !");
								
							}

						});

					});
				});
			</script>
	</body>
	<!--end::Body-->
</html>