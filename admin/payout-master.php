<?php 
include('include/security.php');

if(isset($_POST['btnSave']))
{
  $txtTitle= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtTitle']), ENT_QUOTES, 'UTF-8');
  $txtStitle= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtStitle']), ENT_QUOTES, 'UTF-8');
  $txtMsg= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtMsg']), ENT_QUOTES, 'UTF-8');
  $txtAmount= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtAmount']), ENT_QUOTES, 'UTF-8');
  $txtCoin= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtCoin']), ENT_QUOTES, 'UTF-8');
  $txtCurrency= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtCurrency']), ENT_QUOTES, 'UTF-8');
  $txtType= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtType']), ENT_QUOTES, 'UTF-8');

  if(isset($_FILES['txtImg']))
    {
      $file1 = $_FILES['txtImg'];

      //file properties

      $file1_name=$file1['name'];
      $file1_tmp=$file1['tmp_name'];
      $file1_error=$file1['error'];

      //file extension

      $file_ext=explode('.',$file1_name);
      $file_ext = strtolower($file1_name);

      if($file1_error==0)
      {
        $file1_new = uniqid('',true).'.'.$file_ext;
        $file1_destination='media/'.$file1_new;
        move_uploaded_file($file1_tmp,$file1_destination);
      }

      if(isset($file1_destination))
      {
        $txtImg=$file1_destination;
        
      }
      else
      {
        $txtImg="";
      }
    }
    else
    {
      echo "image not load";
    }

  $sql = "INSERT INTO payout_master (title, subtitle, message, amount, coins, image, type, currency)
	VALUES ('$txtTitle', '$txtStitle', '$txtMsg', $txtAmount, $txtCoin, '$txtImg', $txtType, '$txtCurrency')";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Record added successfully.', 'success', 'TRUE' );
        header("Location:payout-master");
        exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:payout-master");
      exit();
	}

	$conn->close();
}

if(isset($_GET['uid']))
{
  $uid = $_GET['uid'];
  
  $query   = $conn->query("select * from payout_master where id=$uid"); 
  $result = $query->fetch_assoc();

  if(isset($_POST['btnUpdate']))
	{
		$txtTitle= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtTitle']), ENT_QUOTES, 'UTF-8');
		$txtStitle= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtStitle']), ENT_QUOTES, 'UTF-8');
		$txtMsg= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtMsg']), ENT_QUOTES, 'UTF-8');
		$txtAmount= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtAmount']), ENT_QUOTES, 'UTF-8');
		$txtCoin= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtCoin']), ENT_QUOTES, 'UTF-8');
		$txtCurrency= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtCurrency']), ENT_QUOTES, 'UTF-8');
		$txtType= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtType']), ENT_QUOTES, 'UTF-8');

		if(isset($_FILES['txtImg']))
		{
		  $file1 = $_FILES['txtImg'];

		  //file properties

		  $file1_name=$file1['name'];
		  $file1_tmp=$file1['tmp_name'];
		  $file1_error=$file1['error'];

		  //file extension

		  $file_ext=explode('.',$file1_name);
		  $file_ext = strtolower($file1_name);

		  if($file1_error==0)
		  {
		    $file1_new = uniqid('',true).'.'.$file_ext;
		    $file1_destination='media/'.$file1_new;
		    move_uploaded_file($file1_tmp,$file1_destination);
		  }

		  if(isset($file1_destination))
		  {
		    $txtImg=$file1_destination;
		    
		  }
		  else
		  {
		    $txtImg="";
		  }
		}
		else
		{
		  echo "image not load";
		}

		if (!empty($_FILES['txtImg']['name'])) {
	  		$sql = "UPDATE payout_master SET title='$txtTitle', subtitle='$txtStitle', message='$txtMsg', amount='$txtAmount', coins=$txtCoin, image='$txtImg', type=$txtType, currency='$txtCurrency' where id=$uid";
	  	}
	  	else
	  	{
	  		$sql = "UPDATE payout_master SET title='$txtTitle', subtitle='$txtStitle', message='$txtMsg', amount='$txtAmount', coins=$txtCoin, type=$txtType, currency='$txtCurrency' where id=$uid";
	  	}

		if ($conn->query($sql) === TRUE) {
			flash( 'fmsg', 'fmsg', 'Record update successfully.', 'success', 'TRUE' );
	        header("Location:payout-master");
	        exit();
		} else {
		  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	      header("Location:payout-master");
	      exit();
		}

		$conn->close();
	}
}

if(isset($_GET['did']))
{
  $did = $_GET['did'];
  $sql = "DELETE from payout_master where id=$did";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Record delete successfully.', 'success', 'TRUE' );
        header("Location:payout-master");
        exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:payout-master");
      exit();
	}

	$conn->close();
}

