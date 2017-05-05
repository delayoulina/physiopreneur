<?php
class M_Tarif extends CI_Model{

    function __construct(){
        parent::__construct();
    }

  	function tampil_tarif()
  	{
  		$this->db->select("*");
  		$this->db->from('tb_tarif a');
  		$this->db->join("tb_jenis_pembayaran b","a.id_jenis_pembayaran = b.id");
      $this->db->join("tb_lokasi c","a.id_lokasi = c.id");
  		return $this->db->get();
  	}

  	function allLokasi(){
  		$this->db->select("*");
  		$this->db->from("tb_lokasi");
  		return $this->db->get();
  	}

    function allJenisPembayaran(){
  		$this->db->select("*");
  		$this->db->from("tb_jenis_pembayaran");
  		return $this->db->get();
  	}
	
	function tambahTarif($data,$table){
		$this->db->insert($table,$data);
	}

}
?>
