<?php 

class Pelaporan_model extends CI_Model{


  public function getPengaduanById($url){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;



  }


}


?>