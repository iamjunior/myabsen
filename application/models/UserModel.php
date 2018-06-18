<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->where('status_aktif','Y');
        $query = $this->db->get('data_user');
        return $query->result_array();
    }

    //digunakan untuk hak akses per modul
    public function akses($field,$val){
        $this->db->where('id_user',$this->session->userdata('iduser-abs'));
        $q   = $this->db->get('data_akses')->first_row();

        $key = explode(",", $q->$field);
        return $key[$val];
    }

    function put(){
        $dtarray = array(
          'username'  => $this->input->post('username', TRUE),
          'full_name' => $this->input->post('full_name', TRUE),
          'password'  => md5($this->input->post('password', TRUE))
        );

        return $this->db->insert('data_user',$dtarray);
    }

    function change(){
        $id = $this->input->post('id_user');
        $dtarray = array(
          'username'  => $this->input->post('username', TRUE),
          'full_name' => $this->input->post('full_name', TRUE)
        );

        $this->db->where('id_user',$id);
        return $this->db->update('data_user',$dtarray);
    }

    function changePwd(){
        $id = $this->input->post('id_user');
        $dtarray = array(
          'password'  => md5($this->input->post('password', TRUE))
        );

        $this->db->where('id_user',$id);
        return $this->db->update('data_user',$dtarray);
    }
  }
