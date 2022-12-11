<?php 
 
class Modeldiagram extends CI_Model{

	function countDiagram($kode, $attr){
		$where = array(
			$attr => $kode,
		);
    
		$this->db->select('*')
		->from('tb_pemilih')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}

	function countDiagramGolput(){
		$where = array(
			"tb_pemilih.kodeEkskutif" => "EKS-GOLPUT",
      "tb_pemilih.kodeLegislatif" => "LEG-GOLPUT",
		);
    
		$this->db->select('*')
		->from('tb_pemilih')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
  
	function countDiagramByDapil($kode, $dapil){
		$where = array(
			"tb_pemilih.kode" => $kode,
      "tb_pemilih.dapil" => $dapil,
		);
    
		$this->db->select('*')
		->from('tb_pemilih')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
  
	function countPemilih(){
    
		$this->db->select('*')
		->from('tb_pemilih');

		$query = $this->db->get();   
		return $query->result_array();
	}
  
	function getLegislatif($dapil){
		$where = array(
			'tb_legislatif.dapil' => $dapil,
		);
    
		$this->db->select('*')
		->from('tb_legislatif')
		->where($where)
    ->order_by("dapil", "ASC");

		$query = $this->db->get();   
		return $query->result_array();
	}

	function getEkskutif(){
		$this->db->select('*')
		->from('tb_ekskutif')
		->where('kode !=', 'EKS-GOLPUT');

		$query = $this->db->get();   
		return $query->result_array();
	}
  
}