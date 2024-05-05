<?php 
include('include/security.php');

if(isset($_GET['contestId']))
{
	$contestId = $_GET['contestId'];
	$verifyConQry = $conn->query("select * from tbl_contest where id='$contestId'");
	$verifyRes = $verifyConQry->fetch_assoc();
	
	if($verifyRes['status']==1 | $verifyRes['status']==2)
	{
		flash( 'fmsg', 'fmsg', 'Contest is not finished yet!', 'danger', 'TRUE' );
		header("Location:create-contest");
		exit();
	}
	elseif($verifyRes['status']==4)
	{
		flash( 'fmsg', 'fmsg', 'Contest is finished and result declared.', 'danger', 'TRUE' );
		header("Location:create-contest");
		exit();
	}
	else
	{
		$getConManQry = $conn->query("select fees_id, entry_fee, count(id) as totParti from tbl_participants where contest_id=$contestId group by fees_id");
	}

	

	$conn->close();
}
else
{
	flash( 'fmsg', 'fmsg', 'You may broken something!', 'warning', 'TRUE' );
	header("Location:create-contest");
	exit();
}

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Manual rank distribution | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<script language="JavaScript" type="text/javascript">
	      function checkDelete(){
	          return confirm('Are you sure you want to delete this Record? By deleting this record all associated data are deleted.');
	      }
	    </script>
	    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Manual rank distribution</h5>
									<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
										<li class="breadcrumb-item">
											<a href="create-contest" class="text-muted">Contest</a>
										</li>
										<li class="breadcrumb-item">
											<a href="generate-result?contestId=<?php echo $contestId; ?>" class="text-muted">Generate Result</a>
										</li>
									</ul>
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
									<div class="col-xl-12">
										<!--begin::Engage Widget 2-->
										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 bg-danger p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-3.svg)">
													<h4 class="text-inverse-danger mt-2 font-weight-bolder">Select Contest</h4>
													<p class="text-inverse-danger my-6">
														<ul class="text-white">
															<li>List of contest, in which manual entry are available</li>
															<li>Filtered data according participation.</li>
														</ul>
													</p>
												</div>
											</div>
										</div>
										<!--end::Engage Widget 2-->
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="card card-custom gutter-b">
											<div class="card-body">
												<table class="table table-bordered" id="example">
													<thead>
														<tr>
															<th>Contest Price</th>
															<th>Total Participants</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
														<?php while($manConRes = $getConManQry->fetch_assoc()) { ?>
														<tr>
															<td><?php echo $manConRes['entry_fee']; ?></td>
															<td><?php echo $manConRes['totParti']; ?></td>
															<td nowrap="nowrap"><a href="manual-rank-distribution?fid=<?php echo $manConRes['fees_id']; ?>&contestId=<?php echo $contestId; ?>" class="btn btn-primary">Select</a></td>
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
					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
					<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
					<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
						    $('#example').DataTable();
						} );
					</script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>