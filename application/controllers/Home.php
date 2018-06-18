<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $fieldAkses	='t_home';
	public function __construct() {
        parent::__construct();
        //$this->load->model('UserModel');
    }

  public function index(){
    $session = $this->session->userdata('login-abs');
		$aks 			= $this->UserModel->akses($this->fieldAkses,'0');
      if(($session != 'myLogin')or($aks !='1')){
          redirect('auth');
      }else{

		$dt['menu']     ='Home';
		$dt['submenu']  ='Index Page';
    $dt['content'] 	= 'home';
    $this->load->view('template',$dt);
      }
    }
  }
