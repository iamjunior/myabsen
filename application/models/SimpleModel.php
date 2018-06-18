<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SimpleModel extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    function show($table,$field,$val){
        $this->db->order_by($field,$val);
        return $this->db->get($table);
    }

    function showArray($table,$array,$field,$val){
        $this->db->where($array);
        $this->db->order_by($field,$val);
        return $this->db->get($table);
    }

    function chekOnly($table){
        return $this->db->get($table);
    }

    function chek($table,$array){
        $this->db->where($array);
        return $this->db->get($table);
    }

    function put($table,$field,$val){
        $dtarray = array($field => $this->input->post($val, TRUE));

        return $this->db->insert($table,$dtarray);
    }

    function change($table,$field,$idfield,$val,$idval){
        $data = array($field => $this->input->post($val, TRUE));

        $this->db->where($idfield,$idval);
        return $this->db->update($table,$data);
    }

    function drop($table,$array){

        $this->db->where($array);
        return $this->db->delete($table);
    }


/*
  Model Untuk DB2 /mengambil dari database db_hrs
*/


    function showDB2($table,$field,$val){
        $db2 = $this->load->database('db2', TRUE);
        $db2->order_by($field,$val);
        return $db2->get($table);
    }

    function showArrayDB2($table,$array,$field,$val){
        $db2 = $this->load->database('db2', TRUE);
        $db2->where($array);
        $db2->order_by($field,$val);
        return $db2->get($table);
    }

    function chekOnlyDB2($table){
        $db2 = $this->load->database('db2', TRUE);
        return $db2->get($table);
    }

    function chekDB2($table,$array){
        $db2 = $this->load->database('db2', TRUE);
        $db2->where($array);
        return $db2->get($table);
    }

    /*
    End Fungsi DB2
    */

    //Untuk Controller TEST
    function search_supplier($title){
    		$this->db->like('nama_supplier', $title , 'both');
    		$this->db->order_by('nama_supplier', 'ASC');
    		$this->db->limit(10);
    		return $this->db->get('tbm_supplier')->result();
    	}
  }
