<?php

function check_login()
{
  $ci = get_instance();
  if (!$ci->session->userdata('id_user')) {
    redirect('auth');
  }
}
