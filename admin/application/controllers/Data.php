<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct(){
      parent::__construct();

      $this->session_status = $this->session->userdata('isLoggedIn_admin');

      $this->load->model('Modelpemilih');
      
      if (!$this->session_status) {
        $this->session->set_flashdata('error', 'Your Session Has Expired!');
        return redirect(base_url() . 'login');
    }
  }
  
	public function index()
	{
    $data['title'] = "Input Data";
    $data['menuLink'] = "input-data-pemilih";

		$this->load->view('includes/header', $data);
		$this->load->view('input_data');
		$this->load->view('includes/footer',$data);
	}
  public function tambah_data_tunggal()
  {
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$dapil = $this->input->post('dapil');
    
		$dataPemilih = array(
			'nim' => $nim,
			'nama' => $nama,
			'dapil' => $dapil,
		);
    
		$this->Modelpemilih->addPemilihTunggal($dataPemilih);
		$this->session->set_flashdata('success', 'Data pemilih berhasil ditambahkan ke database!');
    redirect(base_url("input-data-pemilih"));
  }

  public function import_csv(){
		if ( isset($_FILES['fileExcel'])) {

			$file = $_FILES['fileExcel']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['fileExcel']['name']);

				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv') {

					$i = 0;
					$handle = fopen($file, "r");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;

						// Data yang akan disimpan ke dalam databse
						$data = [
							'nim' => $row[0],
							'nama' => $row[1],
							'dapil' => $row[2],
						];

						// Simpan data ke database.
						$this->Modelpemilih->insertCsv($data);
					}

					fclose($handle);
					$this->session->set_flashdata('success', 'Data berhasil ditambahkan ke database!');
					redirect(base_url("input-data-pemilih"));

				} else {
					$this->session->set_flashdata('error', 'Format Salah');
					redirect(base_url("input-data-pemilih"));
				}
		}else{
			$this->session->set_flashdata('error', 'File tidak tersedia');
			redirect(base_url("input-data-pemilih"));
		}
	}
}
