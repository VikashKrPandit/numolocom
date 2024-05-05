<?php 
include('include/security.php');

//$getConQuery   = $conn->query("select c.id, start_time, end_time, c.status, c.fee_id,c.pkg_id, COUNT(p.id) as totParti  from tbl_contest as c left join tbl_participants as p on p.contest_id=c.id group by c.id order by c.id desc");
$getConQuery   = $conn->query("select c.id, start_time, end_time, c.status, c.fee_id,c.pkg_id, fm.id as fmid,fm.price,fm.no_of_tickets, COUNT(p.id) as totParti  from tbl_contest as c left join tbl_participants as p on p.contest_id=c.id left join fees_master fm on fm.id =c.fee_id group by c.id order by c.id desc");

$getPkg   = $conn->query("select id,pkg_name from tbl_packages where pkg_status!=2");
$getFeemaster = $conn->query("SELECT id,question FROM fees_master where status!=2 and contest_id=0");
$getFeemastrContst = $conn->query("SELECT fm.id,fm.price,fm.pkg_id ,ts.id,ts.fee_id,ts.pkg_id FROM fees_master fm  left join tbl_contest ts on fm.id=ts.fee_id where fm.status!=2 and ts.status=2");


if(isset($_GET['uid']))
{
	$uid = $_GET['uid'];
	$maxDateQuery = $conn->query("select max(end_time) as mxDate from tbl_contest where id!=$uid"); 
}
else
{
	$maxDateQuery = $conn->query("select max(end_time) as mxDate from tbl_contest");	
}
$mxResult = $maxDateQuery->fetch_assoc();
$mxDate=date('Y-m-d\TH:i', $mxResult['mxDate']);
if($mxDate=='')
{
	$startDate = date('Y-m-d\TH:i');
	$endDate = date('Y-m-d\TH:i', strtotime($startDate . ' +1 hours'));
}
else
{
	// $startDate = date('Y-m-d\TH:i', strtotime($mxDate . ' +1 day'));
	$startDate = $mxDate;
	$endDate = date('Y-m-d\TH:i', strtotime($startDate . ' +1 hours'));
}

if(isset($_POST['btnSave']))
{
  $txtStart= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtStart']), ENT_QUOTES, 'UTF-8');
  $txtStartCon = strtotime($txtStart);
  $txtEnd= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtEnd']), ENT_QUOTES, 'UTF-8');
  $txtEndCon = strtotime($txtEnd);
  $pkg_id= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['pkg_id']), ENT_QUOTES, 'UTF-8');
  $fee_id= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['fee_id']), ENT_QUOTES, 'UTF-8');

  //if($txtStartCon > $txtEndCon )
  //{
	//echo "INSERT INTO tbl_contest (start_time, end_time, added_by,pkg_id,fee_id) VALUES ('$txtStartCon', '$txtEndCon', $userId,$pkg_id,$fee_id)";
	//die();
  	$sql = "INSERT INTO tbl_contest (start_time, end_time, added_by,pkg_id,fee_id) VALUES ('$txtStartCon', '$txtEndCon', $userId,$pkg_id,$fee_id)";
	

	if ($conn->query($sql) === TRUE) {
		$lstInsrtContst = mysqli_insert_id($conn);
		$upPkg = $conn->query("update tbl_packages set dummy_user=0");
		$conn->query("update fees_master set contest_id='$lstInsrtContst' where id='$fee_id'");
		flash( 'fmsg', 'fmsg', 'Contest created successfully.', 'success', 'TRUE' );
    header("Location:create-contest");
    die();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
    header("Location:create-contest");
    die();
	}

	$conn->close();
  //}
/*   else
  {
	flash( 'fmsg', 'fmsg', 'Please select valid date range!', 'danger', 'TRUE' );
	header("Location:create-contest");
	exit();
  } */

}


