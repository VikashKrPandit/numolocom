<?php 
include('include/security.php');

$conStausQuery1   = $conn->query("select count(*) as upcContest from tbl_contest where status=1"); 
$conStausQuery1 = $conStausQuery1->fetch_assoc();
$conStausQuery2   = $conn->query("select count(*) as liveContest from tbl_contest where status=2"); 
$conStausQuery2 = $conStausQuery2->fetch_assoc();
$conStausQuery3   = $conn->query("select count(*) as finContest from tbl_contest where status=3"); 
$conStausQuery3 = $conStausQuery3->fetch_assoc();
$conStausQuery4   = $conn->query("select count(*) as raContest from tbl_contest where status=4"); 
$conStausQuery4 = $conStausQuery4->fetch_assoc();

$totContest   = $conn->query("select count(*) as totContest from tbl_contest"); 
$totContest = $totContest->fetch_assoc();

$totPkg   = $conn->query("select count(*) as totPkgs from tbl_packages"); 
$totPkgs = $totPkg->fetch_assoc();

$totBugRpt   = $conn->query("select count(*) as totBugRpt from tbl_report_issue"); 
$totBugRpt = $totBugRpt->fetch_assoc();

$totUser   = $conn->query("select count(*) as totUser from tbl_user"); 
$totUser = $totUser->fetch_assoc();

$totWithSuc   = $conn->query("select count(IFNULL(id,0)) as totWithSuc from tbl_transaction where type=0 and status=1"); 
$totWithSuc = $totWithSuc->fetch_assoc();

$totWithRej   = $conn->query("select count(*) as totWithRej from tbl_transaction where type=0 and status=2"); 
$totWithRej = $totWithRej->fetch_assoc();

?>
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Dashboard | <?php echo $appDetRes['app_name'] ?></title>
		<?php include('include/head-section.php'); ?>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
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
									<div class="col-lg-6 col-xxl-4">
										<!--begin::Mixed Widget 1-->
										<div class="card card-custom bg-gray-100 card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title font-weight-bolder text-white">Contest Status</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<h1><?php echo $conStausQuery1['upcContest']; ?></h1>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-warning font-weight-bold font-size-h6">Upcoming</a>
														</div>
														<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<h1><?php echo $conStausQuery2['liveContest']; ?></h1>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Live</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<h1><?php echo $conStausQuery3['finContest']; ?></h1>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Finished</a>
														</div>
														<div class="col bg-light-success px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
																<h1><?php echo $conStausQuery4['raContest']; ?></h1>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Result Announced</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 1-->
									</div>
									<div class="col-xl-4">
										<div class="row">
											<div class="col-xl-12">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <rect x="0" y="0" width="24" height="24"/>
															        <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															        <path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="#000000"/>
															    </g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totContest['totContest']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Total Contest</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
										<div class="row">
											<div class="col-xl-12">
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <polygon points="0 0 24 0 24 24 0 24"/>
															        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
															        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
															    </g>
															</svg>
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totPkgs['totPkgs']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Contest Type</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xl-12">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <polygon points="0 0 24 0 24 24 0 24"/>
															        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
															    </g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totUser['totUser']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Total User</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="row">
											<div class="col-xl-12">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <polygon points="0 0 24 0 24 24 0 24"/>
															        <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
															        <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
															    </g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totWithSuc['totWithSuc']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Successfully Withdraw</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
										<div class="row">
											<div class="col-xl-12">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
															            <rect x="0" y="7" width="16" height="2" rx="1"/>
															            <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
															        </g>
															    </g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totWithRej['totWithRej']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Withdraw Rejected</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
										<div class="row">
											<div class="col-xl-12">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<i class="fas fa-bug fa-2x text-primary"></i>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $totBugRpt['totBugRpt']; ?></span>
														<span class="font-weight-bold text-muted font-size-sm">Bug Report</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include('include/footer.php'); ?>
					
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>