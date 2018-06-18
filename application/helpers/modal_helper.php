<?php

function rqlLeadOne($idprf,$idrq,$jns){//one/two/three
  $CI    = get_instance();
  $CI->load->model('RequestModel');
  $CI->load->model('SimpleModel');

  $rq    = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $rqlRow= $CI->SimpleModel->chek('tb_request_list',array('id_request' => $idrq))->num_rows();
  $dtvr  = $CI->session->userdata('kduser-ivt');
  $btn   = '';

  if ($rq->vr_one == 'Y'){
      $btn = '<a>
                <span class="green">
                  <i class="ace-icon fa fa-check-square-o bigger-120"></i>
                </span>
               </a>';
  }elseif($rq->vr_one == 'N'){
      $btn = '<a>
                <span class="red">
                  <i class="ace-icon fa fa-close bigger-120"></i>
                </span>
              </a>';
  }else{
    if(($rq->kd_vr_one == $dtvr) && ($jns == 'LEAD') && (!empty($rqlRow))){
      $btn = '<span class="action-buttons">
              <a  href="javascript"
                  data-id="'.$idrq.'"
                  data-usr="'.$idprf.'"
                  data-jns="ONE"
                  data-toggle="modal" data-target="#vr-one"
                  class="tooltip-success" data-rel="tooltip" title="Verify">
                  <i class="fa fa-vimeo-square bigger-120 orange"></i>
              </a></span>';
    }else{
      $btn = '<a>
                <span class="blue">
                  <i class="ace-icon fa fa-spinner bigger-120"></i>
                </span>
              </a>';
    }
  }
  return $btn;

}

function rqlLeadTwo($idprf,$idrq,$jns){//one/two/three
  $CI    = get_instance();
  $CI->load->model('RequestModel');

  $rq    = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $dtvr  = $CI->session->userdata('kduser-ivt');
  $btn   = '';

  if (($rq->vr_one == 'Y') && ($rq->vr_two == 'W')){
      if(($rq->kd_vr_two == $dtvr) && ($jns == 'LEAD')){
        $btn = '<span class="action-buttons">
                <a  href="javascript"
                    data-id="'.$idrq.'"
                    data-usr="'.$idprf.'"
                    data-jns="TWO"
                    data-toggle="modal" data-target="#vr-one"
                    class="tooltip-success" data-rel="tooltip" title="Verify">
                    <i class="fa fa-vimeo-square bigger-120 orange"></i>
                </a></span>';
        }else{
          $btn = '<a>
                <span class="blue">
                  <i class="fa fa-spinner bigger-120"></i>
                </span>
               </a>';
        }
  }elseif(($rq->vr_one == 'W') && ($rq->vr_two == 'W')){
      $btn = '<a>
                <span class="blue">
                  <i class="fa fa fa-spinner bigger-120"></i>
                </span>
              </a>';
  }elseif(($rq->vr_one == 'N') && ($rq->vr_two == 'W')){
      $btn = '<a>
                <span class="red">
                  <i class="ace-icon fa fa-close bigger-120"></i>
                </span>
              </a>';
  }elseif($rq->vr_two == 'Y'){
      $btn = '<a>
                <span class="green">
                  <i class="ace-icon fa fa-check-square-o bigger-120"></i>
                </span>
              </a>';
  }elseif($rq->vr_two == 'N'){
      $btn = '<a>
                <span class="red">
                  <i class="ace-icon fa fa-close bigger-120"></i>
                </span>
              </a>';
  }else{
      $btn = '<a>
                <span class="blue">
                  <i class="ace-icon fa fa-spinner bigger-120"></i>
                </span>
              </a>';
  }
  return $btn;

}


