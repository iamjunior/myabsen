<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public $ctrlName		= 'Siswa';
	public $menu 				= 'Siswa';
	public $table 			= 'data_siswa';
	public $fieldHakses	= 't_siswa';

	public $idGet				= 'iknD';//don't change
	public $fieldId 		= 'id';
	public $valFieldId 	= 'id';

	public $fieldKd 		= 'id_rf';
	public $valFieldKd 	= 'id_rf';

	public $tableChek		= 'tab_absen_harian';//don't change untuk chek delete/edit
	public $fieldChek 	= 'id_rf';
	public $valFieldChek= 'id_rf';

	public function __construct() {
        parent::__construct();
				$this->load->model('SimpleModel');
				$this->load->model('SiswaModel','ModulModel');//model SiswaModel alias ModulModel
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
					$dt['data'] 		= $this->SimpleModel->show($this->table,$this->fieldKd,'ASC')->result_array(); //-->Edit disini
					$dt['content']  = $this->ctrlName.'/view'; //-->Edit disini
					$this->load->view('template',$dt);
				}
			}

			public function add(){
			      $session   = $this->session->userdata('login-abs');
			      $aks 			 = $this->UserModel->akses($this->fieldHakses,'1');

			        if(($session != 'myLogin')or($aks !='1')){
			            redirect('auth');
			        }else{

			          $dt['menu']         = $this->menu;
			          $dt['submenu']      = $this->ctrlName; //-->Edit disini
			          $dt['content']      = $this->ctrlName.'/add'; //-->Edit disini
			          $this->load->view('template',$dt);
			        }
			      }

			  public function edit(){
			      $session   = $this->session->userdata('login-abs');
			      $valId     = $this->input->get($this->idGet);
			      $rowId     = $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
			      $aks 			 = $this->UserModel->akses($this->fieldHakses,'2');

			        if(($session != 'myLogin')or($aks !='1')){
			            redirect('auth');
			        }elseif((empty($valId))or(empty($rowId))){
			            $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
			            redirect($this->ctrlName);
			        }else{

			          $dt['menu']         = $this->menu;
			          $dt['submenu']      = $this->ctrlName; //-->Edit disini
			          $dt['data']     		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->first_row();
			          $dt['content']      = $this->ctrlName.'/edit'; //-->Edit disini
			          $this->load->view('template',$dt);
			        }
			      }

			public function addUp(){
				$session 	= $this->session->userdata('login-abs');
				$valKd 		= $this->input->post($this->valFieldKd);
				$rowKd 		= $this->SimpleModel->chek($this->table,array($this->fieldKd => $valKd))->num_rows();
				$aks 			= $this->UserModel->akses($this->fieldHakses,'1');
				if(($session != 'myLogin')or($aks !='1')){
					$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
					redirect($this->ctrlName);
				}else if (!empty($rowKd)){ //find double data
					$this->ModulModel->putSess();
					$this->session->set_flashdata('notif', $this->FlashdataModel->dataDoubleFlash());
	        redirect($this->ctrlName.'/add');
	      }else if(empty($valKd)){
					$this->ModulModel->putSess();
					$this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
	        redirect($this->ctrlName.'/add');
				}else{
	      $add = $this->ModulModel->put();
	        if ($add){ //insert to db
						$this->ModulModel->putSessOut();
						$this->session->set_flashdata('notif', $this->FlashdataModel->successFlash());
	          redirect($this->ctrlName);
	        }else{
						$this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
	          redirect($this->ctrlName);
	        }

	      }
	    }

	    public function editUp(){
				$session 	= $this->session->userdata('login-abs');
	      $valId  	= $this->input->post($this->valFieldId);
				$valKd  	= $this->input->post($this->valFieldKd);
				$valChek  = $this->input->post($this->valFieldChek);
	      $rowId 		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
				$rowKd    = $this->SimpleModel->chek($this->table,array($this->fieldKd => $valKd))->num_rows();
				$rowChek	= $this->SimpleModel->chek($this->tableChek,array($this->fieldChek => $valChek))->num_rows();
				$aks 			= $this->UserModel->akses($this->fieldHakses,'2');
				if(($session != 'myLogin')or($aks !='1')){
					$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
					redirect($this->ctrlName);
				}else if ((empty($valId))or(empty($valKd))or(empty($rowId))or(empty($rowKd))or($rowKd >1)){ //find
	        $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
	        redirect($this->ctrlName);
	      }else if(!empty($rowChek)){
					$this->session->set_flashdata('notif', $this->FlashdataModel->dataUsedFlash());
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

	    public function delete(){
				$session 	= $this->session->userdata('login-abs');
	      $valId  	= $this->input->get($this->idGet);
	      $rowId 		= $this->SimpleModel->chek($this->table,array($this->fieldId => $valId))->num_rows();
				$rowChek	= $this->SimpleModel->chek($this->tableChek,array($this->fieldChek => $valId))->num_rows();
				$aks 		= $this->UserModel->akses($this->fieldHakses,'3');
				if(($session != 'myLogin')or($aks !='1')){
					$this->session->set_flashdata('notif', $this->FlashdataModel->noAksesFlash());
					redirect($this->ctrlName);
				}else if (empty($valId)or(empty($rowId))){ //find
	        $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
	        redirect($this->ctrlName);
	      }else if(!empty($rowChek)){
					$this->session->set_flashdata('notif', $this->FlashdataModel->dataUsedFlash());
	        redirect($this->ctrlName);
				}else{
	      $del = $this->SimpleModel->drop($this->table,array($this->fieldId => $valId));
	        if ($del){
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
*/
