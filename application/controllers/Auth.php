<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

	public function index()
	{
		$session = $this->session->userdata('login-abs');
			if($session != 'myLogin'){
					$this->load->view('auth/login');
			}else{
					redirect('Home');
			}
	}

	public function chekLogin(){
				$username = $this->security->xss_clean($this->input->post("username"));
        $password = $this->security->xss_clean($this->input->post("password"));
				$status 	= $this->security->xss_clean('Y');
        $cek = $this->UserModel->chekLogin($username,md5($password));
        if(count($cek) == 1){
            $this->session->set_userdata(array(
                'login-abs'          => "myLogin",
								'iduser-abs'       	 => $cek[0]['id_user'],
                'username-abs'       => $cek[0]['username']
            ));
            redirect('Home');
        }else{
            $this->session->set_flashdata('loginGagal', '<br>Username/Password salah</br>');
						header('location:'. site_url('Auth'));
        }
	}

	public function logout(){
        //$this->session->sess_destroy();
				$this->session->unset_userdata(array(
						'login-abs',
						'kduser-abs',
						'username-abs'
				));
        redirect('Auth','refresh');
    }
}
