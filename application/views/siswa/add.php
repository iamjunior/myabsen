<script src="<?php echo base_url()?>assets/js/jsfungsi/siswa.js"></script>

<?php echo $this->session->flashdata('notif')?>

					<?php echo form_open('Siswa/addUp', 'class="form-horizontal"')?>
<!--<form class="form-horizontal" role="form">-->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID RF </label>

										<div class="col-sm-9">
											<input type="text" name="id_rf" placeholder="ID RF" required class="col-xs-10 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" maxlength="10" value="<?php echo @$_SESSION['id_rfS']?>"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIS </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="nis" placeholder="NIS" required class="col-xs-10 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" maxlength="16" value="<?php echo @$_SESSION['nisS']?>" />
										</div>
									</div>

                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Depan </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="nama_depan" placeholder="Nama Depan" required class="col-xs-10 col-sm-5" maxlength="30" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo @$_SESSION['nama_depanS']?>"/>
										</div>
									</div>

                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1" maxlength="30"> Nama Belakang </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="nama_belakang" placeholder="Nama Belakang" required class="col-xs-10 col-sm-5" maxlength="30" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo @$_SESSION['nama_belakangS']?>"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kelas </label>
										<div class="col-sm-4">
                      <select class="select2 form-control" name="kelas" data-placeholder="Pilih Kelas..." required="required">
                        <option value="">- - Pilih - -</option>
												<?php if (@$_SESSION['kelasS'] == 'X') {?>
													<option value="X" selected>- - X - -</option> <?php }else{ ?>
													<option value="X">- - X - -</option> <?php }?>
												<?php if (@$_SESSION['kelasS'] == 'XI') {?>
													<option value="XI" selected>- - XI - -</option> <?php }else{ ?>
													<option value="XI">- - XI - -</option> <?php }?>
												<?php if (@$_SESSION['kelasS'] == 'XI') {?>
													<option value="XII" selected>- - XII - -</option> <?php }else{ ?>
													<option value="XII">- - XII - -</option> <?php }?>
                      </select>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jurusan </label>
										<div class="col-sm-4">
                      <select class="select2 form-control" name="jurusan" data-placeholder="Pilih Jurusan..." required="required">
                        <option value="">- - Pilih - -</option>
												<?php if (@$_SESSION['jurusanS'] == 'TKJ') { ?>
													<option value="TKJ" selected>- - TKJ - -</option> <?php } else {?>
													<option value="TKJ">- - TKJ - -</option> <?php }?>
												<?php if(@$_SESSION['jurusanS'] == 'TKR') { ?>
													<option value="TKR" selected>- - TKR - -</option> <?php } else {?>
													<option value="TKR">- - TKR - -</option> <?php }?>
												<?php if(@$_SESSION['jurusanS'] == 'APS') { ?>
													<option value="APS" selected>- - APS - -</option> <?php } else {?>
													<option value="APS">- - APS - -</option> <?php }?>
                      </select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ruang </label>
										<div class="col-sm-4">
                      <select class="select2 form-control" name="ruang" data-placeholder="Pilih Ruang..." required="required">
                        <option value="">- - Pilih - -</option>
												<?php if (@$_SESSION['ruangS'] == '1') { ?>
													<option value="1" selected>- - 1 - -</option> <?php } else {?>
													<option value="1">- - 1 - -</option> <?php }?>
												<?php if(@$_SESSION['ruangS'] == '2') { ?>
													<option value="2" selected>- - 2 - -</option> <?php } else {?>
													<option value="2">- - 2 - -</option> <?php }?>
												<?php if(@$_SESSION['ruangS'] == '3') { ?>
													<option value="3" selected>- - 3 - -</option> <?php } else {?>
													<option value="3">- - 3 - -</option> <?php }?>
                      </select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email </label>

										<div class="col-sm-9">
											<input type="email" id="form-field-1-1" name="email" placeholder="email" required class="col-xs-10 col-sm-5" maxlength="50" value="<?php echo @$_SESSION['emailS']?>"/>
										</div>
									</div>


									<div class="space-4"></div>

                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
										<div class="col-sm-4">
											<textarea class="autosize-transition form-control" id="form-field-9" name="alamat" maxlength="160" required placeholder="Ketikan Alamat.."><?php echo @$_SESSION['alamatS']?></textarea>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<a href="<?php echo site_url()?>Siswa" class="btn">
												<i class="ace-icon fa fa-reply bigger-110"></i>
												Back
											</a>
										</div>
									</div>

								</form>
