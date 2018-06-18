<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SiswaModel extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public $table ="data_siswa";
    public $idfield ="id";

    function put(){
      $updated = $this->session->userdata('username-abs').'|'.date('Y/m/d').'|'.date('H:m:s');
        $dtarray = array(
          'id_rf'       => $this->input->post('id_rf', TRUE),
          'nis'         => $this->input->post('nis', TRUE),
          'nama_depan'  => $this->input->post('nama_depan', TRUE),
          'nama_belakang'=> $this->input->post('nama_belakang', TRUE),
          'kelas'       => $this->input->post('kelas', TRUE),
          'jurusan'     => $this->input->post('jurusan', TRUE),
          'ruang'       => $this->input->post('ruang', TRUE),
          'email'       => $this->input->post('email', TRUE),
          'alamat'      => $this->input->post('alamat', TRUE),
          'log_siswa'   => $updated
        );

        return $this->db->insert($this->table,$dtarray);
    }
    function change(){
        $id = $this->input->post($this->idfield);
        $dtarray = array(
          'nis'         => $this->input->post('nis', TRUE),
          'nama_depan'  => $this->input->post('nama_depan', TRUE),
          'nama_belakang'=> $this->input->post('nama_belakang', TRUE),
          'kelas'       => $this->input->post('kelas', TRUE),
          'jurusan'     => $this->input->post('jurusan', TRUE),
          'ruang'       => $this->input->post('ruang', TRUE),
          'email'       => $this->input->post('email', TRUE),
          'alamat'      => $this->input->post('alamat', TRUE));

        $this->db->where($this->idfield,$id);
        return $this->db->update($this->table,$dtarray);
    }

    //membuat session saat data double
    function putSess(){
        $dtarray = array(
          'id_rfS'       => $this->input->post('id_rf', TRUE),
          'nisS'         => $this->input->post('nis', TRUE),
          'nama_depanS'  => $this->input->post('nama_depan', TRUE),
          'nama_belakangS'=> $this->input->post('nama_belakang', TRUE),
          'kelasS'       => $this->input->post('kelas', TRUE),
          'jurusanS'     => $this->input->post('jurusan', TRUE),
          'ruangS'       => $this->input->post('ruang', TRUE),
          'emailS'       => $this->input->post('email', TRUE),
          'alamatS'      => $this->input->post('alamat', TRUE),
        );

        return $this->session->set_userdata($dtarray);
    }

    function putSessOut(){
        $dtarray = array(
          'id_rfS',
          'nisS',
          'nama_depanS',
          'nama_belakangS',
          'kelasS',
          'jurusanS',
          'ruangS',
          'emailS',
          'alamatS',
        );

        return $this->session->unset_userdata($dtarray);
    }

  }
