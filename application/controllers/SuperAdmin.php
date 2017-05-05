<?php
(defined('BASEPATH')OR exit('No direct script access allowed'));

class SuperAdmin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_manager');
        $this->load->model('m_tarif');
		$this->load->model('m_pegawai');
    }

    function index()
    {
        $this->load->helper('url');
        $this->load->view('super/home.php');
    }

    function tampilLaporan()
    {
        $this->load->helper('url');
        $this->load->view('super/laporan.php');
    }

    public function tampilDataManager(){
      $dataManager = $this->m_manager->tampil_manager();
      $this->load->view('super/data-manager.php', array(
        'dataManager' => $dataManager
     ));
    }


    public function tampilDataTarif(){
      $dataTarif = $this->m_tarif->tampil_tarif();
      $this->load->view('super/data-tarif.php', array(
        'dataTarif' => $dataTarif
     ));
    }


    public function tambahManager()
  	{
  		$this->load->helper('url');
		$randomNumb = rand(10,100);
		$timeNow = substr(time(),7);
		$generateID = "BDO-" . $randomNumb . $timeNow;
		$dataLokasi = $this->m_manager->getLokasi();
  		$this->load->view('super/tambah-manager.php',array(
			'dataLokasi' => $dataLokasi,
			'genNikPegawai' => $generateID
		));
  	}

  	public function actionTambahManager(){
  		$this->load->library('upload');
  		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$confPassword = $this->input->post('confirm_password');
  		$nik = $this->input->post('nik');
  		$namaManager = $this->input->post('namaManager');
  		$noHPManager = $this->input->post('noHP');
  		$alamat = $this->input->post('alamat');
		$idLokasiPeg = $this->input->post('idLokasi');
  		$namaFile = $namaManager.$noHPManager;
  		$config['upload_path'] = './asset/foto_manager/';
  		$config['allowed_types'] = 'jpg|png|jpeg';
  		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '1288'; //tinggi maksimu 1288 px
        $config['file_name'] = $namaFile; //nama yang terupload nantinya

  		if($password == $confPassword){
			$dataAkun = array(
				'username' => $username,
				'password' => $password,
				'id_role' => 1
			);
			$this->m_manager->tambahAkunPegawai($dataAkun,'tb_user');
			
			$idUserPeg = $this->m_manager->getMaxIdUser();
		
			$this->upload->initialize($config);

			if($this->upload->do_upload('fotoManager')){
				$gbr = $this->upload->data();
				$data = array(
					'nik' => $nik,
					'nama' => $namaManager,
					'no_hp' => $noHPManager,
					'alamat' => $alamat,
					'id_lokasi' => $idLokasiPeg,
					'foto' => $gbr['file_name'],
					'id_user' => $idUserPeg
				);
				$this->m_pegawai->tambah_pegawai($data,'tb_pegawai');
				redirect(base_url('index.php/SuperAdmin/tampilDataManager'), 'refresh');
			}else{
				//echo "<script type='text/javascript'>alert('Upload Failed!!');</script>";
				//redirect(base_url('index.php/tambahpasien'), 'refresh');
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
			}
		}else{
			$message = "Password tidak sesuai. Check Again!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect(base_url('index.php/SuperAdmin/TambahManager'),'refresh');
		}
  	}

    public function tampilDetailManager($nik){
      $dataManager = $this->m_manager->getManager($nik);
       $this->load->view('super/profile-manager.php', array(
         'dataManager' => $dataManager
       ));
      //$this->load->view('pegawai/rekam-medik.php',$medik);
    }

    //menampilkan halaman profile pegawai
		public function tambahTarif(){
			$lokasiAll = $this->m_tarif->allLokasi();
      $pembayaranAll = $this->m_tarif->allJenisPembayaran();
       $this->load->view('super/tambah-tarif.php', array(
				 'lokasiAll' => $lokasiAll,
         'pembayaranAll' => $pembayaranAll
       ));
    }
	
	//search manager
	public function viewManagerById(){
		$searchNIK = $this->input->post('nik');
		$dataManager = $this->m_manager->getManager($searchNIK);
		if($dataManager->num_rows() > 0){
			$this->load->view('super/profile-manager.php', array(
				'dataManager' => $dataManager
			));
		}else{
			$message = "Manager dengan NIK ".$searchNIK." tidak ditemukan";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect(base_url('index.php/SuperAdmin/'),'refresh');
		}		
	}
	
	//action tambah tarif
	public function actionTambahTarif(){
		$idLokasi = $this->input->post('idLokasi');
		$idJenisPembayaran = $this->input->post('idJenisPembayaran');
		$tarif = $this->input->post('number');
		$data = array(
					'id_jenis_pembayaran' => $idJenisPembayaran,
					'id_lokasi' => $idLokasi,
					'tarif' => $tarif
				);
		$this->m_tarif->tambahTarif($data,'tb_tarif');
		redirect(base_url('index.php/SuperAdmin/tampilDataTarif'), 'refresh');
	}
	
	//menampilkan halaman profile superadmin
	public function viewProfileSuper($username){
		$profilePegawai = $this->m_pegawai->tampil_profile_pegawai($username);
		$lokasiAll = $this->m_pegawai->allLokasi();
		 $this->load->view('super/profile.php', array(
			 'profilePegawai' => $profilePegawai,
			 'lokasiAll' => $lokasiAll,

		 ));
	}
	
	//action update profile SuperAdmin
	function actionUpdateProfile(){
		$this->load->library('upload');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$confPassword = $this->input->post('confirm_password');
		$nik = $this->input->post('nik');
		$namaPegawai = $this->input->post('namaPegawai');
		$noHpPegawai = $this->input->post('noHP');
		$alamat = $this->input->post('alamat');
		$idLokasiPeg = $this->input->post('idLokasi');
		$namaFile = $namaPegawai.$noHpPegawai;
		$config['upload_path'] = './asset/foto_pegawai/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '1288'; //tinggi maksimu 1288 px
        $config['file_name'] = $namaFile; //nama yang terupload nantinya
		
		if($password == $confPassword){
			$dataAkun = array(
				'username' => $username,
				'password' => $password
			);
			$condition['id'] = $this->session->userdata('id');
			$this->m_manager->updateAkunPegawai($dataAkun,$condition);
						
			$this->upload->initialize($config);

			if($this->upload->do_upload('fotoPegawai')){
				$gbr = $this->upload->data();
				$data = array(
					'nik' => $nik,
					'nama' => $namaPegawai,
					'no_hp' => $noHpPegawai,
					'alamat' => $alamat,
					'id_lokasi' => $idLokasiPeg,
					'foto' => $gbr['file_name']
				);
				$this->m_manager->update_pegawai($data,$condition);
				redirect(base_url('index.php/SuperAdmin'), 'refresh');
			}else{
				$data = array(
					'nik' => $nik,
					'nama' => $namaPegawai,
					'no_hp' => $noHpPegawai,
					'alamat' => $alamat,
					'id_lokasi' => $idLokasiPeg
				);
				$this->m_manager->update_pegawai($data,$condition);
				redirect(base_url('index.php/SuperAdmin'), 'refresh');				
			}
		}else{
			$message = "Password tidak sesuai. Check Again!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$user = $this->session->userdata('username');
			redirect(base_url('index.php/SuperAdmin/viewProfileSuper/'.$user),'refresh');
		}
	}

}
?>
