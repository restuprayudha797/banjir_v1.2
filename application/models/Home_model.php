<?php


class Home_model extends CI_Model
{

  private $API_HARDWARE = 'https://technorider.id/api/hardware.php';
  private $API_REPORT_FLOODING = 'https://technorider.id/api/report_flooding.php';

  public function getBanjirApi()
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->API_HARDWARE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
  }

  public function getPengaduan()
  {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->API_REPORT_FLOODING);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
  }

  public function postReportFlooding()
  {


    // Cek apakah user ada mengupload gambar
    $upload_bukti =   $_FILES['proof']['name'];

    $proof = 'kosong';

    if ($upload_bukti) {

      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']     = '3024';
      $config['upload_path'] = './assets/frontend/images/pengaduan';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('proof')) {

        $proof = $this->upload->data('file_name');
      } else {

        echo 'gagal';

        $this->session->set_flashdata("home_message", "<script>Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'bukti foto yang anda masukkan gagal di upload, silahkakan hubungi admin untuk menyelesaikan masalah ini',
        })</script>");
        // $this->session->set_flashdata('news_message', ' <div class="alert alert-danger" id="notification" role="alert">
        // Data Berita Gagal Diambah!
        // </div>');
        redirect('home');
      }
    }

    // akhir dari pengecekan gambar 


    $data = [
      'name' => $this->input->post('name', true),
      'phone' => $this->input->post('phone', true),
      'name_location' => $this->input->post('name_location', true),
      'proof_image' => $proof,
      'message' => $this->input->post('message', true),
      // Tambahkan data yang ingin Anda kirim
    ];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->API_REPORT_FLOODING);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    if ($data['report_number'] == true) {
      $this->session->set_flashdata("home_message", "<script>Swal.fire(
        'Berhasil!',
        'Pengaduan Berhasil di Upload!',
        'success'
      )</script>");
      redirect('home');
    } else {
      $this->session->set_flashdata("home_message", "<script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Mohon maaf ! data pengaduan gagal di upload silahkan hubungi admin untuk menyelesaikan masalah ini !',
      })</script>");
      redirect('home');
    }
  }
}
