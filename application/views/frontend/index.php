<?php
if (validation_errors()) {
  $this->session->set_flashdata("home_message", "<script>Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Data yang anda masukkan mungkin tidak lengkap',
  })</script>");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Banjir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/css/main.css') ?>">

  <!-- cdn link style -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..98,200..800,0..1,-50..300" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdLyGlOpib2QhEguSpeuTNOtV4VMcfhVo"></script> -->

</head>

<body>




  <!-- start navbar -->
  <section class="main-navbar fixed-top" style="background-color: #1dcd8d;">


    <?= $this->session->flashdata('home_message') ?>

    <div class="container">

      <nav class="navbar navbar-expand-lg ">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="text-light nav-link" href="#beranda">
              <h5>Beranda</h5>
            </a>
            <a class="text-light nav-link " href="#lokasi">
              <h5>Lokasi</h5>
            </a>
            <a class="text-light nav-link" href="#FAQ">
              <h5>FAQ</h5>
            </a>
            <a class="text-light nav-link" href="#laporkan">
              <h5>Laporkan</h5>
            </a>
            <a class="text-light nav-link" href="#">
              <h5>Blog</h5>
            </a>
          </div>
        </div>
      </nav>
    </div>

  </section>
  <!-- end navbar -->

  <!-- start header -->
  <section class="main-header" id="beranda">
    <div class="container">
      <div class="row">
        <div class="col-md-7 main-title header-text text-light">
          <img src="<?= base_url('assets/frontend/images/logo/logo-bpbd.png') ?>" width="100" alt="">
          <img src="<?= base_url('assets/frontend/images/logo/univ-hangtuah.png') ?>" width="118" alt="">

          <h1 class="mt-4"><b>SELAMAT DATANG <br> DI WEB APLIKASI PENGADUAN <br> BANJIR
            </b>
          </h1>

          <h5>BPBD PEKANBARU</h5>
          <a href="#aduan" class="btn btn-warning">YUK ! BANTU LAPORKAN</a>
        </div>
        <div class="col-md-5 mt-5">
          <img src="<?= base_url('assets/frontend/images/hero/hero1.png') ?>" alt="" width="100%">
        </div>
      </div>
    </div>
  </section>
  <!-- end header -->

  <!-- start lokasi alat dan status -->

  <section class="main-lokasi" id="lokasi">
    <div class="container">

      <h2 class="text-title text-center mt-5">LOKASI DAN STATUS</h2>

      <div class="row d-flex justify-content-between mt-5 p-3 ">
        <?php foreach ($dataLokasi as $row) : ?>
          <?php if ($row['state'] == 'BAHAYA') {
            $class = 'text-danger';
          } elseif ($row['state'] == 'WASPADA') {
            $class = 'text-warning';
          } else {
            $class = 'text-success';
          } ?>
          <div class="mb-5 box">
            <h1 class="text-center mt-5"><span class="fa fa-water mt-3 <?= $class ?>"> </span></h1>
            <h1 class="text-center"><?= $row['state'] ?></h1>
            <p class="text-center"><?= $row['name_location'] ?></p>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </section>
  <!-- start lokasi alat dan status -->

  <!-- start FAQ -->

  <section class="border" style="background-color: #F7F7F7;" id="FAQ">
    <div id="faq" class="faq container mt-5 mb-5 ">
      <h2 class="text-title text-center mt-5 mb-5">FAQ</h2>
      <div class="faq-list">
        <div class="faq-question" onclick="toggleFAQ(this)">
          <p>1. Bagaimana saya dapat melaporkan kejadian banjir melalui website ini?</p>
          <span class="material-symbols-outlined faq-icon"> add </span>
        </div>
        <div class="faq-answer">
          <p align="justify"> Untuk melaporkan kejadian banjir, silakan klik tombol "Laporkan Banjir" di halaman utama. Anda akan diarahkan ke formulir pengaduan di mana Anda dapat memasukkan detail seperti lokasi, tingkat kedalaman air, dan foto-foto situasi terkini jika tersedia. Pastikan Anda memberikan informasi yang akurat dan lengkap agar tim respons bencana kami dapat bertindak dengan cepat.</p>
        </div>
      </div>
      <div class="faq-list">
        <div class="faq-question" onclick="toggleFAQ(this)">
          <p>2. Saya telah melaporkan kejadian banjir. Berapa lama respons dari tim darurat?</p>
          <span class="material-symbols-outlined faq-icon"> add </span>
        </div>
        <div class="faq-answer">
          <p align="justify">Kami berkomitmen untuk merespons setiap laporan dalam waktu 24 jam. Namun, respons sebenarnya mungkin lebih cepat atau lebih lambat tergantung pada tingkat keparahan banjir, jumlah laporan yang masuk, dan kondisi akses ke lokasi. Kami menyarankan agar Anda tetap berada di tempat yang aman dan tinggi sambil menunggu bantuan dan mengikuti update dari website atau saluran komunikasi resmi kami.</p>
        </div>
      </div>
      <div class="faq-list">
        <div class="faq-question" onclick="toggleFAQ(this)">
          <p>3. Bagaimana saya dapat mengetahui area mana saja yang terkena dampak banjir?</p>
          <span class="material-symbols-outlined faq-icon"> add </span>
        </div>
        <div class="faq-answer">
          <p align="justify">Website kami memiliki peta interaktif yang menampilkan area-area yang terkena dampak banjir berdasarkan laporan dari pengguna dan sensor otomatis. Anda dapat mengakses peta tersebut di halaman "Web. Harap dicatat bahwa informasi di peta diperbarui secara real-time, namun mungkin terdapat keterlambatan atau ketidakakuratan karena keterbatasan teknis atau informasi yang masuk.</p>

        </div>
      </div>
    </div>
  </section>
  <!-- end FAQ -->

  <!-- start cara melaporkan banjir -->
  <section class="main-lapor" id="laporkan">

    <section>
      <div class="container p-5">
        <div class="content">

          <h1 class="text-title text-center">Cara Melaporkan Banjir</h1>
          <div class="col-md-5 m-auto">
            <p class="text-center">Berikut ini adalah video tutorial cara melakukan pelaporan dengan menggunakan web
              apps Pelaporan Banjir.</p>
          </div>
          <div class="col-md-6 mt-5 border m-auto">
            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" style="width: 100%; height: 360px;">
            </iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- end cara melaporkan banjir -->

    <!-- start carousel -->
    <section class="pengaduan border mb-5" id="laporkan" style="background-color: #F7F7F7;">
      <h1 class="text-title text-center">Data pengaduan</h1>
      <div class="col-md-5 m-auto mb-5">
        <p class="text-center">Berikut ini adalah seluruh data pengaduan masyarakat pekanbaru dan sedang kami diproses
        </p>
      </div>

      <button class="pre-btn"><img src="<?= base_url('assets/frontend/') ?>images/logo/arrow.png" alt=""></button>
      <button class="nxt-btn"><img src="<?= base_url('assets/frontend/') ?>images/logo/arrow.png" alt=""></button>
      <div class="pengaduan-container container ">
        <?php foreach ($pengaduan as $row) : ?>
          <?php if ($row['state_of_report'] == 1) {

            $text = 'Diproses';
            $textColor = 'text-primary';
            $display = '';
          } elseif ($row['state_of_report'] == 2) {

            $text = 'Selesai';
            $textColor = 'text-success';
            $display = '';
          } else {
            $text = 'Dibatalkan';
            $textColor = 'text-danger';
            $display = 'd-none';
          } ?>
          <div class="pengaduan-card mb-5 mt-3 <?= $display ?>" style="background-color: #ffff;">
            <div class="pengaduan-image">
              <img src="<?= base_url('assets/frontend/') ?>images/pengaduan/<?= $row['proof_image'] ?>" class="pengaduan-thumb" alt="">
              <!-- <button class="card-btn">Selengkapnya</button> -->
            </div>
            <div class="pengaduan-info">
              <h6 class="pengaduan-brand <?= $textColor ?>"><?= $text ?></h6>
              <hr>
              <p class="pengaduan-short-description"><?= $row['name_location'] ?></p>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </section>
    <!-- start carousel -->


    <!-- start pesan -->
    <div class="container aduan  mb-5" id="aduan">
      <div class="d-grid gap-2">
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          klik disini untuk melaporkan
        </button>
      </div>



      <div class="collapse border-0" id="collapseExample">
        <div class="card card-body">
          <?= form_open_multipart('home') ?>
          <h1 class="name">Laporan Aduan <span></span></h1>
          <div class=" data-user ">
            <div class="display">
              <div class="nama">
                <span class="material-symbols-outlined"> person </span>
                <input type="text" name="name" id="name" value="<?= set_value('name') ?>" placeholder="Nama" />
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>

              </div>
              <div class="email">
                <span class="material-symbols-outlined"> call </span>
                <input type="text" name="phone" value="<?= set_value('phone') ?>" id="email" placeholder="No. Telephone" />
                <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>

              </div>

            </div>
            <div class="image">
              <span class="material-symbols-outlined"> map </span>
              <input type="text" name="name_location" value="<?= set_value('name_location') ?>" id="email" placeholder="Lokasi" />
              <?= form_error('name_location', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="image">
              <label for="latitude">Latitude:</label>
              <input type="text" id="latitude" name="latitude" readonly>
              <br>
              <label for="longitude">Longitude:</label>
              <input type="text" id="longitude" name="longitude" readonly>

            </div>
            <div class="image">

              <!-- Custom label with the desired text -->
              <label for="customFileInput" name="proof" class="custom-file-upload">
                <span class="material-symbols-outlined"> image </span>

              </label>
              <!-- Display selected file name -->
              <span class="file-name m-3 text-danger">Bukti Foto harus diisi</span>
              <!-- Actual file input element -->
              <input type="file" id="customFileInput" name="proof" required accept=".jpg, .png, .jpeg">
              <?= form_error('proof', '<small class="text-danger">', '</small>'); ?>

            </div>
            <!-- Actual file input element -->
          </div>
          <div class="pesan">
            <span class="material-symbols-outlined"> message </span>
            <textarea name="message" id="message" cols="150" rows="5" placeholder="Pesan Aduan"><?= set_value('message') ?></textarea>
            <?= form_error('message', '<small class="text-danger">', '</small>'); ?>

          </div>
          <button type="submit" onclick="return confirm('apakah anda yakin ingin melaporkan ?')" class="btn btn-success m-2">Ajukan Laporan</button>
          <button type="reset" class="btn btn-danger m-2">Reset</button>
          <?= form_close() ?>
        </div>
      </div>


    </div>

    <section class="border" style="background-color: #1dcd8d;">
      <div class="  text-light m-auto" style="width: 90%;">
        <h2 class="mt-3">BPBD PEKANBARU</h2>
        <div class="address mt-3 ">
          <p class="alamat">
            <i class="fa-solid fa-location-dot"></i> Jl. Mustafa Sari No.1, Tengkerang Sel., Kec. Bukit Raya, Kota
            Pekanbaru, Riau 28125
          </p>
          <p class="telp">
            <i class="fa-solid fa-phone"></i> Telepon : 081-176-514-64
          </p>
          <div class="row ">
            <div class="col-md-5 ">
              <p class="mail ">
                <i class="fa-solid fa-envelope"></i> Email :
                bpbdpekanbaru$gmail.com
              </p>
            </div>
            <div class="col-md-6  text-footer ms-auto">
              <p class="">© created by: technorider.id</p>
            </div>
          </div>

        </div>
      </div>
    </section>

  </section>

  <!-- end pesan -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="./assets/js/main.js"></script>
  <script>
    // Ambil elemen navbar dan item menu-nya
    const navbar = document.querySelector('.navbar');
    const navItems = document.querySelectorAll('.nav-link');

    // Fungsi untuk menandai menu saat posisi scroll berada di dalam bagian yang sesuai
    function highlightNav() {
      navItems.forEach((item) => {
        const section = document.querySelector(item.getAttribute('href'));
        const rect = section.getBoundingClientRect();

        if (rect.top <= 50 && rect.bottom >= 50) {
          navItems.forEach((nav) => nav.classList.remove('text-dark'));
          item.classList.add('text-dark');
        } else {
          item.classList.remove('text-dark');
        }
      });
    }

    // Panggil fungsi highlightNav() saat halaman dimuat dan saat scroll
    window.addEventListener('load', highlightNav);
    window.addEventListener('scroll', highlightNav);
  </script>

  <script>
    function toggleFAQ(el) {
      var faq = el.parentElement;
      var answer = el.nextElementSibling;

      var otherFAQs = document.querySelectorAll(".faq-list");
      otherFAQs.forEach(function(faqItem) {
        var question = faqItem.querySelector(".faq-question");
        var answer = faqItem.querySelector(".faq-answer");
        var icon = faqItem.querySelector(".faq-icon");

        if (faqItem === faq) {
          question.classList.toggle("show");
          answer.classList.toggle("show");
          if (answer.style.maxHeight) {
            answer.style.maxHeight = null;
            icon.innerText = "add";
          } else {
            answer.style.maxHeight = answer.scrollHeight + "px";
            icon.innerText = "remove";
          }
        } else {
          question.classList.remove("show");
          answer.classList.remove("show");
          answer.style.maxHeight = null;
          icon.innerText = "add";
        }
      });
    }
  </script>


  <script>
    const pengaduanContainers = [...document.querySelectorAll('.pengaduan-container')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    pengaduanContainers.forEach((item, i) => {
      let containerDimensions = item.getBoundingClientRect();
      let containerWidth = containerDimensions.width;

      nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
      })

      preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
      })
    })
  </script>

  <script>
    const customFileInput = document.getElementById('customFileInput');
    const fileNameDisplay = document.querySelector('.file-name');

    customFileInput.addEventListener('change', () => {
      if (customFileInput.files.length > 0) {
        fileNameDisplay.textContent = customFileInput.files[0].name;
      } else {
        fileNameDisplay.textContent = 'No file chosen';
      }
    });
  </script>

  <script src="<?= base_url('assets/frontend/js/main.js') ?>"></script>

  <script>
    // Memeriksa apakah browser mendukung geolocation
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Memasukkan data latitude dan longitude ke dalam input teks
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;
      });
    } else {
      alert("Browser Anda tidak mendukung geolocation.");
    }
  </script>


</body>

</html>