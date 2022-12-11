<?php 
 
class Modelauth extends CI_Model{

	function checkAuth($username){
		$where = array(
			'tb_admin.username' => $username,
		);
    
		$this->db->select('*')
		->from('tb_admin')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
  
	function addLastLogin($id, $dataLogin){
		$this->db->where('id', $id);
		$this->db->update('tb_admin', $dataLogin);
		return true;
	}
	
	function changePassword($id, $dataAdmin){
		$this->db->where('id', $id);
		$this->db->update('tb_admin', $dataAdmin);
		return true;
	}
}