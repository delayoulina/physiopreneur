<?php
(defined('BASEPATH')OR exit('No direct script access allowed'));

class TambahRekamMedik extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_rekam');

    }

    public function index(){
        //$this->load->helper('url');
        //$this->load->view('pegawai/tambah-keluhan-tindakan.php');
		$id = $this->session->userdata("idPasienTambahRekam");
		$data['hasil'] = $this->m_rekam->get_nama_pasien($id);
		$this->load->view('pegawai/tambah-keluhan-tindakan.php',$data);
    }
	
	public function getDataPasien($id){
		$rekamMedik = $this->m_rekam->tampil_id_pasien($id);
	}
	
	public function tambah_keluhan_tindakan(){
		$keluhan = $this->input->post('keluhan');
		$idPasien = $this->session->userdata("idPasienTambahRekam");
		$tanggal = date("Y-m-d");
		$idPegawai = $this->session->userdata("id");
		$data = array(
			'id_pasien'  => $idPasien,
			'tanggal' => $tanggal,
			'diagnosa' => $keluhan,
			'id_pegawai' => $idPegawai
		);
		$this->m_rekam->tambah_rekam($data,'tb_rekam_medik');
				
		$idRekam = $this->m_rekam->get_id();
		$tindakan = $this->input->post('radios');
		$banyak_tindakan = count($tindakan);
		for($x=0; $x<$banyak_tindakan;$x++){
			$namaTindakan = $tindakan[$x];
			$idTindakan = $this->m_rekam->get_idTindakan($namaTindakan);
			$dataTindakan = array(
				'id_rekam_medik' => $idRekam,
				'id_tindakan' => $idTindakan
			);
			$this->m_rekam->tambah_rekam($dataTindakan,'tb_rekam_medik_tindakan');
		}
		
		redirect(base_url('index.php/rekammedik'));
		
	}
		
	public function rekam_medik(){
		$idMax = $this->m_pasien->max_id();
		$rekamMedik = $this->m_rekam->tampil_id_pasien($idMax);
		$medik = $this->m_rekam->tampil_rekam($idMax);
		$this->load->view('pegawai/rekam-medik.php', array(
         'rekamMedik' => $rekamMedik,
         'medik' => $medik
       ));
	}
}
?>