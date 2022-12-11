<?php 
 
class Modelauth extends CI_Model{

	function checkAuth($nim){
		$where = array(
			'tb_pemilih.nim' => $nim,
		);
    
		$this->db->select('*')
		->from('tb_pemilih')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
  
	function addLastLogin($nim, $dataLogin){
		$this->db->where('nim', $nim);
		$this->db->update('tb_pemilih', $dataLogin);
		return true;
	}
}