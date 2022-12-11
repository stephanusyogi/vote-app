<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct(){
      parent::__construct();

      $this->session_status = $this->session->userdata('isLoggedIn_user');

      $this->load->model('Modelpemilih');
			$this->load->model('Modellegislatif');
			$this->load->model('Modelekskutif');
      
      if (!$this->session_status) {
        $this->session->set_flashdata('error', 'Your Session Has Expired!');
        return redirect(base_url() . 'login');
    }
  }

  public function send_vote_legislatif($nim)
  {
		$kode = $this->input->post('legislatif');

		$res = $this->Modelpemilih->getPemilih($nim);
		$dataPemilih = array(
			'id' => $res[0]['id'],
			'nim' => $res[0]['nim'],
			'nama' => $res[0]['nama'],
			'dapil' => $res[0]['dapil'],
			'kodeEkskutif' => $res[0]['kodeEkskutif'],
			'kodeLegislatif' => $kode,
			'lastLogin' => $res[0]['lastLogin'],
		);

		$this->Modellegislatif->voteLegislatif($nim, $dataPemilih);

    redirect(base_url("vote-ekskutif"));
  }

  public function send_vote_ekskutif($nim)
  {
		$kode = $this->input->post('ekskutif');

		$res = $this->Modelpemilih->getPemilih($nim);
		$dataPemilih = array(
			'id' => $res[0]['id'],
			'nim' => $res[0]['nim'],
			'nama' => $res[0]['nama'],
			'dapil' => $res[0]['dapil'],
			'kodeEkskutif' => $kode,
			'kodeLegislatif' => $res[0]['kodeLegislatif'],
			'lastLogin' => $res[0]['lastLogin'],
		);

		$this->Modelekskutif->voteEkskutif($nim, $dataPemilih);

    redirect(base_url());
  }
}