if(isset($_GET['uid']))
{
  $uid = $_GET['uid'];

  
  $query   = $conn->query("select * from tbl_contest where id=$uid"); 
  $result = $query->fetch_assoc();
  //print_r($result);
 // die();

  if($result['status']!=4 || $result['status']!=3)
 	 {
	  if(isset($_POST['btnUpdate']))
		{
			$txtStart= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtStart']), ENT_QUOTES, 'UTF-8');
			$txtStartCon = strtotime($txtStart);
			$txtEnd= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtEnd']), ENT_QUOTES, 'UTF-8');
			$txtEndCon = strtotime($txtEnd);
			$pkg_id= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['pkg_id']), ENT_QUOTES, 'UTF-8');
			$fee_id= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['fee_id']), ENT_QUOTES, 'UTF-8');

					//if($txtStart > $txtEnd )
					//{

			  	$sql = "UPDATE tbl_contest set start_time='$txtStartCon', end_time='$txtEndCon',pkg_id='$pkg_id', fee_id='$fee_id' where id=$uid ";

				if ($conn->query($sql) === TRUE) {
					flash( 'fmsg', 'fmsg', 'Contest updated successfully.', 'success', 'TRUE' );
			        header("Location:create-contest");
			        exit();
				} 
						/* 	else {
							flash( 'fmsg', 'fmsg', 'Something went wrong!'.$sql, 'danger', 'TRUE' );
							header("Location:create-contest");
							exit();
							} */
						//}
					/* 	else
						{
							flash( 'fmsg', 'fmsg', 'Please select valid date range!', 'danger', 'TRUE' );
							header("Location:create-contest?uid=$uid");
							exit();
						} */

			$conn->close();
		}
  }
  else
  {
  	if($result['status']==1)
  	{
  		$conStatus='Upcoming'; 
  	}
  	elseif($result['status']==2)
  	{
  		$conStatus='Live';
  	}
  	elseif($result['status']==3)
  	{
  		$conStatus='Finished';
  	}
  	elseif($result['status']==4)
  	{
  		$conStatus='Result Announced';
  	}
  	flash( 'fmsg', 'fmsg', 'Not able to update this contest, As this contest status in "'.$conStatus.'" stage.', 'danger', 'TRUE' );
	header("Location:create-contest");
	exit();
  }
}

if(isset($_GET['did']))
{
  $did = $_GET['did'];
  $query   = $conn->query("select * from tbl_contest where id=$did"); 
  $result = $query->fetch_assoc();

  if($result['status']==1)
  {
  	$sql = "DELETE from tbl_contest where id=$did and status=1";

	if ($conn->query($sql) === TRUE) {
		flash( 'fmsg', 'fmsg', 'Contest deleted successfully.', 'success', 'TRUE' );
        header("Location:create-contest");
        exit();
	} else {
	  flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
      header("Location:create-contest");
      exit();
	}

	$conn->close();
  }
  else
  {
  	if($result['status']==1)
  	{
  		$conStatus='Upcoming'; 
  	}
  	elseif($result['status']==2)
  	{
  		$conStatus='Live';
  	}
  	elseif($result['status']==3)
  	{
  		$conStatus='Finished';
  	}
  	elseif($result['status']==4)
  	{
  		$conStatus='Result Announced';
  	}
  	flash( 'fmsg', 'fmsg', 'Not able to delete this contest, As this contest status in "'.$conStatus.'" stage.', 'danger', 'TRUE' );
	header("Location:create-contest");
	exit();
  }
  
}

if(isset($_GET['liveId']))
{
	$current_time = time();
	$liveId = $_GET['liveId'];
  	$selRecord = $conn->query("select * from tbl_contest where id=$liveId and status=1");
  	
/*   	$getLiveCon = $conn->query("select * from tbl_contest where status=2 limit 1");
    // $resLiveCon = $getLiveCon->fetch_assoc();
    
    if($getLiveCon->num_rows > 0)
    {
        flash( 'fmsg', 'fmsg', 'You must wait until the live contest to be completed.', 'danger', 'TRUE' );
        header("Location:create-contest");
        exit();
    } */
   /*  else
    { */
    	if($getContest = $selRecord->fetch_assoc())
    	{
        	$sqlUp = "UPDATE tbl_contest set status=2, modify_by=$userId where id=".$getContest['id'];
    		if ($conn->query($sqlUp) === TRUE) {
    			//$sqlUpLive = "UPDATE tbl_contest set status=3, modify_by=$userId where status=2 and id!=".$getContest['id'];
    			//$conn->query($sqlUpLive);
    			flash( 'fmsg', 'fmsg', 'Contest is live now.', 'success', 'TRUE' );
    	        header("Location:create-contest");
    	        exit();
    		}
    		else
    		{
    			flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
    	        header("Location:create-contest");
    	        exit();
    		}
    	}
    	else
    	{
    		flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
            header("Location:create-contest");
            exit();
    	}
    //}
	$conn->close();
}

