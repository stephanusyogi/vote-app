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

		$nim = $this->input->post('nim');
		$password = $this->input->post('password');

		// Check Similar
		if ($nim !== $password) {
      $this->session->set_flashdata('error', 'NIM Anda Salah, Mohon Periksa Kembali!');
      return redirect(base_url() . 'login');
		}

    $response = $this->Modelauth->checkAuth($nim);

		// Check Vote Status
		if ($response[0]['kodeEkskutif'] !== 'EKS-GOLPUT' && $response[0]['kodeEkskutif'] !== 'LEG-GOLPUT') {
      $this->session->set_flashdata('error', 'Anda telah menggunakan hak suara anda!');
      return redirect(base_url() . 'login');
		}

    if ($response) {
			$dataLogin = array(
				'id' => $response[0]['id'],
				'nim' => $response[0]['nim'],
				'nama' => $response[0]['nama'],
				'dapil' => $response[0]['dapil'],
				'kodeEkskutif' => $response[0]['kodeEkskutif'],
				'kodeLegislatif' => $response[0]['kodeLegislatif'],
				'lastLogin' => date('Y-m-d h:m:s'),
			);
			$this->Modelauth->addLastLogin($nim, $dataLogin);


			$dataUser = array(
				'nim' => $response[0]['nim'],
				'nama' => $response[0]['nama'],
				'dapil' => $response[0]['dapil'],
			);
			$this->session->set_userdata('login_data_user', $dataUser);
      $this->session->set_userdata('isLoggedIn_user', true);
      $this->session->set_flashdata('success', 'Anda Berhasil Login!');
      return redirect(base_url());
    } else {
      $this->session->set_flashdata('error', 'NIM Anda Salah!');
      return redirect(base_url() . 'login');
    }
    
  }

	public function logout()
	{
			session_destroy();
			redirect(base_url() . 'login');
	}
}
