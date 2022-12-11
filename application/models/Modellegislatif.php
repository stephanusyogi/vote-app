<?php 
 
class Modellegislatif extends CI_Model{

	function getLegislatif($dapil){
		$where = array(
			'tb_legislatif.dapil' => $dapil,
		);
    
		$this->db->select('*')
		->from('tb_legislatif')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}

  function voteLegislatif($nim, $dataPemilih){
		$this->db->where('nim', $nim);
		$this->db->update('tb_pemilih', $dataPemilih);
		return true;
  }
  
}