<script src="<?php echo base_url()?>assets/js/jsfungsi/absen.js"></script>

<?php echo $this->session->flashdata('notif')?>
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      View <?php echo $submenu?> <?php echo date('d-M-Y', strtotime($this->input->get('Date')))?>

      <div class="widget-toolbar no-border pull-right">
        <a href="" class="btn btn-small btn-info" role="button" data-toggle="modal" name="short" id="short" data-target="#short-data">
  				<i class="icon-check"></i>
  				Short
  			</a>
		  </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="absen-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th class="hidden-480">ID RF</th>
            <th>Nama</th>
            <th class="center">Start</th>
            <th class="center">End</th>
            <th class="hidden-480">Kelas/Jurusan</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i=0;
          foreach($data as $sis) {
          $i++;
          $tgl = $this->input->get('Date'); ?>
          <tr>
            <td class="center" width="10%"><?php echo $i ?></td>
            <td class="hidden-480"><?php echo $sis['id_rf']?>  </td>
            <td><?php echo $sis['nama_depan']?> <?php echo $sis['nama_belakang']?></td>
            <td class="center"><?php echo absenHarian($sis['id_rf'],$tgl,'IN')?></td>
            <td class="center"><?php echo absenHarian($sis['id_rf'],$tgl,'OUT')?></td>
            <td class="hidden-480"><?php echo $sis['kelas']?> <?php echo $sis['jurusan']?> <?php echo $sis['ruang']?> </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Short Data -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="short-data" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Short Absen</h4>
                </div>
                <form data-parsley-validate class="form-horizontal" action="<?php echo site_url('Absen/ShortOrExpt')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-2 control-label">Hari/Tanggal</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control datepicker" data-date-format="dd-M-yyyy" required="required" name="tgl_tab" placeholder="Tanggal" maxlength="12" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kelas/Jurusan </label>
                              <div class="col-sm-3">
                                <select class="select2 form-control" name="kelas" data-placeholder="Pilih Kelas..." required="required">
                                    <option value="X">- - X - -</option>
                                    <option value="XI">- - XI - -</option>
                                    <option value="XII">- - XII - -</option>
                                </select>
                              </div>
                              <div class="col-sm-3">
                                <select class="select2 form-control" name="jurusan" data-placeholder="Pilih Jurusan..." required="required">
                                    <option value="TKJ">- - TKJ - -</option>
                                    <option value="TKR">- - TKR - -</option>
                                    <option value="APS">- - APS - -</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ruang </label>
                              <div class="col-sm-4">
                                <select class="select2 form-control" name="ruang" data-placeholder="Pilih Ruang..." required="required">
                                    <option value="1">- - 1 - -</option>
                                    <option value="2">- - 2 - -</option>
                                    <option value="3">- - 3 - -</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                             	<label class="col-lg-3 col-sm-2 control-label"></label>
                              <label class="col-lg-3 col-sm-2 control-label">
                                <input type="radio" name="ExShort" class="flat-red" checked value="SHO"> &nbsp;SHORT ONLY
                              </label>
                              <label class="col-lg-3 col-sm-2 control-label">
                                <input type="radio" name="ExShort" class="flat-red" value="EXP">&nbsp;CSV EXPORT
                              </label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Submit&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Short Data -->
