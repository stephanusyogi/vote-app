<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
	function __construct(){
      parent::__construct();
      $this->load->model('Modellegislatif');
      $this->load->model('Modelekskutif');
      $this->load->model('Modelpemilih');
      
      $this->session_status = $this->session->userdata('isLoggedIn_user');
      
      if (!$this->session_status) {
        $this->session->set_flashdata('error', 'Sesi anda telah habis, silahkan login kembali!');
        return redirect(base_url() . 'login');
    }
  }
  
	public function index()
	{
    $checkVote = $this->Modelpemilih->getPemilih($this->session->userdata('login_data_user')['nim']);
    $status = false;

    if ($checkVote[0]['kodeLegislatif'] !== "LEG-GOLPUT" && $checkVote[0]['kodeEkskutif'] !== "EKS-GOLPUT") {
      $status = true;
    }

    $data['title'] = "Vote";
    $data['statusVote'] = $status;

		$this->load->view('includes/header', $data);
		$this->load->view('dashboard');
		$this->load->view('includes/footer',$data);
	}

	public function legislatif()
	{
    $checkVote = $this->Modelpemilih->getPemilih($this->session->userdata('login_data_user')['nim']);

    if ($checkVote[0]['kodeLegislatif'] !== "LEG-GOLPUT") {
      return redirect(base_url() . 'vote-ekskutif');
    }

    $legislatif = $this->Modellegislatif->getLegislatif($this->session->userdata('login_data_user')['dapil']);

    $data['title'] = "Vote";
    $data['dataLegislatif'] = $legislatif;

		$this->load->view('includes/header', $data);
		$this->load->view('legislatif');
		$this->load->view('includes/footer',$data);
	}
  
	public function ekskutif()
	{
    $checkVote = $this->Modelpemilih->getPemilih($this->session->userdata('login_data_user')['nim']);

    if ($checkVote[0]['kodeEkskutif'] !== "EKS-GOLPUT") {
      return redirect(base_url());
    }

    $ekskutif = $this->Modelekskutif->getEkskutif();

    $data['title'] = "Vote";
    $data['dataEkskutif'] = $ekskutif;

		$this->load->view('includes/header', $data);
		$this->load->view('ekskutif');
		$this->load->view('includes/footer',$data);
	}
}
