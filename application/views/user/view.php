<script src="<?php echo base_url()?>assets/js/jsfungsi/user.js"></script>

<?php echo $this->session->flashdata('notif')?>
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      View <?php echo $submenu?>

      <div class="widget-toolbar no-border pull-right">
  			<a href="" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah" data-target="#tambah-data">
  				<i class="icon-check"></i>
  				Tambah
  			</a>
		  </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="user-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i=0;
          foreach($data as $user) {
          $i++; ?>
          <tr>
            <td class="center" width="10%"><?php echo $i ?></td>
            <td><?php echo $user['username']?>
            <td><?php echo $user['full_name']?>
            </td>

            <td class="center" width="10%">
              <div class="hidden-sm hidden-xs action-buttons">
                <a  class="green" href="javascript:;"
                    data-id="<?php echo $user['id_user']; ?>"
                    data-kode="<?php echo $user['username']; ?>"
                    data-nama="<?php echo $user['full_name']; ?>"
                    data-toggle="modal" data-target="#edit-datauser">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a  class="blue" href="javascript:;"
                    data-id="<?php echo $user['id_user']; ?>"
                    data-toggle="modal" data-target="#edit-datapwd">
                  <i class="ace-icon fa fa-key bigger-130"></i>
                </a>

                <a class="red" href="<?php echo site_url('User/delete?OSs='."098/gHG".'&iknD='.$user['id_user'].'&cBg='.date("hisa"));?>"
                  onClick="return confirm('Do you want to Delete <?php echo $user['full_name'];?> ?')">
                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
              </div>

              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                    <li>
                      <a  href="javascript"
                          data-id="<?php echo $user['id_user']; ?>"
                          data-kode="<?php echo $user['username']; ?>"
                          data-nama="<?php echo $user['full_name']; ?>"
                          data-toggle="modal" data-target="#edit-datauser"
                          class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a  href="javascript"
                          data-id="<?php echo $user['id_user']; ?>"
                          data-toggle="modal" data-target="#edit-datapwd"
                          class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="blue">
                          <i class="ace-icon fa fa-key bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="javascript"
                      data-kode="<?php echo $user['id_user']; ?>"
                      data-toggle="modal" data-target="#delete-datauser"
                      class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Tambah User</h4>
                </div>
                <form data-parsley-validate class="form-horizontal" action="<?php echo site_url('User/add')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" required="required" name="username" placeholder="Username" maxlength="10" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-2 control-label">Full Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" required="required" name="full_name" placeholder="Full Name" maxlength="60" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-2 control-label">Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" required="required" name="password" placeholder="*****" maxlength="30" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Tambah -->
    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-datauser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Data</h4>
                </div>
                <form class="form-horizontal" data-parsley-validate action="<?php echo site_url('User/edit')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                              <div class="form-group">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" required="required" id="kode" name="username" placeholder="Username" maxlength="3" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 col-sm-2 control-label">Full Name</label>
                                  <div class="col-lg-6">
                                    <input type="hidden" class="form-control" required="required" id="id" name="id_user" placeholder="ID User" maxlength="30" onkeyup="this.value = this.value.toUpperCase()">
                                    <input type="text" class="form-control" required="required" id="nama" name="full_name" placeholder="Full Name" maxlength="30" onkeyup="this.value = this.value.toUpperCase()">
                                  </div>
                                </div>

                              </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Ubah -->

    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-datapwd" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <form class="form-horizontal" data-parsley-validate action="<?php echo site_url('User/editPwd')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                              <div class="form-group">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Password</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" required="required" name="password" placeholder="*****" maxlength="36">
                                        <input type="hidden" class="form-control" required="required" id="id" name="id_user" placeholder="ID User" maxlength="30" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>

                              </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Ubah -->


    <!-- Modal Delete -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-datauser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Do You Want to Delete..??</h4>
                </div>
                <form class="form-horizontal" data-parsley-validate action="<?php echo site_url('User/delete')?>" method="get" enctype="multipart/form-data" role="form">
                    <div class="modal-body center bg-danger">
                              <div class="form-group">
                                <input type="hidden" class="form-control" required="required" id="kode" name="iknD" placeholder="ID">
                                <button class="btn btn-danger" type="submit"> OK&nbsp;</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Delete -->