function rqlLeadThree($idprf,$idrq,$jns){//one/two/three
  $CI    = get_instance();
  $CI->load->model('RequestModel');
  $CI->load->model('SimpleModel');

  $brs   = $CI->SimpleModel->chek('tb_request_list',array('id_request' => $idrq, 'status_rqlist' => 'WT'))->num_rows();
  $rq    = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $vr1   = $rq->vr_one;
  $vr2   = $rq->vr_two;
  $vr3   = $rq->vr_three;
  $appr  = $rq->kd_depart_approval;
  $dtvr  = $CI->session->userdata('depart-ivt');
  $btn   = '';

  if (($vr1 == 'Y') && ($vr2 == 'Y') && ($vr3 == 'W')){
      if(($appr == $dtvr) && ($jns == 'LEAD') && (empty($brs))){
        $btn = '<span class="action-buttons">
                <a  href="javascript"
                    data-id="'.$idrq.'"
                    data-usr="'.$idprf.'"
                    data-jns="THREE"
                    data-toggle="modal" data-target="#vr-one"
                    class="tooltip-success" data-rel="tooltip" title="verify">
                    <i class="fa fa-vimeo-square bigger-120 orange"></i>
                </a></span>';
        }else{
          $btn = '<a>
                <span class="blue">
                  <i class="fa fa-spinner bigger-120"></i>
                </span>
               </a>';
        }
  }elseif(($vr1 == 'W') && ($vr2 == 'W') && ($vr3 == 'W')){
      $btn = '<a>
                <span class="blue">
                  <i class="fa fa fa-spinner bigger-120"></i>
                </span>
              </a>';
  }elseif((($vr1 == 'N')&&($vr2 == 'W')&&($vr3 == 'W')) or (($vr1 == 'N')&&($vr2 == 'N')&&($vr3 == 'W')) or
          (($vr1 == 'Y')&&($vr2 == 'N')&&($vr3 == 'W')) or (($vr1 == 'Y')&&($vr2 == 'Y')&&($vr3 == 'N'))){
      $btn = '<a>
                <span class="red">
                  <i class="ace-icon fa fa-close bigger-120"></i>
                </span>
              </a>';
  }elseif(($vr1 == 'Y') && ($vr2 == 'Y') && ($vr3 == 'Y')){
      $btn = '<a>
                <span class="green">
                  <i class="ace-icon fa fa-check-square-o bigger-120"></i>
                </span>
              </a>';
  }else{
      $btn = '<a>
                <span class="blue">
                  <i class="ace-icon fa fa-spinner bigger-120"></i>
                </span>
              </a>';
  }
  return $btn;

}


function listBtn($kdstok,$aod,$stts,$idprf,$idrq,$idrql,$vrTwo){
  $CI = get_instance();

  $CI->load->model('StokModel');
  $CI->load->model('RequestModel');

  $rq    = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $rql   = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $Cek   = $CI->StokModel->minMax($kdstok,$aod)->first_row();
  $appr  = $rq->kd_depart_approval;
  $dtvr  = $CI->session->userdata('depart-ivt');
  $btn = '';

  if ($stts == 'WT'){
    if (!empty($Cek->qt_stok_list)){
      if (($appr == $dtvr) && ($vrTwo == 'Y')){
        $url = site_url('Stok/calc?iD='.date('ss').'&inkD='.$idrq.'&dmJ='."d678i".'&inkL='.$idrql.'&idDOosS='."6Tr1");
        $btn = '<span class="action-buttons">
                <a href="'.$url.'">
                  <span class="blue">
                    <i class="fa fa-archive bigger-130"></i>
                  </span>
                </a></span>';
      }else{
        $btn = '<span class="black">
                    <i class="fa fa-archive bigger-130"></i>
                </span>';
      }

    }else{
      if (($appr == $dtvr) && ($vrTwo == 'Y')){
        $btn = '<span class="action-buttons">
                <a  href="javascript"
                  data-id="'.$idrq.'"
                  data-idl="'.$idrql.'"
                  data-usr="'.$idprf.'"
                  data-jns="ONE"
                  data-toggle="modal" data-target="#send-prc"
                  class="tooltip-success" data-rel="tooltip" title="Verify">
                  <i class="fa fa-question-circle orange bigger-130"></i>
                </a></span>';
      }else{
        $btn = '<span class="black">
                    <i class="fa fa-question-circle bigger-130"></i>
                </span>';
      }
    }

  }elseif($stts == 'US'){
    $btn = '<span class="blue">
                <i class="fa fa-check bigger-130"></i>
            </span>';
  }elseif($stts == 'CP'){
    $btn = '<span class="blue">
              <i class="fa fa-hourglass-start bigger-130"></i>
            </span>';
  }
  elseif($stts == 'DC'){
    $btn = '<span class="red">
              <i class="fa fa-times-circle bigger-130"></i>
            </span>';
  }
  return $btn;
}



