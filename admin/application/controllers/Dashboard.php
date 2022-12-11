<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
	function __construct(){
      parent::__construct();
      $this->session_status = $this->session->userdata('isLoggedIn_admin');
      
		  $this->load->model('Modeldiagram');

      if (!$this->session_status) {
        $this->session->set_flashdata('error', 'Sesi anda telah habis, silahkan login kembali!');
        return redirect(base_url() . 'login');
    }
  }

	public function index()
	{
    $jumlah_pemilih = $this->Modeldiagram->countPemilih();
    // Get Data Ekskutif
    $ekskutif = $this->Modeldiagram->getEkskutif();
    $diagram_ekskutif = array();
    foreach ($ekskutif as $keyDiagram) {
      $tempEkskutif = array(
        "nama_paslon" => $keyDiagram['nama'],
        "hasil" => count($this->Modeldiagram->countDiagram($keyDiagram['kode'], "tb_pemilih.kodeEkskutif")),
        "hasil_persentase" => round((count($this->Modeldiagram->countDiagram($keyDiagram['kode'], "tb_pemilih.kodeEkskutif")) / count($jumlah_pemilih)) * 100, 2) ." %",
      );
      $diagram_ekskutif[] = $tempEkskutif;
    }

    // Get Data Legislatif
    $diagram_legislatif = array();
    $dapil = array("ADMINISTRASI NIAGA", "AKUNTANSI" , "TEKNIK ELEKTRO", "TEKNIK KIMIA" , "TEKNIK MESIN" ,"TEKNIK SIPIL", "TEKNOLOGI INFORMASI");
    $dapil_count = 0;

    foreach ($dapil as $key => $value) {
      $legislatif = $this->Modeldiagram->getLegislatif($value);
      $temp = array();
      foreach ($legislatif as $keyPaslon) {
        $tempLegislatif = array(
          "nama_paslon" => $keyPaslon['nama'],
          "dapil" => $keyPaslon['dapil'],
          "hasil" => count($this->Modeldiagram->countDiagram($keyPaslon['kode'], "tb_pemilih.kodeLegislatif")),
          "hasil_persentase" => round((count($this->Modeldiagram->countDiagram($keyPaslon['kode'], "tb_pemilih.kodeLegislatif")) / count($jumlah_pemilih)) * 100, 2) ." %",
        );
        $temp[] = $tempLegislatif;
      }

      $diagram_legislatif[$value] = $temp;
    }

    // Get Data Golput
    $diagram_golput = array(
      "title" => "DATA GOLPUT",
      "hasil" => count($this->Modeldiagram->countDiagramGolput()),
      "hasil_persentase" => round((count($this->Modeldiagram->countDiagramGolput()) / count($jumlah_pemilih)) * 100, 2) ." %",
    );

    $data['title'] = "Dashboard";
    $data['menuLink'] = "dashboard";
    $data['diagramEkskutif'] = $diagram_ekskutif;
    $data['diagramLegislatif'] = $diagram_legislatif;
    $data['diagramGolput'] = $diagram_golput;

		$this->load->view('includes/header', $data);
		$this->load->view('dashboard');
		$this->load->view('includes/footer',$data);
	}
}
