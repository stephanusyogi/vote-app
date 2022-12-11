<?php 
 
class Modelpemilih extends CI_Model{
  
	function addPemilihTunggal($dataPemilih){
		return $this->db->insert('tb_pemilih', $dataPemilih);
	}

  public function insertCsv($data){
		$insert = $this->db->insert('tb_pemilih', $data);
	}
	
	function getPemilih($nim){
		$where = array(
			'tb_pemilih.nim' => $nim,
		);
    
		$this->db->select('*')
		->from('tb_pemilih')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
}