function listBtnUsr($kdstok,$aod,$stts,$idprf,$idrq,$vrTwo){
  $CI = get_instance();

  $CI->load->model('StokModel');
  $CI->load->model('RequestModel');

  $rq    = $CI->RequestModel->showDetail($idprf,$idrq)->first_row();
  $Cek   = $CI->StokModel->minMax($kdstok,$aod)->first_row();
  $appr  = $rq->kd_depart_approval;
  $dtvr  = $CI->session->userdata('depart-ivt');
  $btn = '';

  if ($stts == 'WT'){
    $btn = '<span class="orange">
                <i class="fa fa-question-circle bigger-130"></i>
            </span>';
  }elseif($stts == 'US'){
    $btn = '<span class="blue">
                <i class="fa fa-check bigger-130"></i>
            </span>';
  }elseif($stts == 'CP'){
    $btn = '<span class="blue">
              <i class="fa fa-hourglass-start bigger-130"></i>
            </span>';
  }
  elseif($stts == 'DC'){
    $btn = '<span class="red">
              <i class="fa fa-times-circle bigger-130"></i>
            </span>';
  }
  return $btn;
}

function btnDistList($valId){
  $CI = get_instance();

  $CI->load->model('SimpleModel');

  $num 	  = $CI->SimpleModel->chek('tb_distribusi_list',array('id_distribusi' => $valId))->num_rows();
  $first 	= $CI->SimpleModel->chek('tb_distribusi',array('id_distribusi' => $valId))->first_row();

  $btn = '';

  if ($num >= $first->qt_distribusi){
    if ($first->vr_terima == 'W'){
        $btn='<a  href="javascript"
                data-id="'.$valId.'"
                data-toggle="modal" data-target="#dist-verify"
                class="tooltip-warning" data-rel="tooltip" title="Verify">
              <span class="blue">
                <i class="fa fa-vimeo-square bigger-120 orange"></i>
              </span>
            </a>';
        }else{
          $btn='<a  href=""
                  class="tooltip-info" data-rel="tooltip" title="Ok">
                <span class="blue">
                  <i class="fa fa-check bigger-120 blue"></i>
                </span>
              </a>';
        }
  }else{
    if ($first->vr_terima == 'W'){
    $btn='<a  href="javascript"
            data-id="'.$valId.'"
            data-toggle="modal" data-target="#list-dist"
            class="tooltip-info" data-rel="tooltip" title="Add">
          <span class="blue">
            <i class="ace-icon fa fa-plus-circle bigger-120"></i>
          </span>
        </a>';
    }else{
      $btn='<a  href=""
              class="tooltip-default" data-rel="tooltip" title="Add">
            <span class="black">
              <i class="ace-icon fa fa-plus-circle bigger-120"></i>
            </span>
          </a>';
    }
  }
  return $btn;
}


