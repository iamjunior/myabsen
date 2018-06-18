<?php
//$tanggal=date('Y-m-d');
$tanggal  =date('d-M-Y', strtotime($this->input->get('Date')));
$kelas    = $this->input->get('Kelas');
$jurusan  = $this->input->get('Jurusan');
$ruang    = $this->input->get('Ruang');

header("Content-type: application/ectet-stream");
header("Content-Disposition: attachment; filename=Absen/$kelas/$jurusan/$ruang/$tanggal.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
		<style type="text/css">
			 table{
          border-collapse: collapse;
          font-size: 13px;
          color:#000000;
          width: 100%;

      }
    /*mengatur warna latar belakang, jarak antar kolom, dan posisi teks pada Header Tabel*/
      thead th{
          padding: 5px;
          background: #6bbefd;


      }

      tbody td{
          border-top: 1px ;
 }
		</style>

<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>ID RF</th>
      <th>Nama</th>
      <th>Start</th>
      <th>End</th>
      <th>Kelas/Jurusan</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $i=0;
    foreach($data as $sis) {
    $i++;
    $tgl = $this->input->get('Date'); ?>
    <tr>
      <td width="10%"><?php echo $i ?></td>
      <td><?php echo $sis['id_rf']?>  </td>
      <td><?php echo $sis['nama_depan']?> <?php echo $sis['nama_belakang']?></td>
      <td><?php echo absenHarian($sis['id_rf'],$tgl,'IN')?></td>
      <td><?php echo absenHarian($sis['id_rf'],$tgl,'OUT')?></td>
      <td><?php echo $sis['kelas']?> <?php echo $sis['jurusan']?> <?php echo $sis['ruang']?> </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
