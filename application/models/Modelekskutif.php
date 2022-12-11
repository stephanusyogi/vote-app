<?php 
 
class Modelekskutif extends CI_Model{

	function getEkskutif(){
		$this->db->select('*')
		->from('tb_ekskutif')
		->where('kode !=', 'EKS-GOLPUT');

		$query = $this->db->get();   
		return $query->result_array();
	}

  function voteEkskutif($nim, $dataPemilih){
		$this->db->where('nim', $nim);
		$this->db->update('tb_pemilih', $dataPemilih);
		return true;
  }
  
}