function makeSupCSL($idcl,$idcsl,$supname,$jml){
  $CI = get_instance();

  $CI->load->model('SimpleModel');

  $chek  = $CI->SimpleModel->chek('tb_compare_sublist',array('id_compare_list' => $idcl, 'status_csl ' => 'Y'))->num_rows();
  $chekY = $CI->SimpleModel->chek('tb_compare_sublist',array('id_compare_sublist' => $idcsl))->first_row();
  $total = ($chekY->harga_satuan * $chekY->kurs_deal)*$jml;
  $btn = '';

  if(empty($chek)){
    $btn = '<a  href="javascript"
            data-id="'.$idcsl.'"
            data-aksi="Y"
            data-namasup="'.$supname.'"
            data-harga="'.$chekY->harga_satuan.'"
            data-jumlah="'.$jml.'"
            data-total="'.$total.'"
            data-toggle="modal" data-target="#csl-yes"
            class="tooltip-warning" data-rel="tooltip" title="chose me?">
          <span class="orange">
            <i class="fa fa-question-circle bigger-130"></i>
          </span>
        </a>';
  }else{
    if ($chekY->status_csl =='Y'){
      $btn = '<a  href="javascript"
            data-id="'.$idcsl.'"
            data-aksi="W"
            data-namasup="'.$supname.'"
            data-harga="'.$chekY->harga_satuan.'"
            data-jumlah="'.$jml.'"
            data-total="'.$total.'"
            data-toggle="modal" data-target="#csl-yes"
            class="tooltip-info" data-rel="tooltip" title="cancel me?">
            <span class="blue">
              <i class="fa fa-check bigger-120 green"></i>
            </span>
          </a>';
    }else{
      $btn = '<a>
            <span class="red">
              <i class="fa fa-close bigger-120 red"></i>
            </span>
          </a>';
    }
  }

  return $btn;
}


function statusCSL($stts){
  $btn ='';
  if ($stts == 'Y'){
    $btn = '<i class="fa fa-check bigger-120 green"></i>';
  }else{
    $btn = '<i class="fa fa-spinner bigger-120 blue"></i>';
  }
  return $btn;
}

function btnEditCSL($idcl,$idcsl,$supname,$harga,$kurs){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $btn   = '';
  $cl    = $CI->SimpleModel->chek('tb_compare_sublist',array('id_compare_list' => $idcl, 'status_csl' => 'Y'))->num_rows();

  if(empty($cl)){
    $btn = '<a  href="javascript"
          data-id="'.$idcsl.'"
          data-iddel="'.$idcsl.'"
          data-namasup="'.$supname.'"
          data-harga="'.$harga.'"
          data-kurs="'.$kurs.'"
          data-toggle="modal" data-target="#csl-edit"
          class="tooltip-info" data-rel="tooltip" title="Edit me?">
          <span class="blue">
            <i class="fa fa-pencil bigger-120 green"></i>
          </span>
        </a>';
  }else{
    $btn = '<i class="fa fa-pencil bigger-120"></i>';
  }
  return $btn;
}

function btnComVer($id){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $CI->load->model('CompareModel','ModulModel');
  $btn   = '';

  $dtarray = array(
            'id_compare'      => $id
    );

  $cl   = $CI->SimpleModel->chek('tb_compare_list',$dtarray)->num_rows();
  $csl  = $CI->ModulModel->showJoinForVer($id)->num_rows();
  if($cl == $csl){
    $btn = '<i class="fa fa-check bigger-120 blue"></i>';
  }else{
    $btn = '<i class="ace-icon fa fa-buysellads bigger-120"></i>';
  }
  return $btn;
}


function apprComprOne($id){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $CI->load->model('CompareModel','ModulModel');
  $btn   = '';

  $dtarray = array(
            'id_compare'      => $id
    );

  $dtarrspcl = array(
            'kd_user'         => $CI->session->userdata('kduser-ivt'),
            'kd_special_user' => 'PRC'
  );

  $cl   = $CI->SimpleModel->chek('tb_compare_list',$dtarray)->num_rows();
  $csl  = $CI->ModulModel->showJoinForVer($id)->num_rows();
  $dtl  = $CI->SimpleModel->chek('tb_compare',$dtarray)->first_row();
  $spcl = $CI->SimpleModel->chek('tb_special_user',$dtarrspcl)->num_rows();

  if(($cl == $csl) && ($dtl->vrc_one == 'W')){
      if(!empty($spcl)){
        $btn = '<a  href="javascript"
              data-id="'.$id.'"
              data-jns="ONE"
              data-toggle="modal" data-target="#cr-com"
              class="tooltip-info" data-rel="tooltip" title="Approve Me?">
              <span class="blue">
                <i class="fa fa fa-buysellads bigger-120 blue"></i>
              </span>
            </a>';
      }else{
        $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
      }
  }elseif(($cl == $csl) && ($dtl->vrc_one == 'Y')){
    $btn = '<span class="blue">
                <i class="fa fa-check bigger-130"></i>
            </span>';
  }elseif(($cl == $csl) && ($dtl->vrc_one == 'N')){
    $btn = '<span class="red">
                <i class="fa fa-close bigger-130"></i>
            </span>';
  }else{
    $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
  }
  return $btn;
}