if(isset($_GET['iaid']))
{
  $iaid = $_GET['iaid'];
  $sql = "UPDATE payout_master set status=1 where id=$iaid";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Inactive payout successfully.', 'success', 'TRUE' );
		header("Location:payout-master");
		exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:payout-master");
      exit();
	}

	$conn->close();
}

if(isset($_GET['aid']))
{
  $aid = $_GET['aid'];
  $sql = "UPDATE payout_master set status=0 where id=$aid";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Payout package activate successfully.', 'success', 'TRUE' );
		header("Location:payout-master");
		exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:payout-master");
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
		<title>Payout Master | <?php echo $appDetRes['app_name'] ?></title>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Payout Master</h5>
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
									<div class="col-lg-5">
										<!--begin::Card-->
										<div class="card card-custom">
											<div class="card-header">
												<h3 class="card-title">Add New</h3>
											</div>
											<!--begin::Form-->
											<?php if(isset($_GET['uid'])): ?>
											<form class="form" action="payout-master.php?uid=<?php echo $_GET['uid']; ?>" method="post" enctype="multipart/form-data">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Title:</label>
															<input type="text" name="txtTitle" class="form-control" required value="<?php echo $result['title']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Subtitle:</label>
															<input type="text" name="txtStitle" class="form-control" required value="<?php echo $result['subtitle']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Message:</label>
															<input type="text" name="txtMsg" class="form-control" required value="<?php echo $result['message']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Amount:</label>
															<input type="number" name="txtAmount" class="form-control" required value="<?php echo $result['amount']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Coin:</label>
															<input type="number" name="txtCoin" class="form-control" required value="<?php echo $result['coins']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Currency:</label>
															<input type="text" name="txtCurrency" class="form-control" required value="<?php echo $result['currency']; ?>" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Type:</label>
															<select class="form-control" name="txtType" id="txtType">
																<option <?php if($result['currency']==0): echo 'selected'; endif ?> value="0">Debit</option>
																<option <?php if($result['currency']==1): echo 'selected'; endif ?> value="1">Credit</option>
															</select>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label>* Image:</label>
															<input type="file" name="txtImg" class="form-control" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>&nbsp;</label>
															<button class="btn btn-success form-control" type="submit" name="btnUpdate">Update</button>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>&nbsp;</label>
															<a href="payout-master" class="btn btn-secondary form-control">Cancel</a>
														</div>
													</div>
													</div>
												</div>
											</form>
											<?php else: ?>
											<form class="form" action="payout-master.php" method="post" enctype="multipart/form-data">
												<div class="card-body">
													<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Title:</label>
															<input type="text" name="txtTitle" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Subtitle:</label>
															<input type="text" name="txtStitle" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Message:</label>
															<input type="text" name="txtMsg" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Amount:</label>
															<input type="number" name="txtAmount" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Coin:</label>
															<input type="number" name="txtCoin" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Currency:</label>
															<input type="text" name="txtCurrency" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>* Type:</label>
															<select class="form-control" name="txtType" id="txtType">
																<option value="0">Debit</option>
																<option value="1">Credit</option>
															</select>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label>* Image:</label>
															<input type="file" name="txtImg" class="form-control" required value="" />
														</div>
													</div>
													<div class="col-lg-6">
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
									<div class="col-lg-7">
										<div class="card card-custom">
											<div class="card-body">
												<div class="table-responsive">
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											        <thead>
											            <tr>
											            	<th>ID</th>
											                <th>Title</th>
											                <th>Amount</th>
											                <th>Coin</th>
											                <th>Type</th>
											                <th>Currency</th>
											                <th>Status</th>
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
						        "ajax": "data-processing/getPayout.php",
						        "columnDefs": [
							        {"render": function ( data, type, full, meta ) {
					                     var buttonID = full[0];
					                     return '<a href="payout-master?uid='+buttonID+'" class="mr-5" ><i class="far fa-edit"></i></a> &nbsp;&nbsp;<a href="payout-master?did='+buttonID+'" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a>';
					                 }, "data": null, "targets": [7]},{"render": function ( data, type, full, meta ) {
					                     var payoutTyp = full[6];
					                     var payoutId = full[0];
					                     if(payoutTyp==='0'){
					                     	return '<a href="payout-master?iaid='+payoutId+'" class="mr-5" ><span class="label label-success label-pill label-inline mr-2">Active</span></a>';
					                     }
					                     else
					                     {
					                     	return '<a href="payout-master?aid='+payoutId+'" class="mr-5"><span class="label label-danger label-pill label-inline mr-2">In Active</span></a>';
					                     }
					                 }, "data": null, "targets": [6]}
					            ],
						    } );
						} );
				    </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>