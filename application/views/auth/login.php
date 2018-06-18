<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login | Astrindo</title>
    <link rel="icon" href="<?php echo base_url('assets/images/avatars/logoSMK.png'); ?>" type="image/x-icon">
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h2>
                  <span class="white" id="id-text2">MyAbsen</span> | <img src="<?php echo base_url()?>assets/images/avatars/logoSMK.png" width="25">
								</h2>
								<h4 class="blue" id="id-company-text">

                </h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-globe green"></i>
												Please Login
											</h4>

											<div class="space-6"></div>

											<?php echo form_open('auth/chekLogin', 'class="form-login"')?>
											<!--<form method="post" action="<?php //echo site_url('auth/chekLogin')?>">-->
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" required name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" required name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<?php if (validation_errors() || $this->session->flashdata('loginGagal')) { ?>
										            <div class="alert alert-danger animated fadeInDown" role="alert">
										                <button type="button" class="close" data-dismiss="alert">&times;</button>
										                <strong>Warning!</strong>
										                <?php echo validation_errors(); ?>
										                <?php echo $this->session->flashdata('loginGagal'); ?>
										            </div>
										      <?php } ?>

													<div class="clearfix">
                            <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div></div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->


						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			});
		</script>
	</body>
</html>
