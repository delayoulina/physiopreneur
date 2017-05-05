<?php
class M_Rekam extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function tampil_id_pasien($idPasien){
        $this->db->select('tb_pasien.id, kode_pasien, nama_pasien, foto');
        $this->db->from('tb_pasien');
        $this->db->where('tb_pasien.id',$idPasien);
		    return $this->db->get();
    }

    function tampil_rekam($idPasien){
        $this->db->select('tb_rekam_medik.tanggal, tb_rekam_medik.diagnosa, tb_tindakan.tindakan, tb_pegawai.nama');
        $this->db->from('tb_rekam_medik');
        $this->db->join('tb_pegawai','tb_rekam_medik.id_pegawai = tb_pegawai.id');
        $this->db->join('tb_rekam_medik_tindakan','tb_rekam_medik.id = tb_rekam_medik_tindakan.id_rekam_medik');
        $this->db->join('tb_tindakan','tb_tindakan.id = tb_rekam_medik_tindakan.id_tindakan');
        $this->db->where('tb_rekam_medik.id_pasien',$idPasien);
        // $this->db->group_by('tb_rekam_medik.id_pasien');
		    return $this->db->get();
    }

    function tambah_rekam($data,$table){
		$this->db->insert($table,$data);
	}

	function get_nama_pasien($id){
		$this->db->select('nama_pasien');
		$this->db->from('tb_pasien');
		$this->db->where('id',$id);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			return $result->result();
		}
	}

	function cari_id($kdPasien){
		$this->db->select('id');
		$this->db->where('kode_pasien',$kdPasien);
		$result = $this->db->get('tb_pasien')->row();
		if($result == null){
			return '';
		}else{
			return $result->id;
		}
	}

	function get_id(){
		$this->db->select_max('id');
		$result = $this->db->get('tb_rekam_medik')->row();
		return $result->id;
	}

	function get_idTindakan($nama_tindakan){
		$this->db->select('id');
		$this->db->where('tindakan',$nama_tindakan);
		$result = $this->db->get('tb_tindakan')->row();
		return $result->id;
	}

	// function tampil_rekamdata($idPasien){
	// 	$this->db->where('id', $idPasien);
	// 	$ambildata = $this->db->get('tb_rekam_medik');
	// 	if ($ambildata->num_rows() > 0 ) {
    //         foreach ($ambildata->result() as $data) {
    //             $hasil[] = $data;
    //         }
    //         return $hasil;
    //     }
	// }

}
?>
