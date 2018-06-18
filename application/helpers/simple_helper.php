<?php

function sideAktif($valmenu, $menu){
  $classMenu = '';
      if ($valmenu == $menu){
        $classMenu = 'active open';
      }else{
        $classMenu;
      }
      return $classMenu;
  }

  function subSideAktif($valsubmenu,$submenu){
    $classMenu = '';
        if ($valsubmenu == $submenu){
          $classMenu = 'active';
        }else{
          $classMenu;
        }
        return $classMenu;
    }

function absenHarian($idrf,$tgl,$jns){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $jam ='';
  $dtarray = array(
    'id_rf'  => $idrf,
    'tgl_tab' => $tgl
  );

  $abs = $CI->SimpleModel->chek('tab_absen_harian',$dtarray)->first_row();
    if(!empty($abs)){
      if($jns =='IN'){
        $jam = $abs->jam_masuk;
      }elseif($jns == 'OUT'){
        $jam = $abs->jam_keluar;
      }else{
        $jam = '- - -';
      }
    }else{
      $jam = '- - -';
    }

    return $jam;
}