if(isset($_GET['finishId']))
{
	$finishId = $_GET['finishId'];
  	$selRecord = $conn->query("select * from tbl_contest where id=$finishId");
	
	if($getContest = $selRecord->fetch_assoc())
	{
		$sqlUp = "UPDATE tbl_contest set status=3, modify_by=$userId where id=".$getContest['id'];
		if ($conn->query($sqlUp) === TRUE) {
			flash( 'fmsg', 'fmsg', 'Contest is finished now.', 'success', 'TRUE' );
	        header("Location:create-contest");
	        exit();
		}
		else
		{
			flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
	        header("Location:create-contest");
	        exit();
		}
	}
	else
	{
		flash( 'fmsg', 'fmsg', 'Something went wrong!', 'danger', 'TRUE' );
        header("Location:create-contest");
        exit();
	}
	$conn->close();
}
/*
if(isset($_POST['btnAddDparti']))
{
	// echo"<script>alert(\"ok\");</script>";
	$txtDPkg = mysqli_real_escape_string($conn,$_POST['txtDPkg']);
	$txtTotDparti = mysqli_real_escape_string($conn,$_POST['txtTotDparti']);
	$txtDate = time();
	function generateRandomString($length = 10) {
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
    header("Location:create-contest");
    exit();
	}
	else
	{
	    echo "select count(p.id) as totParti, pckg.total_no_tikets, pckg.price from tbl_packages as pckg left join tbl_participants as p on pckg.id=p.pkg_id where p.pkg_id='$txtDPkg'";
	    die();
		$getPkgDetails = $conn->query("select count(p.id) as totParti, pckg.total_no_tikets, pckg.price from tbl_packages as pckg left join tbl_participants as p on pckg.id=p.pkg_id where p.pkg_id='$txtDPkg'");
		$getPkgDetailsRes = $getPkgDetails->fetch_assoc();
		
		$aviTicket = $getPkgDetailsRes['total_no_tikets'] - $getPkgDetailsRes['totParti'];
		print_r($aviTicket);
		die();
		if($aviTicket > 0){
		    die();
		    echo "tikckkkk";
			if($txtTotDparti < $aviTicket){
				for($i=0;$i<$txtTotDparti;$i++)
				{
					$ticketNo = generateRandomString();
					$liveContestRes = $liveContestRes['id'];
					$getPkgDetailsRes=$getPkgDetailsRes['price'];
					
					$insParti = "INSERT INTO tbl_participants (contest_id, user_id, entry_fee, date_created, ticket_no, username, is_dummy, pkg_id)
								SELECT '$liveContestRes', id,'$getPkgDetailsRes', '$txtDate', '$ticketNo', username, 1, '$txtDPkg'
								FROM tbl_user
								WHERE is_dummy=1
								ORDER BY RAND()
								LIMIT 1";
					$conn->query($insParti);	  
				}

				$updateContest = $conn->query("UPDATE tbl_packages set dummy_user=1 where id=$txtDPkg");
				flash( 'fmsg', 'fmsg', $txtTotDparti.' participants added successfully.', 'success', 'TRUE' );
		    header("Location:create-contest");
		    exit();
			}else{
				flash( 'fmsg', 'fmsg', 'Only '.$aviTicket.' slot available.', 'danger', 'TRUE' );
		    header("Location:create-contest");
		    exit();
			}
		}else{
			flash( 'fmsg', 'fmsg', 'No slot available', 'danger', 'TRUE' );
	    header("Location:create-contest");
	    exit();
		}

    $conn->close();
	}
}
*/
?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Create Contest | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Contest?');
	      }
	      function checkLive(){
	          return confirm('By making this contest live, other live contest are marked as finished.');
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Create Contest</h5>
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
											<form class="form" action="create-contest.php?uid=<?php echo $_GET['uid']; ?>" method="post">
												<div class="card-body">
													<div class="row">
															<div class="col-lg-3">
																<div class="form-group">
																	<label>Pkg Type:</label>
																	<select name="pkg_id" id="">
																		<option select disabled>Select PKG</option>
																		<?php 
																		if(mysqli_num_rows($getPkg)>0){
																			while($pkgf=$getPkg->fetch_assoc()){ ?>
																					<option value="<?php echo $pkgf['id']; ?>"><?php echo $pkgf['pkg_name']; ?></option>	
																			<?php }
																		}
																			
																			//getFeemaster
																		?>
																	</select>
																</div>
																	</div>
															<div class="col-lg-3">
																<div class="form-group">
																	<label>Fee Master:</label>
																	<select name="fee_id" id="">
																		<option select disabled>Select PKG</option>
																		<?php 
																		if(mysqli_num_rows($getFeemaster)>0){
																			while($feef=$getFeemaster->fetch_assoc()){ ?>
																					<option value="<?php echo $feef['id']; ?>"><?php echo $feef['question']; ?></option>	
																			<?php }
																		}
																			
																			//getFeemaster
																		?>
																	</select>
																</div>
															</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Start date:</label>
															<input type="datetime-local" name="txtStart" id="txtStart" class="form-control" required value="<?php ($result['date_created'])?$result['date_created']:'' ?>" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* End Date:</label>
															<input type="datetime-local" name="txtEnd" id="txtEnd" class="form-control" required value="<?php ($result['end_time'])?$result['end_time']:'' ?>" />
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
											<form class="form" action="create-contest.php" method="post">
												<div class="card-body">
													<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label>*Pkg Type:</label><br/>
																	<select name="pkg_id" id="" class="form-select change_pkg_contst" required>
																		<option select>Select PKG</option>
																		<?php 
																		if(mysqli_num_rows($getPkg)>0){
																			while($pkgf=$getPkg->fetch_assoc()){ ?>
																					<option value="<?php echo $pkgf['id']; ?>"><?php echo $pkgf['pkg_name']; ?></option>	
																			<?php }
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label>*Fee Master Name:</label><br/>
																	<select name="fee_id" id="" class="form-select pkg_change_response" required>
																		<option select>Select Questin</option>
																		<?php 
																		if(mysqli_num_rows($getFeemaster)>0){
																			while($feef=$getFeemaster->fetch_assoc()){ ?>
																					<option value="<?php echo $feef['id']; ?>"><?php echo $feef['question']; ?></option>	
																			<?php }
																		}
																		?>
																	</select>
																</div>
															</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* Start date:</label>
															<input type="datetime-local" name="txtStart" id="txtStart" class="form-control" required value="<?php //echo $startDate; ?>" min="<?php //echo $startDate; ?>" />
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group">
															<label>* End Date:</label>
															<input type="datetime-local" name="txtEnd" id="txtEnd" class="form-control" required value="<?php //echo $endDate; ?>" min="<?php //echo $endDate; ?>"/>
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
												<!--begin::Search Form-->
												<!--end::Search Form-->
												<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
													<thead>
														<tr>
															<th>ID</th>
															<th>Start Date</th>
											                <th>End Date</th>
											                <th>Participants</th>
											                <th>Status</th>
											                <th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php while($selres = $getConQuery->fetch_assoc()){ ?>
											        	<tr>
											        		<td><?php echo $selres['id']; ?></td>
											        		<td><?php echo date('d-m-Y H:i:s', $selres['start_time']); ?></td>
											        		<td><?php echo date('d-m-Y H:i:s', $selres['end_time']); ?></td>
											        		<td><a href="participants-list?contestId=<?php echo $selres['id']; ?>"><?php echo $selres['totParti']; ?></a></td>
											        		<td>
											        			<?php if($selres['status']==1) { ?>
											        				<a href="create-contest?liveId=<?php echo $selres['id']; ?>" onclick="return checkLive()"><span class="label font-weight-bold label-lg label-light-primary label-inline">Upcoming</span></a>
											        			<?php } else if($selres['status']==2) { ?>
											        				<span class="label font-weight-bold label-lg label-light-danger label-inline">Live</span>
											        			<?php } else if($selres['status']==3) { ?>
											        				<span class="label font-weight-bold label-lg label-light-success label-inline">Finished</span>
											        			<?php } else if($selres['status']==4) { ?>
											        				<span class="label font-weight-bold label-lg label-light-info label-inline">Result Announced</span>
											        			<?php } ?>
											        		</td>
											        		<td>
																<?php if($selres['status']==2 ): ?>
											        			 <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-clean btn-icon mr-2 addparti" title="Add Dummy Participants" data-fid="<?php echo $selres['fee_id']?>" data-efee="<?php echo $selres['price']?>" data-contid="<?php echo $selres['id']?>" data-tik="<?php echo $selres['no_of_tickets'];?>">
											        				<span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			        <polygon points="0 0 24 0 24 24 0 24"/>
																			        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																			        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																			    </g>
																			</svg></span>
											        			</a>
															<?php endif?>
											        			<a href="create-contest?uid=<?php echo $selres['id']; ?>" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">	                            <span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
											        			</g></svg></span>
											        			</a>

											        			<a href="create-contest?did=<?php echo $selres['id']; ?>" class="btn btn-sm btn-clean btn-icon" title="Delete" onclick="return checkDelete()">	                            <span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg></span>
											        			</a>
																<?php if($selres['status']==4): ?>
																<a href="testResultManual.php?fee_id=<?php echo $selres['fee_id'];?>&pkg_id=<?php echo $selres['pkg_id']; ?>" title="Declare Results"><i class="fa fa-award"></i></a>
																<a href="updateUserWallet.php?fee_id=<?php echo $selres['fee_id'];?>&pkg_id=<?php echo $selres['pkg_id']; ?>" title="Update-user-wallet"><i class="fa fa-reply"></i></a>
																<a href="refundUserWalletManual.php?fee_id=<?php echo $selres['fee_id'];?>&pkg_id=<?php echo $selres['pkg_id']; ?>" title="Refund-user-wallet"><i class="fa fa-undo"></i></a>
																	<?php endif;?>
															</td>
											        	</tr>
											        	<?php } ?>
													</tbody>
												</table>
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

					<!--<div class="modal fade" id="addDummyParti" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
					    <div class="modal-dialog modal-dialog-centered" role="document">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h5 class="modal-title" id="exampleModalLabel">Add Dummy Participants</h5>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <i aria-hidden="true" class="ki ki-close"></i>
					                </button>
					            </div>
					            <div class="modal-body">
					            	<form action="create-contest" method="post" action="">
			                	<div class="form-group">
													<label>Select Package</label>
													<select class="form-control" name="txtDPkg" id="txtDPkg" required>
														<?php //while($selrespkg = $getPkg->fetch_assoc()){ ?>
															<option value="<?php //echo $selrespkg['id']; ?>"><?php //echo $selrespkg['pkg_name']; ?></option>
														<?php //} ?>
													</select>
												</div>
												<div class="form-group">
													<label>Number of Participants</label>
													<input type="number" required class="form-control" name="txtTotDparti" />
												</div>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					                <button type="submit" class="btn btn-primary font-weight-bold" name="btnAddDparti">Submit</button>
					                </form>
					            </div>
					        </div>
					    </div>
					</div>-->

					<div id="myModal" class="modal fade" role="dialog">
			     <div class="modal-dialog">

			        <!-- Modal content-->
			        <div class="modal-content">
			          <div class="modal-header">
			            <h4 class="modal-title">Add dummy participant to live contest</h4>
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			          </div>
			          <div class="modal-body">
			            <form method="post" action="addDummyUser">		
			            <label>Enter no. of participant:</label>
						<label>No of Tickets: <b class="tik"></b></label>
						<input type="hidden" name="getContest" id="contestid" value="">
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
			    </div>

					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
					<!--end::Page Vendors-->
					<!--begin::Page Scripts(used by this page)-->
					<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
					<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
						    $('#example').DataTable();
						} );
					</script>
					<script>
					$('.change_pkg_contst').change(function(){
						var packgChange =$(this).val().trim();
						$.ajax({
							url:'pckg_filter_contest.php',
							data:{pkg_id:packgChange},
							type:'POST',
							success:function(res){
								console.log(res);
								//$('#example').remove();
								$('.pkg_change_response').html(res);
								//refreshpage();
								
								
							}

						});
						//console.log("dfdffd",packgChange);
					});
				</script>

				<script type="text/javascript">
				$(document).on("click", ".addparti", function () {
				var tik = $(this).data('tik');
				var contesid= $(this).data('contid');
	             var myrecordId = $(this).data('fid');
	             var myrecordFee = $(this).data('efee');
				 $(".modal-body .tik").html(tik );
				 $(".modal-body #contestid").val(contesid );
	             $(".modal-body #txtFid").val( myrecordId );
	             $(".modal-body #txtFees").val( myrecordFee );
		        });
		        $('#txtNoParti').keyup(function () {
						    var partiVal = $(this).val();
						    document.getElementById("partiVal").innerHTML = partiVal;
						});
				  </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>