function apprComprTwo($id){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $CI->load->model('CompareModel','ModulModel');
  $btn   = '';

  $dtarray = array(
            'id_compare'      => $id
    );

  $dtarrspcl = array(
            'kd_user'         => $CI->session->userdata('kduser-ivt'),
            'kd_special_user' => 'DRB'
  );

  $cl   = $CI->SimpleModel->chek('tb_compare_list',$dtarray)->num_rows();
  $csl  = $CI->ModulModel->showJoinForVer($id)->num_rows();
  $dtl  = $CI->SimpleModel->chek('tb_compare',$dtarray)->first_row();
  $spcl = $CI->SimpleModel->chek('tb_special_user',$dtarrspcl)->num_rows();

  if(($cl == $csl) && ($dtl->vrc_one == 'Y') && ($dtl->vrc_two == 'W')){
      if(!empty($spcl)){
        $btn = '<a  href="javascript"
              data-id="'.$id.'"
              data-jns="TWO"
              data-toggle="modal" data-target="#cr-com"
              class="tooltip-info" data-rel="tooltip" title="Approve Me?">
              <span class="blue">
                <i class="fa fa fa-buysellads bigger-120 blue"></i>
              </span>
            </a>';
      }else{
        $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
      }
  }elseif(($cl == $csl) && ($dtl->vrc_two == 'Y')){
    $btn = '<span class="blue">
                <i class="fa fa-check bigger-130"></i>
            </span>';
  }elseif(($cl == $csl) && ($dtl->vrc_two == 'N')){
    $btn = '<span class="red">
                <i class="fa fa-close bigger-130"></i>
            </span>';
  }else{
    $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
  }
  return $btn;
}

function apprComprThree($id){
  $CI    = get_instance();
  $CI->load->model('SimpleModel');
  $CI->load->model('CompareModel','ModulModel');
  $btn   = '';

  $dtarray = array(
            'id_compare'      => $id
    );

  $dtarrspcl = array(
            'kd_user'         => $CI->session->userdata('kduser-ivt'),
            'kd_special_user' => 'DRO'
  );

  $cl   = $CI->SimpleModel->chek('tb_compare_list',$dtarray)->num_rows();
  $csl  = $CI->ModulModel->showJoinForVer($id)->num_rows();
  $dtl  = $CI->SimpleModel->chek('tb_compare',$dtarray)->first_row();
  $spcl = $CI->SimpleModel->chek('tb_special_user',$dtarrspcl)->num_rows();

  if(($cl == $csl) && ($dtl->vrc_one == 'Y') && ($dtl->vrc_three == 'W')){
      if(!empty($spcl)){
        $btn = '<a  href="javascript"
              data-id="'.$id.'"
              data-jns="THREE"
              data-toggle="modal" data-target="#cr-com"
              class="tooltip-info" data-rel="tooltip" title="Approve Me?">
              <span class="blue">
                <i class="fa fa fa-buysellads bigger-120 blue"></i>
              </span>
            </a>';
      }else{
        $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
      }
  }elseif(($cl == $csl) && ($dtl->vrc_three == 'Y')){
    $btn = '<span class="blue">
                <i class="fa fa-check bigger-130"></i>
            </span>';
  }elseif(($cl == $csl) && ($dtl->vrc_three == 'N')){
    $btn = '<span class="red">
                <i class="fa fa-close bigger-130"></i>
            </span>';
  }else{
    $btn = '<i class="ace-icon fa fa-spinner bigger-120"></i>';
  }
  return $btn;
}


function showLogVrc($val){
  $show ='';
  if (empty($val)){
    $show = 'Waiting Approval';
  }else{
    $show = $val;
  }
  return $show;
}
