<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

	public $ctrlName		= 'Absen';
	public $menu 				= 'Absen';
	public $table 			= 'tab_absen_harian';
	public $fieldHakses	= 't_absen_harian';

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
				$this->load->model('AbsenModel','ModulModel');//model AbsenModel alias ModulModel
        $this->load->model('FlashdataModel');
    }

		public function index(){
			$session = $this->session->userdata('login-abs');
			$date 	 = $this->input->get('Date');
			$aks 			= $this->UserModel->akses($this->fieldHakses,'0');
				if(($session != 'myLogin')or($aks !='1')){
						redirect('auth');
				}elseif(empty($date)){
					redirect('auth');
				}else{

					$dt['menu']     = $this->menu;
					$dt['submenu']  = $this->ctrlName; //-->Edit disini
					$dt['data'] 		= $this->SimpleModel->show('data_siswa','nama_depan','ASC')->result_array(); //-->Edit disini
					$dt['content']  = $this->ctrlName.'/view'; //-->Edit disini
					$this->load->view('template',$dt);
				}
			}

			public function ShortOrExpt(){
      $session  = $this->session->userdata('login-abs');
      $aks 			= $this->UserModel->akses($this->fieldHakses,'1');

			$date 		= date('Y-m-d', strtotime($this->input->post('tgl_tab')));
			$kelas 		= $this->input->post('kelas');
			$jurusan 	= $this->input->post('jurusan');
			$ruang 		= $this->input->post('ruang');

        if(($session != 'myLogin')or($aks !='1')){
            redirect('auth');
        }elseif(empty($date)){
            $this->session->set_flashdata('notif', $this->FlashdataModel->failedFlash());
            redirect($this->ctrlName);
        }else{

          if($this->input->post('ExShort')=='EXP'){
            redirect('Absen/Export?iD='."CheKid".'&Date='.$date.'&Kelas='.$kelas.'&Jurusan='.$jurusan.'&Ruang='.$ruang.'&BpF='.date('ms'));
          }else{
            redirect('Absen/Short?iD='."CheKid".'&Date='.$date.'&Kelas='.$kelas.'&Jurusan='.$jurusan.'&Ruang='.$ruang.'&BpF='.date('ms'));
          }
        }
      }

			public function Short(){
				$session = $this->session->userdata('login-abs');
				$date 	 = $this->input->get('Date');
				$aks 			= $this->UserModel->akses($this->fieldHakses,'0');
					if(($session != 'myLogin')or($aks !='1')){
							redirect('auth');
					}elseif(empty($date)){
						redirect('auth');
					}else{

						$dtarray = array(
							'kelas'		 => $this->input->get('Kelas'),
							'jurusan'	 => $this->input->get('Jurusan'),
							'ruang'		 => $this->input->get('Ruang'),
						);

						$dt['menu']     = $this->menu;
						$dt['submenu']  = $this->ctrlName; //-->Edit disini
						$dt['data'] 		= $this->SimpleModel->showArray('data_siswa',$dtarray,'nama_depan','ASC')->result_array(); //-->Edit disini
						$dt['content']  = $this->ctrlName.'/view'; //-->Edit disini
						$this->load->view('template',$dt);
					}
				}

				public function Export(){
					$session = $this->session->userdata('login-abs');
					$date 	 = $this->input->get('Date');
					$aks 			= $this->UserModel->akses($this->fieldHakses,'0');
						if(($session != 'myLogin')or($aks !='1')){
								redirect('auth');
						}elseif(empty($date)){
							redirect('auth');
						}else{

							$dtarray = array(
								'kelas'		 => $this->input->get('Kelas'),
								'jurusan'	 => $this->input->get('Jurusan'),
								'ruang'		 => $this->input->get('Ruang'),
							);

							$dt['data'] 		= $this->SimpleModel->showArray('data_siswa',$dtarray,'nama_depan','ASC')->result_array(); //-->Edit disini
							$this->load->view($this->ctrlName.'/view_export',$dt);
						}
					}

			public function historiTag(){
				$session = $this->session->userdata('login-abs');
				$date 	 = $this->input->get('Date');
				//$date 	= '2018-05-02';
				$aks 			= $this->UserModel->akses($this->fieldHakses,'0');
				$dtarray = array(
					'year(tgl_histori_tab)' => date('Y',strtotime($date)),
					'month(tgl_histori_tab)' => date('m',strtotime($date)),
					'day(tgl_histori_tab)' => date('d',strtotime($date))
				);

				/*$dtarray = array(
					'tgl_histori_tab >=' => date('Y-m-d', strtotime($date)),
					'tgl_histori_tab <=' => date('Y-m-d', strtotime($date))
				);*/
					if(($session != 'myLogin')or($aks !='1')){
							redirect('auth');
					}else{

						$dt['menu']     = $this->menu;
						$dt['submenu']  = 'Tag Histori'; //-->Edit disini
						$dt['data'] 		= $this->SimpleModel->showArray('tab_histori_harian',$dtarray,'id_tab','DESC')->result_array(); //-->Edit disini
						$dt['content']  = $this->ctrlName.'/view_histori'; //-->Edit disini
						$this->load->view('template',$dt);
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
