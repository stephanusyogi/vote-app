<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Modelauth');
	}

	public function index()
	{
		$this->load->view('auth_login');
	}

  public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

    $response = $this->Modelauth->checkAuth($username);

    if ($response) {
			if (password_verify($password, $response[0]['password'])) {
				$dataLogin = array(
					'id' => $response[0]['id'],
					'username' => $response[0]['username'],
					'password' => $response[0]['password'],
					'lastLogin' => date('Y-m-d h:m:s'),
				);
				$this->Modelauth->addLastLogin($response[0]['id'], $dataLogin);
	
				$this->session->set_userdata('isLoggedIn_admin', true);
				$this->session->set_userdata('login_data_admin', $dataLogin);
				$this->session->set_flashdata('success', 'Anda Berhasil Login!');
				return redirect(base_url());
			}else{
				$this->session->set_flashdata('error', 'Username Anda Salah!');
				return redirect(base_url() . 'login');
			}
    } else {
      $this->session->set_flashdata('error', 'Username Anda Salah!');
      return redirect(base_url() . 'login');
    }
    
  }

	public function logout()
	{
			session_destroy();
			redirect(base_url() . 'login');
	}
	
	public function v_password()
	{
		$this->load->view('change_password');
	}
	
	public function reset_password($id)
	{
		$password = $this->input->post('password');
		$newPassword = password_hash($password, PASSWORD_DEFAULT);
		
    $response = $this->Modelauth->checkAuth($this->session->userdata('login_data_admin')['username']);
	
		$dataAdmin = array(
			'id' => $response[0]['id'],
			'username' => $response[0]['username'],
			'password' => $newPassword,
			'lastLogin' => date('Y-m-d h:m:s'),
		);	
		
		$this->Modelauth->changePassword($response[0]['id'], $dataAdmin);

		$this->session->set_flashdata('success', 'Password Berhasil Diubah!');
		return redirect(base_url());
	}

}
