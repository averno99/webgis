<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 10 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>WEBGIS - <?= $judul?></title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?= base_url()?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?= base_url()?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?= base_url()?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="<?= base_url()?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
		<link rel="stylesheet" href="<?=base_url()?>assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    
		<link rel="shortcut icon" href="<?= base_url()?>assets/media/logos/favicon.ico" />

		<style type="text/css">
        	#mapid { height: 450px; width: 1200px}
			.icon {
      			display: inline-block;
      			margin: 2px;
      			height: 16px;
      			width: 16px;
      			background-color: #ccc;
      		}
      		.icon-bar {
        		background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    		}
    	</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->