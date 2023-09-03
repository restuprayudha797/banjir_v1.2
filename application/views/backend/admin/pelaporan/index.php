<!-- page content -->

<?php
if (validation_errors()) {

  $this->session->set_flashdata('kelas_message', ' <div class="alert alert-danger" id="notification" role="alert">
            Data Yang Anda Masukkan Tidak Lengkap Mohon Periksa Kembali!
            </div>');
}
?>

<div class="right_col" role="main">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <?= $this->session->flashdata('pelaporan_message'); ?>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title ">
          <div class="d-flex justify-content-center ">
            <div class="p-2 ">
              <h3><?= $title; ?></h3>
            </div>
            <div class="ml-auto p-2 bd-highlight">

            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">

                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No Laporan</th>
                      <th>Waktu</th>
                      <th>Nama</th>
                      <th>No Hp</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($pengaduan as $row) : ?>
                      <?php if ($row['state_of_report'] == 1) {

                        $text = 'Diproses';
                        $buttonColor = 'btn btn-primary';
                      } elseif ($row['state_of_report'] == 2) {

                        $text = 'Selesai';
                        $buttonColor = 'btn btn-success';
                      } else {
                        $text = 'Dibatalkan';
                        $buttonColor = 'btn btn-danger';
                      } ?>
                      <tr>
                        <td><?= $row['report_number'] ?></td>
                        <td><?= date('d   F   Y,  h:i:s', $row['timestamp']) ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><button type="button" class="<?= $buttonColor ?> rounded btn-lg btn-block" data-toggle="modal" data-target="#pengaduan<?= $row['report_number'] ?>">
                            <b><?= $text ?></b> <i class="fa fa-ellipsis-v p-1"></i>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php foreach ($pengaduan as $row) : ?>
  <!-- Modal -->
  <div class="modal fade" id="pengaduan<?= $row['report_number'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan No. <?= $row['report_number'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">

            <div class="row mt-3">
              <div class="col-md-12">
                <div class="col-md-12">
                  <h6><i class="fa fa-user"></i> <b> Nama : <?= $row['name'] ?></b></h6>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="col-md-12">
                  <h6><i class="fa fa-phone"></i> <b> No Tlp : <?= $row['phone'] ?></b> </h6>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="col-md-12">
                  <h6><i class="fa fa-map-marker"></i> <b> Lokasi : <?= $row['name_location'] ?></b> </h6>
                  <a href="https://www.google.com/maps?q=<?= $row['latitude'] ?>,<?= $row['longitude'] ?>" target="_blank">Lihat di Google Maps</a>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="col-md-6">
                  <img src="<?= base_url('assets/frontend/images/pengaduan/' . $row['proof_image']) ?>" alt="" width="100%">
                </div>

              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="col-md-12">
                  <h6><b class="fa fa-comment"></b> <b>Pesan :</b> <?= $row['message'] ?></h6>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <?php if ($row['state_of_report'] != 3) : ?>

            <a href="<?= base_url('pelaporan/cancel/' . $row['report_number']) ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batalkan Pengaduan</a>
          <?php endif ?>

          <?php if ($row['state_of_report'] != 1) : ?>
            <a href="<?= base_url('pelaporan/proses/' . $row['report_number']) ?>" class="btn btn-primary"><i class="fa fa-retweet"></i> proses</a>
          <?php endif ?>

          <?php if ($row['state_of_report'] != 2) : ?>
            <a href="<?= base_url('pelaporan/done/' . $row['report_number']) ?>" class="btn btn-success"><i class="fa fa-check"></i> Selesaikan</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- end modal -->