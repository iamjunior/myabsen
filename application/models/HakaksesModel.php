<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HakaksesModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public $table ="data_akses";
    public $idfield ="id_user";

    function put($id){
        $dtarray = array(
          'id_user'           => $id,
          't_home'            => '1,1,1,1,1',
          't_user'            => '1,1,1,1,1',
          't_siswa'           => '1,1,1,1,1',
          't_absen_harian'    => '1,1,1,1,1',
          't_histori_harian'  => '1,1,1,1,1'
        );

        return $this->db->insert($this->table,$dtarray);
    }
  }
