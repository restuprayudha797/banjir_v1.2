<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'hm');
    }

    public function index()
    {
        $responseLokasi = $this->hm->getBanjirApi();
        $responsePengaduan = $this->hm->getPengaduan();

        $data['dataLokasi'] = json_decode($responseLokasi, true);
        $data['pengaduan'] = json_decode($responsePengaduan, true);

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('phone', 'No TLP', 'required');
        $this->form_validation->set_rules('name_location', 'Lokasi', 'required');
        $this->form_validation->set_rules('message', 'pesan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('frontend/index', $data);
        } else {
            $response = $this->hm->postReportFlooding();
        }

        // Load view to display API data
    }

    public function postData()
    {






        // Lakukan sesuatu dengan respon, misalnya tampilkan pesan sukses/gagal
    }
}
