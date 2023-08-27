<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function create_captcha()
  {
    $data = array(
      'img_path'      => './captcha-images/',
      'img_url'       => base_url() . 'captcha-images/',
      'img_width'     => '150',
      'img_height'    => '30',
      'expiration'    => 300,
      'word_length'   => 5,
      'font_size'     => 20,
      'img_id'        => 'Imageid',
      'pool'          => '123456789abcdefghijkmnpqrstuvwxyz'
    );

    $captcha = create_captcha($data);

    $this->session->unset_userdata('captchaword');
    $this->session->set_userdata('captchaword', $captcha['word']);

    $image = $captcha['image'];
    return $image;
  }

  public function index()
  {
    //*Set apakah dia sudah memiliki session atau belum
    $this->goToDefaultPage();

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('captcha-answer', 'Captcha', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page';
      $cptc = array(
        'captcha' => $this->create_captcha(),
      );
      $this->load->view('backend/auth/login', $cptc);
    } else {
      // *menggunakan Method _login secara Private
      // TODO Method ini hanya bisa digunakan di Controller Auth saja
      $this->_login();
    }
  }


  private function _login()
  {

    $usernames   = $this->input->post('username', true);
    $pass        = $this->input->post('password', true);
    $captchareal = $this->input->post('captcha-answer', true);

    $username    = trim(strip_tags(htmlentities($usernames, ENT_QUOTES)));
    $password = trim(strip_tags(htmlentities($pass, ENT_QUOTES)));
    $captcha  = trim(strip_tags(htmlentities($captchareal, ENT_QUOTES)));



    $user = $this->db->get_where('users', ['username' => $usernames])->row_array();

    //TODO check CAPTCHA first
    if ($captcha != $this->session->userdata('captchaword')) {
      //! CAPTCHAT does not match
      $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
            CAPTCHA does not match!</div>');
      redirect('login');
    } else {

      //* Jika CAPTCHA MATCH dan Jika Usernya ada
      if ($user) {
        //* Jika akun user active
        if ($user['is_active'] == '1') {
          //*Jika password benar
          if (password_verify($password, $user['password'])) {
            //* Masukkan data ke dalam session
            $data = [ 
              'id_user'   => $user['id_user'],
            ];
            $this->session->set_userdata($data);

            //TODO input log user data
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $log_time = time();
            $this->db->query("INSERT INTO login_report (log_user,log_ip, log_time) VALUES('{$user['id_user']}','$user_ip','$log_time')");

            //TODO arahkan ke controller admin
            redirect('admin');
          } else {
            //!jika password salah
            $this->session->set_flashdata('auth_message', '<div class="alert alert-warning" role="alert">
                    Password incorrect!</div>');
            redirect('login');
          }
        } else {
          //! Akun user tidak aktif
          $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
                Your account has not activated, contact the Administrator!</div>');
          redirect('login');
        }
      } else {
        //! Email user tidak ditemukan
        $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
            Your account is not registered!</div>');
        redirect('login');
      }
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('id_user');


    $this->session->set_flashdata('auth_message', '<div class="alert alert-success" role="alert">
        You have been logged out!</div>');
    redirect('login');
  }

  public function goToDefaultPage()
  {
    if ($this->session->userdata('id_user') <> '') {
      redirect('admin');
    }
  }

  public function forbidden()
  {
    $this->load->view('auth/forbidden');
  }

  public function not_found()
  {
    $this->load->view('auth/404');
  }
}
