<?php
	$activePage = basename($_SERVER['PHP_SELF'], ".php");

	$masterMenu = array('fees-master','prizepool-master','payout-master','package-master');
	$configMenu = array('about','contact','app-detail','app-update','privacy-policy');
?>
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
	<!--begin::Brand-->
	<div class="brand flex-column-auto" id="kt_brand">
		<!--begin::Logo-->
		<a href="index" class="brand-logo">
			<!-- <img alt="Logo" src="<?php // echo $appDetRes['logo']; ?>" width="100"/> -->
			<h3><?php echo $appDetRes['app_name']; ?></h3>
		</a>
		<!--end::Logo-->
		<!--begin::Toggle-->
		<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
			<span class="svg-icon svg-icon svg-icon-xl">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
						<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</button>
		<!--end::Toolbar-->
	</div>
	<!--end::Brand-->
	<!--begin::Aside Menu-->
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
		<!--begin::Menu Container-->
		<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
			<!--begin::Menu Nav-->
			<ul class="menu-nav">
				<li class="menu-item <?php if ($activePage=="index"|$activePage=="") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="index" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
									<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Dashboard</span>
					</a>
				</li>
				<li class="menu-section">
					<h4 class="menu-text">App</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>
				<li class="menu-item menu-item-submenu <?php if(in_array($activePage, $masterMenu)){echo "menu-item-open menu-item-here"; }?>" aria-haspopup="true" data-menu-toggle="hover">
					<a href="javascript:;" class="menu-link menu-toggle">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
									<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Master</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="menu-submenu">
						<i class="menu-arrow"></i>
						<ul class="menu-subnav">
							<li class="menu-item menu-item-parent" aria-haspopup="true">
								<span class="menu-link">
									<span class="menu-text">Master</span>
								</span>
							</li>
							<li class="menu-item <?php if ($activePage=="package-master") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="package-master" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Packages</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="fees-master") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="fees-master" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Fees</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="prizepool-master") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="prizepool-master" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Prizepool</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="menu-item menu-item-submenu <?php if(in_array($activePage, $configMenu)){echo "menu-item-open menu-item-here"; }?>" aria-haspopup="true" data-menu-toggle="hover">
					<a href="javascript:;" class="menu-link menu-toggle">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Configuration</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="menu-submenu">
						<i class="menu-arrow"></i>
						<ul class="menu-subnav">
							<li class="menu-item menu-item-parent" aria-haspopup="true">
								<span class="menu-link">
									<span class="menu-text">Configuration</span>
								</span>
							</li>
							<li class="menu-item <?php if ($activePage=="about") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="about" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">About</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="contact") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="contact" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Contact</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="app-detail") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="app-detail" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">App Details</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="app-update") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="app-update" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">App Update</span>
								</a>
							</li>
							<li class="menu-item <?php if ($activePage=="privacy-policy") {echo "menu-item-active"; } ?>" aria-haspopup="true">
								<a href="privacy-policy" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Privacy Policy</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="menu-item <?php if ($activePage=="create-contest") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="create-contest" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							        <path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="#000000"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Contest</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="user") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="user" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <polygon points="0 0 24 0 24 24 0 24"/>
							        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">User</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="dummy-user") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="dummy-user" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <polygon points="0 0 24 0 24 24 0 24"/>
							        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Dummy User</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="bank-details-verification") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="bank-details-verification" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z" fill="#000000"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Bank Details Verification</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="withdraw-request") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="withdraw-request" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <polygon points="0 0 24 0 24 24 0 24"/>
							        <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/>
							        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Withdraw Request</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="transaction") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="transaction" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <polygon points="0 0 24 0 24 24 0 24"/>
							        <rect fill="#000000" opacity="0.3" transform="translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) " x="12" y="8.8817842e-16" width="2" height="12" rx="1"/>
							        <path d="M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) "/>
							        <rect fill="#000000" opacity="0.3" transform="translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) " x="10" y="12" width="2" height="12" rx="1"/>
							        <path d="M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z" fill="#000000" fill-rule="nonzero" transform="translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) "/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Transaction</span>
					</a>
				</li>
				<li class="menu-item <?php if ($activePage=="send-notification") {echo "menu-item-active"; } ?>" aria-haspopup="true">
					<a href="send-notification" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
							        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Send Notification</span>
					</a>
				</li>
			</ul>
			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
	<!--end::Aside Menu-->
</div>