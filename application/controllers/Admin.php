<?php

class Admin extends CI_Controller
{
// res
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Home_model', 'hm');


    //* load helper clogin
    check_login();
  }
// tes commit
  public function index()
  {
    $data['title'] = 'Dashboard';
    $responseLokasi = $this->hm->getBanjirApi();
    $responsePengaduan = $this->hm->getPengaduan();

    $data['pengaduan'] = json_decode($responsePengaduan, true);
    $data['dataLokasi'] = json_decode($responseLokasi, true);


    // set data
    $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/navbar');
    $this->load->view('backend/admin/index');
    $this->load->view('backend/template/footer');
  }
}
