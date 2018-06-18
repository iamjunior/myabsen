<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $ctrlName		= 'User';
	public $menu 				= 'User';
	public $table 			= 'data_user';
	public $fieldHakses	= 't_user';

	public $idGet				= 'iknD';//don't change
	public $fieldId 		= 'id_user';
	public $valFieldId 	= 'id_user';

	public $fieldKd 		= 'username';
	public $valFieldKd 	= 'username';

	public $tableChek		= 'tb_stok';//don't change untuk chek delete/edit
	public $fieldChek 	= 'username';
	public $valFieldChek= 'username';

	public function __construct() {
        parent::__construct();
				$this->load->model('SimpleModel');
				$this->load->model('UserModel','ModulModel');//model SupplierModel alias ModulModel
				$this->load->model('HakaksesModel');
        $this->load->model('FlashdataModel');
    }

		public function index(){
			$session = $this->session->userdata('login-abs');
			$aks 			= $this->UserModel->akses($this->fieldHakses,'0');
				if(($session != 'myLogin')or($aks !='1')){
						redirect('auth');
				}else{

					$dt['menu']     = $this->menu;
					$dt['submenu']  = $this->ctrlName; //-->Edit disini
					$dt['data'] 		= $this->SimpleModel->show($this->table,$this->fieldId,'ASC')->result_array(); //-->Edit disini
					$dt['content']  = $this->ctrlName.'/view'; //-->Edit disini
					$this->load->view('template',$dt);
				}
			}

    public function add(){
			$session 	= $this->session->userdata('login-abs');
			$valKd 		= $this->input->post($this->valFieldKd);
			$rowKd 		= $this->SimpleModel->chek($this->table,array($this->fieldKd => $valKd))->num_rows();
			$aks 			= $this->UserModel->akses($this->fieldHakses,'1');
			if(($session != 'myLogin')or($aks !='1')){
				$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
				redirect($this->ctrlName);
			}else if ($rowKd >0){ //find double data
				$this->session->set_flashdata('notif', $this->FlashdataModel->dataDoubleFlash());
        redirect($this->ctrlName);
      }else if(empty($valKd)){
				$this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
        redirect($this->ctrlName);
			}else{
      $add 		= $this->ModulModel->put();
			$id 		= $this->db->insert_id();
			$akses 	= $this->HakaksesModel->put($id);
        if ($add && $akses){ //insert to db
					$this->session->set_flashdata('notif', $this->FlashdataModel->successFlash());
          redirect($this->ctrlName);
        }else{
					$this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
          redirect($this->ctrlName);
        }

      }
    }

    public function edit(){
			$session 	= $this->session->userdata('login-abs');
      $valId  	= $this->input->post($this->valFieldId);
			$valKd  	= $this->input->post($this->valFieldKd);
			$valChek  = $this->input->post($this->valFieldChek);
      $rowId 		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
			$rowKd    = $this->SimpleModel->chek($this->table,array($this->fieldKd => $valKd))->num_rows();
			$aks 			= $this->UserModel->akses($this->fieldHakses,'2');
			if(($session != 'myLogin')or($aks !='1')){
				$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
				redirect($this->ctrlName);
			}else if ((empty($valId))or(empty($valKd))or(empty($rowId))or(empty($rowKd))or($rowKd >1)){ //find
        $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
        redirect($this->ctrlName);
      }else{
      $edit = $this->ModulModel->change();
        if ($edit){
          $this->session->set_flashdata('notif', $this->FlashdataModel->successFlash());
          redirect($this->ctrlName);
        }else{
          $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
          redirect($this->ctrlName);
        }

      }
    }

		public function editPwd(){
			$session 	= $this->session->userdata('login-abs');
      $valId  	= $this->input->post($this->valFieldId);
			$rowId 		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
			$aks 			= $this->UserModel->akses($this->fieldHakses,'2');
			if(($session != 'myLogin')or($aks !='1')){
				$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
				redirect($this->ctrlName);
			}else if ((empty($valId))or(empty($rowId))){ //find
        $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
        redirect($this->ctrlName);
      }else{
      $edit = $this->ModulModel->changePwd();
        if ($edit){
          $this->session->set_flashdata('notif', $this->FlashdataModel->successFlash());
          redirect($this->ctrlName);
        }else{
          $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
          redirect($this->ctrlName);
        }

      }
    }

    public function delete(){
			$session 	= $this->session->userdata('login-abs');
      $valId  	= $this->input->get($this->idGet);
			$valSes 	= $this->session->userdata('iduser-abs');
      $rowId 		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
			$aks 		= $this->UserModel->akses($this->fieldHakses,'3');
			if(($session != 'myLogin')or($aks !='1')){
				$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
				redirect($this->ctrlName);
			}else if (empty($valId)or(empty($rowId)) or ($valId == $valSes)){ //find
        $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
        redirect($this->ctrlName);
      }else{
      $del 		= $this->SimpleModel->drop($this->table,array($this->fieldId => $valId));
			$delAks = $this->SimpleModel->drop('data_akses',array($this->fieldId => $valId));
        if ($del && $delAks){
          $this->session->set_flashdata('notif', $this->FlashdataModel->successFlash());
          redirect($this->ctrlName);
        }else{
          $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
          redirect($this->ctrlName);
        }

      }
    }
  }

/*
$rowId = memastikan id yang akan di eksekusi ada/tidak
$rowKd = memastikan Kode double saat add/edit, atau kosong saat edit/delete

$rowChek = memastikan data di tabel relasi apakah masih digunakan
$rowChek -> edit value menggunakan $valChek
$rowChek -> delete value menggunakan $valKd

Delete data menggunakan kd_departemen
*/
