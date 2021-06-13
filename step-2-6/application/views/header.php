<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>MNC WEB</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
	<!-- <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/image/favicon.png')?>" /> -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style_mobile.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/mdb/css/mdb.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/mdb/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/datatables.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/RowReorder-1.2.4/css/rowReorder.dataTables.min.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Responsive-2.2.2/css/responsive.dataTables.min.css"/>
	<script type="text/javascript" src="<?= base_url();?>assets/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/jquery-ui/jquery-ui.theme.min.css" />
	<script type="text/javascript" src="<?= base_url();?>assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatables/RowReorder-1.2.4/js/dataTables.rowReorder.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatables/Responsive-2.2.2/js/dataTables.responsive.min.js'); ?>"></script>
<style>
	table th, table td {font-size: 1em;}
	#wait{
		position: fixed;
		background-color: #ded9d978;
		top:0;
		left: 0;
		width: 100%;
		height: 100%;
		padding-top: 45vh;
		text-align: center;
		z-index: 1031;
	}
</style>

</head>
<body>
<div class="wrapper">
	<div id="wait" style="display: none;">
		<img src="<?= base_url('assets/image/loading.gif')?>" width="30px"> <span style="color:#333;font-weight: 400;">Loading...</span>
	</div>