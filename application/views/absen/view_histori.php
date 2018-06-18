<script src="<?php echo base_url()?>assets/js/jsfungsi/absen.js"></script>

<?php echo $this->session->flashdata('notif')?>
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      View <?php echo $submenu?> <?php echo date('d-M-Y', strtotime($this->input->get('Date')))?>

      <div class="widget-toolbar no-border pull-right">
  			<!-- Nantinya bisa diisi apa aja-->
		  </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="histori-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th>ID RF</th>
            <th>Jam</th>
            <th class="center">His</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i=0;
          foreach($data as $his) {
          $i++;
          $tgl = $this->input->get('Date'); ?>
          <tr>
            <td class="center" width="10%"><?php echo $i ?></td>
            <td class="hidden-480"><?php echo $his['id_rf']?>  </td>
            <td><?php echo $his['jam_tab']?></td>
            <td class="center"><?php echo $his['tgl_histori_tab']?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
