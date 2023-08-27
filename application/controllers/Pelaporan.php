<?php

class Pelaporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model', 'hm');
    $this->load->model('Pelaporan_model', 'pm');
  }


  public function index()
  {
    // set data
    $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['title'] = 'Data Pelaporan';
    // get data pengaduan from model to reportfloding api
    $responsePengaduan = $this->hm->getPengaduan();

    $data['pengaduan'] = json_decode($responsePengaduan, true);


    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/navbar');
    $this->load->view('backend/admin/pelaporan/index');
    $this->load->view('backend/template/footer');
  }


  public function proses($id)
  {

    $api_url = 'https://technorider.id/api/report_flooding.php?report_number=' . $id;

    $responsePengaduan = $this->pm->getPengaduanById($api_url);

    $pengaduan = json_decode($responsePengaduan, true);


    $data = [
      // 'name' => $pengaduan['name'],
      // 'notlp' => $pengaduan['notlp'],
      // 'location' => $pengaduan['location'],
      // 'proof' => $pengaduan['proof'],
      // 'deskripsi' => $pengaduan['deskripsi'],
      'state_of_report' => 1
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/x-www-form-urlencoded'
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {

      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-success" id="notification" role="alert">
      Data Pengaduan Berhasil Di Proses!
      </div>');

      redirect('pelaporan');
    } else {
      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-danger" id="notification" role="alert">
      Data Pengaduan Gagal Di proses! Silahkan Hubungi Developer Untuk Memperbaiki Masalah ini !
      </div>');

      redirect('pelaporan');
    }
  }
  public function done($id)
  {

    $api_url = 'https://technorider.id/api/report_flooding.php?report_number=' . $id;

    $responsePengaduan = $this->pm->getPengaduanById($api_url);

    $pengaduan = json_decode($responsePengaduan, true);


    $data = [
      // 'name' => $pengaduan['name'],
      // 'notlp' => $pengaduan['notlp'],
      // 'location' => $pengaduan['location'],
      // 'proof' => $pengaduan['proof'],
      // 'deskripsi' => $pengaduan['deskripsi'],
      'state_of_report' => 2
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/x-www-form-urlencoded'
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {

      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-success" id="notification" role="alert">
      Data Pengaduan Berhasil Di Selesaikan!
      </div>');

      redirect('pelaporan');
    } else {
      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-danger" id="notification" role="alert">
      Data Pengaduan Gagal Di Selesaikan! Silahkan Hubungi Developer Untuk Memperbaiki Masalah ini !
      </div>');

      redirect('pelaporan');
    }
  }
  public function cancel($id)
  {

    $api_url = 'https://technorider.id/api/report_flooding.php?report_number=' . $id;

    $responsePengaduan = $this->pm->getPengaduanById($api_url);

    $pengaduan = json_decode($responsePengaduan, true);


    $data = [
      // 'name' => $pengaduan['name'],
      // 'notlp' => $pengaduan['notlp'],
      // 'location' => $pengaduan['location'],
      // 'proof' => $pengaduan['proof'],
      // 'deskripsi' => $pengaduan['deskripsi'],
      'state_of_report' => 3
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/x-www-form-urlencoded'
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {

      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-success" id="notification" role="alert">
      Data Pengaduan Berhasil Di Batalkan!
      </div>');

      redirect('pelaporan');
    } else {
      $this->session->set_flashdata('pelaporan_message', ' <div class="alert alert-danger" id="notification" role="alert">
      Data Pengaduan Gagal Di Batalkan! Silahkan Hubungi Developer Untuk Memperbaiki Masalah ini !
      </div>');

      redirect('pelaporan');
    }
  }
}
