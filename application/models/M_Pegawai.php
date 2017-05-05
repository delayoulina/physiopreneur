<?php

class M_Pegawai extends CI_Model{

	/*function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}*/

	function tambah_pegawai($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function tampil_data($id)
	{
		$this->db->where('id', $id);
		$ambildata = $this->db->get('tb_pegawai');
		if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function tampil_pegawai(){
		$this->db->from('tb_pegawai');
		$this->db->join('tb_lokasi','tb_pegawai.id_lokasi = tb_lokasi.id');
		$this->db->join('tb_user','tb_pegawai.id_user = tb_user.id');
		$this->db->where('tb_user.id_role',2);
		return $this->db->get();
	}

	function tampil_profile_pegawai($username){
		$this->db->from('tb_pegawai');
    $this->db->join('tb_lokasi','tb_pegawai.id_lokasi = tb_lokasi.id');
		$this->db->join('tb_user','tb_pegawai.id_user = tb_user.id');
		$this->db->where('tb_user.username',$username);
		return $this->db->get();
	}

	function data_pegawai($id){
		$this->db->select('nama');
        $this->db->from('tb_pegawai');
        $this->db->where('id',$id);
		    return $this->db->get();
	}

	function get_nama_pegawai($id){
		$this->db->select('nama');
		$this->db->from('tb_pegawai');
		$this->db->where('id',$id);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			return $result->result();
		}
	}

	function getPegawai($nik){
		$this->db->select("*");
		$this->db->from("tb_pegawai");
		$this->db->join("tb_lokasi","tb_pegawai.id_lokasi=tb_lokasi.id");
		$this->db->where("nik", $nik); //select sesuai dengan ID pegawai
		return $this->db->get();
	}

	function allLokasi(){
		$this->db->select("*");
		$this->db->from("tb_lokasi");
		return $this->db->get();
	}

	function lokasiPegawai($idPegawai){
		$this->db->select("*");
		$this->db->from("tb_pegawai");
		$this->db->where("id", $idPegawai); //select sesuai dengan ID pegawai
		return $this->db->get();

	}
	
	//laporan pegawai
	function showLaporanKeuangan($idPegawai){
		$this->db->select("tanggal, SUM(total) as total");
		$this->db->from("tb_pembayaran");
		$this->db->where("id_pegawai",$idPegawai);
		$this->db->group_by("tanggal");
		return $this->db->get();
	}
	
	function showLaporanPasien($idPegawai){
		$this->db->select("a.id, a.nama_pasien, a.alamat");
		$this->db->from("tb_pasien a");
		$this->db->join("tb_rekam_medik b","a.id = b.id_pasien");
		$this->db->where("b.id_pegawai",$idPegawai);
		$this->db->group_by("b.id_pasien");
		return $this->db->get();
	}
	
	//update profile pegawai
	function updateAkunPegawai($data, $condition){
		$this->db->where($condition);
		$this->db->update("tb_user", $data);
	}
	
	function update_pegawai($data, $condition){
		$this->db->where($condition);
		$this->db->update("tb_pegawai", $data);
	}

}

?>
