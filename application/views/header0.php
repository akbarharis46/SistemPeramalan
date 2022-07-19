<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../">
	<meta charset="utf-8" />
	<title>MILAGROS</title>
	<meta name="description" content="Aside light theme example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="<?php echo base_url('assets') ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo base_url('assets') ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets') ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets') ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="<?php echo base_url('assets') ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets') ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets') ?>/assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets') ?>/assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/assets/media/logos/favicon.ico" /> -->

	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1400
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#3699FF",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#E4E6EF",
						"dark": "#181C32"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#E1F0FF",
						"secondary": "#EBEDF3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#3F4254",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#EBEDF3",
					"gray-300": "#E4E6EF",
					"gray-400": "#D1D3E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#7E8299",
					"gray-700": "#5E6278",
					"gray-800": "#3F4254",
					"gray-900": "#181C32"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="<?php echo base_url('assets') ?>/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url('assets') ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?php echo base_url('assets') ?>/assets/js/scripts.bundle.js"></script>


	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>


</head>
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header header-fixed">
		<!--begin::Container-->
		<div class="container-fluid d-flex align-items-stretch justify-content-between">
			<!--begin::Header Menu Wrapper-->
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
				<!--begin::Header Menu-->
				<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
					<!--begin::Header Nav-->
					<ul class="menu-nav">
						<li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
							<a href="javascript:;" class="menu-link menu-toggle">
								<span class="menu-text">Pages</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="menu-submenu menu-submenu-classic menu-submenu-left">
								<ul class="menu-subnav">
									<li class="menu-item" aria-haspopup="true">
										<a href="index.html" class="menu-link">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Clothes/Briefcase.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000" />
														<path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">My Account</span>
										</a>
									</li>
									<li class="menu-item" aria-haspopup="true">
										<a href="javascript:;" class="menu-link">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Task Manager</span>
											<span class="menu-label">
												<span class="label label-success label-rounded">2</span>
											</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Code/CMD.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M9,15 L7.5,15 C6.67157288,15 6,15.6715729 6,16.5 C6,17.3284271 6.67157288,18 7.5,18 C8.32842712,18 9,17.3284271 9,16.5 L9,15 Z M9,15 L9,9 L15,9 L15,15 L9,15 Z M15,16.5 C15,17.3284271 15.6715729,18 16.5,18 C17.3284271,18 18,17.3284271 18,16.5 C18,15.6715729 17.3284271,15 16.5,15 L15,15 L15,16.5 Z M16.5,9 C17.3284271,9 18,8.32842712 18,7.5 C18,6.67157288 17.3284271,6 16.5,6 C15.6715729,6 15,6.67157288 15,7.5 L15,9 L16.5,9 Z M9,7.5 C9,6.67157288 8.32842712,6 7.5,6 C6.67157288,6 6,6.67157288 6,7.5 C6,8.32842712 6.67157288,9 7.5,9 L9,9 L9,7.5 Z M11,13 L13,13 L13,11 L11,11 L11,13 Z M13,11 L13,7.5 C13,5.56700338 14.5670034,4 16.5,4 C18.4329966,4 20,5.56700338 20,7.5 C20,9.43299662 18.4329966,11 16.5,11 L13,11 Z M16.5,13 C18.4329966,13 20,14.5670034 20,16.5 C20,18.4329966 18.4329966,20 16.5,20 C14.5670034,20 13,18.4329966 13,16.5 L13,13 L16.5,13 Z M11,16.5 C11,18.4329966 9.43299662,20 7.5,20 C5.56700338,20 4,18.4329966 4,16.5 C4,14.5670034 5.56700338,13 7.5,13 L11,13 L11,16.5 Z M7.5,11 C5.56700338,11 4,9.43299662 4,7.5 C4,5.56700338 5.56700338,4 7.5,4 C9.43299662,4 11,5.56700338 11,7.5 L11,11 L7.5,11 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Team Manager</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu menu-submenu-classic menu-submenu-right">
											<ul class="menu-subnav">
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Add Team Member</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Edit Team Member</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Delete Team Member</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Team Member Reports</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Assign Tasks</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Promote Team Member</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
										<a href="#" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Communication/Mail-box.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z" fill="#000000" />
														<path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Projects Manager</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu menu-submenu-classic menu-submenu-right">
											<ul class="menu-subnav">
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-line">
															<span></span>
														</i>
														<span class="menu-text">Latest Projects</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-line">
															<span></span>
														</i>
														<span class="menu-text">Ongoing Projects</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-line">
															<span></span>
														</i>
														<span class="menu-text">Urgent Projects</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-line">
															<span></span>
														</i>
														<span class="menu-text">Completed Projects</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="javascript:;" class="menu-link">
														<i class="menu-bullet menu-bullet-line">
															<span></span>
														</i>
														<span class="menu-text">Dropped Projects</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="menu-item" aria-haspopup="true">
										<a href="javascript:;" class="menu-link">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Communication/Spam.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z M10.5857864,14 L9.17157288,15.4142136 C8.78104858,15.8047379 8.78104858,16.4379028 9.17157288,16.8284271 C9.56209717,17.2189514 10.1952621,17.2189514 10.5857864,16.8284271 L12,15.4142136 L13.4142136,16.8284271 C13.8047379,17.2189514 14.4379028,17.2189514 14.8284271,16.8284271 C15.2189514,16.4379028 15.2189514,15.8047379 14.8284271,15.4142136 L13.4142136,14 L14.8284271,12.5857864 C15.2189514,12.1952621 15.2189514,11.5620972 14.8284271,11.1715729 C14.4379028,10.7810486 13.8047379,10.7810486 13.4142136,11.1715729 L12,12.5857864 L10.5857864,11.1715729 C10.1952621,10.7810486 9.56209717,10.7810486 9.17157288,11.1715729 C8.78104858,11.5620972 8.78104858,12.1952621 9.17157288,12.5857864 L10.5857864,14 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Create New Project</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


					</ul>
					<!--end::Header Nav-->
				</div>
				<!--end::Header Menu-->
			</div>
			<!--end::Header Menu Wrapper-->
			<!--begin::Topbar-->
			<div class="topbar">
				<!--begin::Search-->
				<!--end::Search-->
				<!--begin::Notifications-->
				<div class="dropdown">
					<!--begin::Toggle-->
					<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
						<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
							<span class="svg-icon svg-icon-xl svg-icon-primary">
								<!--begin::Svg Icon | path:<?php echo base_url('assets') ?>/assets/media/svg/icons/Code/Compiling.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
										<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<span class="pulse-ring"></span>
						</div>
					</div>
					<!--end::Toggle-->
					<!--begin::Dropdown-->
					<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
						<form>

							<!--begin::Content-->
							<div class="tab-content">

								<!--begin::Scroll-->
								<div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
									<!--begin::Tabpane-->
									<div id="notify-draw" class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">

									</div>
								</div>
								<!--end::Tabpane-->
								<!--begin::Tabpane-->
								<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
									<!--begin::Nav-->
									<div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-line-chart text-success"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New report has been received</div>
													<div class="text-muted">23 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-paper-plane text-danger"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">Finance report has been generated</div>
													<div class="text-muted">25 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-user flaticon2-line- text-success"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New order has been received</div>
													<div class="text-muted">2 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-pin text-primary"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New customer is registered</div>
													<div class="text-muted">3 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-sms text-danger"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">Application has been approved</div>
													<div class="text-muted">3 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-pie-chart-3 text-warning"></i>
												</div>
												<div class="navinavinavi-text">
													<div class="font-weight-bold">New file has been uploaded</div>
													<div class="text-muted">5 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon-pie-chart-1 text-info"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New user feedback received</div>
													<div class="text-muted">8 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-settings text-success"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">System reboot has been successfully completed</div>
													<div class="text-muted">12 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon-safe-shield-protection text-primary"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New order has been placed</div>
													<div class="text-muted">15 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-notification text-primary"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">Company meeting canceled</div>
													<div class="text-muted">19 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-fax text-success"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New report has been received</div>
													<div class="text-muted">23 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon-download-1 text-danger"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">Finance report has been generated</div>
													<div class="text-muted">25 hrs ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon-security text-warning"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New customer comment recieved</div>
													<div class="text-muted">2 days ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
										<!--begin::Item-->
										<a href="#" class="navi-item">
											<div class="navi-link">
												<div class="navi-icon mr-2">
													<i class="flaticon2-analytics-1 text-success"></i>
												</div>
												<div class="navi-text">
													<div class="font-weight-bold">New customer is registered</div>
													<div class="text-muted">3 days ago</div>
												</div>
											</div>
										</a>
										<!--end::Item-->
									</div>
									<!--end::Nav-->
								</div>
								<!--end::Tabpane-->
							</div>
							<!--end::Content-->
						</form>
					</div>
					<!--end::Dropdown-->
				</div>
				<!--end::Notifications-->
				<!--begin::Quick Actions-->
				<!--end::Languages-->
				<!--begin::User-->

				<!--end::User-->
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->

	<!--end::Demo Panel-->




	<script>
		$(function() {


			toastr.options = {
				"closeButton": true,
				"debug": true,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};




			// draw notify
			var callNotify = function() {

				$('#notify-draw').html('<?php echo drawNotify(['read_status' => "delivery"]) ?>')
			}

			var pusher = new Pusher('f94c640978d3a129165b', {
				cluster: 'ap1'
			});

			var channel = pusher.subscribe('my-channel');
			channel.bind('my-event', function(data) {
				// alert(JSON.stringify(data));

				toastr.info(data.message, "Pemberitahuan");
				callNotify();
			});


			// default
			callNotify();
		});
	</script>