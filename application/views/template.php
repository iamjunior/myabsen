<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Inventory | Astrindo</title>
		<link rel="icon" href="<?php echo base_url('assets/images/avatars/200x200.png'); ?>" type="image/x-icon">
		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-colorpicker.min.css" />

    <!--UNTUK PROFILE-->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />

		<!-- ace settings handler -->
		<script src="<?php echo base_url()?>assets/js/ace-extra.min.js"></script>

    <!--JAVASCRIPT CODE AND LOAD-->

  		<!-- basic scripts -->

  		<!--[if !IE]> -->
  		<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>

  		<!-- <![endif]-->

  		<!--[if IE]>
      <script src="<?php echo base_url()?>assets/js/jquery-1.11.3.min.js"></script>
      <![endif]-->
  		<script type="text/javascript">
  			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
  		</script>
  		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

  		<!-- page specific plugin scripts -->
      <!--FROM DATATABLES-->
  		<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/buttons.colVis.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/dataTables.select.min.js"></script>

      <!--FROM ADD FORM-->
      <script src="<?php echo base_url()?>assets/js/jquery-ui.custom.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/chosen.jquery.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/spinbox.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap-timepicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/daterangepicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap-colorpicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.knob.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/autosize.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.inputlimiter.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.maskedinput.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap-tag.min.js"></script>

      <!--FROM PROFILE-->
      <script src="<?php echo base_url()?>assets/js/jquery-ui.custom.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.gritter.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/bootbox.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.easypiechart.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.hotkeys.index.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/spinbox.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/bootstrap-editable.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/ace-editable.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/jquery.maskedinput.min.js"></script>

  		<!-- ace scripts -->
  		<script src="<?php echo base_url()?>assets/js/ace-elements.min.js"></script>
  		<script src="<?php echo base_url()?>assets/js/ace.min.js"></script>

    	<!-- inline scripts related to this page -->

	</head>

	<body class="no-skin">
		<!--NAVBAR MENU -->

    <?php $this->load->view('navbar') ?>

    <!--//END NAVBAR MENU-->

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<!--SIDEBAR MENU-->

      <?php $this->load->view('sidebar')?>

      <!--//END SIDEBAR MENU-->

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#"><?php echo $menu ?></a>
							</li>

							<li>
								<a href="#"><?php echo $submenu ?></a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

                <?php $this->load->view($content)?>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">TKJ</span>
							Application &copy; 2018-2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

	</body>
</html>
