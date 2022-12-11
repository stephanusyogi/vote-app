<?php 
 
class Modelpemilih extends CI_Model{
  
	function addPemilihTunggal($dataPemilih){
		return $this->db->insert('tb_pemilih', $dataPemilih);
	}

  public function insertCsv($data){
		$insert = $this->db->insert('tb_pemilih', $data);
	}
}