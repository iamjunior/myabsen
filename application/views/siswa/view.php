<script src="<?php echo base_url()?>assets/js/jsfungsi/siswa.js"></script>

<?php echo $this->session->flashdata('notif')?>
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      View <?php echo $submenu?>

      <div class="widget-toolbar no-border pull-right">
  			<a href="<?php echo site_url('Siswa/add')?>" class="btn btn-small btn-info" role="button" name="tambah" id="tambah">
  				<i class="icon-check"></i>
  				Tambah
  			</a>
		  </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="siswa-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th>ID RF</th>
            <th>NIS</th>
            <th class="hidden-480">Nama</th>
            <th class="hidden-480">Kelas</th>
            <th class="hidden-480">Jurusan</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i=0;
          foreach($data as $sis) {
          $i++; ?>
          <tr>
            <td class="center" width="10%"><?php echo $i ?></td>
            <td><?php echo $sis['id_rf']?>  </td>
            <td><?php echo $sis['nis']?>  </td>
            <td class="hidden-480"><?php echo $sis['nama_depan']?> <?php echo $sis['nama_belakang']?></td>
            <td class="hidden-480"><?php echo $sis['kelas']?>       </td>
            <td class="hidden-480"><?php echo $sis['jurusan']?><?php echo $sis['ruang']?> </td>
            <td class="center" width="10%">
              <div class="hidden-sm hidden-xs action-buttons">
                <a href="<?php echo site_url('Siswa/edit?iknD='.$sis['id'].'&iR='."iRsH".'&BpF='."g95ii")?>" class="green">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" href="<?php echo site_url('Siswa/delete?iknD='.$sis['id'].'&iR='."iRsH".'&BpF='."g95ii")?>"
                  onClick="return confirm('Do you want to Delete <?php echo $sis['nama_depan'];?> ?')">
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
                          data-kode="<?php echo $sis['id']; ?>"
                          data-nama="<?php echo $sis['nama_depan'] ?>"
                          data-toggle="modal" data-target="#edit-datasiswa"
                          class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="javascript"
                      data-kode="<?php echo $sis['id']; ?>"
                      data-toggle="modal" data-target="#delete-datasiswa"
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

    <!-- Modal Delete -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-datasiswa" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Do You Want to Delete..??</h4>
                </div>
                <form class="form-horizontal" data-parsley-validate action="<?php echo site_url('siswa/delete')?>" method="get" enctype="multipart/form-data" role="form">
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
