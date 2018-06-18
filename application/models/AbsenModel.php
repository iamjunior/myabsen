<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AbsenModel extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public $table ="data_absen";
    public $idfield ="id";

    function show(){
      
    }

  }
