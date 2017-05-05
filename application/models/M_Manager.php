<?php

class M_Manager extends CI_Model{

	/*function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}*/

	function tambah_manager($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function tampil_data($id)
	{
		$this->db->where('id', $idPegawai);
		$ambildata = $this->db->get('tb_pegawai');
		if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function tampil_manager()
	{
		$this->db->select("*");
		$this->db->from('tb_pegawai a');
		$this->db->join("tb_user b","a.id_user = b.id");
		$this->db->where("b.id_role",1);
		return $this->db->get();
	}

	function get_manager($idManager){

		$this->db->select("*");
		$this->db->from("tb_pegawai a");
		$this->db->join("tb_user b","a.id_user = b.id");
		$this->db->where("a.id", $idManager);
		$this->db->where("b.id_role",1); //select sesuai dengan ID Manager
		return $this->db->get();
	}

	function update_manager($data, $condition){
		$this->db->where($condition);
		$this->db->update("tb_manager", $data);
	}
  
	//laporan manager
	function showLaporanManagerPerMinggu(){
		$this->db->select("a.tanggal, c.lokasi, SUM(a.total) as total");
		$this->db->from("tb_pembayaran a");
		$this->db->join("tb_pegawai b","a.id_pegawai = b.id");
		$this->db->join("tb_lokasi c","b.id_lokasi = c.id");
		$this->db->group_by("YEARWEEK(a.tanggal), c.id");
		return $this->db->get();
	}
	
	function showLaporanManagerPerBulan(){
		$this->db->select("MONTH(a.tanggal) as bulan, c.lokasi, SUM(a.total) as total");
		$this->db->from("tb_pembayaran a");
		$this->db->join("tb_pegawai b","a.id_pegawai = b.id");
		$this->db->join("tb_lokasi c","b.id_lokasi = c.id");
		$this->db->group_by("MONTH(a.tanggal), c.id");
		return $this->db->get();
	}
	
	function showLaporanManagerPerTahun(){
		$this->db->select("YEAR(a.tanggal) as tahun, c.lokasi, SUM(a.total) as total");
		$this->db->from("tb_pembayaran a");
		$this->db->join("tb_pegawai b","a.id_pegawai = b.id");
		$this->db->join("tb_lokasi c","b.id_lokasi = c.id");
		$this->db->group_by("YEAR(a.tanggal), c.id");
		return $this->db->get();
	}
	
	//tambah pegawai
	function getLokasi(){
		return $this->db->get("tb_lokasi");
	}
	
	function tambahAkunPegawai($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	function getMaxIdUser(){
		$this->db->select_max('id');
		$result = $this->db->get('tb_user')->row();
		return $result->id;
	}
	
	//update profile manager
	function updateAkunPegawai($data, $condition){
		$this->db->where($condition);
		$this->db->update("tb_user", $data);
	}
	
	function update_pegawai($data, $condition){
		$this->db->where($condition);
		$this->db->update("tb_pegawai", $data);
	}
	
	//search manager
	function getManager($nik){
		$this->db->select("*");
		$this->db->from("tb_pegawai");
		$this->db->join("tb_user","tb_pegawai.id_user=tb_user.id");
		$this->db->where("nik", $nik); //select sesuai dengan ID pegawai
		return $this->db->get();
	}
}

?>
