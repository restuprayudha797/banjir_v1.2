<?php

// get total laporan 
$total = 0;
foreach ($pengaduan as $ReportTotal) {

  $total++;
}
// end get total laporan 


// get laporan waiting
$waiting = 0;
foreach ($pengaduan as $ReportWaiting) {

  if ($ReportWaiting['state_of_report'] == 1) {

    $waiting++;
  }
}
// end get laporan waiting

// get laporan prosess
$prosess = 0;
foreach ($pengaduan as $Reportprosess) {

  if ($Reportprosess['state_of_report'] == 2) {

    $prosess++;
  }
}
// end get laporan prosess


// get laporan cancel
$cancel = 0;
foreach ($pengaduan as $Reportcancel) {

  if ($Reportcancel['state_of_report'] == 3) {

    $cancel++;
  }
}
// end get laporan cancel


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row" style="display: inline-block;">
    <div class="tile_count">

      <div class="col-sm-3 tile_stats_count">
        <span class="count_top"><i class="fa fa-files-o"></i> Total Laporan</span>
        <div class="count"><?= $total ?></div>
        <span class="count_bottom"> Semua Data Laporan</span>
      </div>
      <div class="col-sm-3 tile_stats_count">
        <span class="count_top"><i class="fa fa-files-o"></i> Menunggu</span>
        <div class="count"><?= $waiting ?></div>
        <span class="count_bottom"><?= $waiting ?> dari <?= $total ?> Data</span>
      </div>
      <div class="col-sm-3 tile_stats_count">
        <span class="count_top"><i class="fa fa-files-o"></i> Diproses</span>
        <div class="count"><?= $prosess ?></div>
        <span class="count_bottom"><?= $prosess ?> dari <?= $total ?> Data</span>
      </div>
      <div class="col-sm-3 tile_stats_count">
        <span class="count_top"><i class="fa fa-files-o"></i> Dibatalkan</span>
        <div class="count"><?= $cancel ?></div>
        <span class="count_bottom"><?= $cancel ?> dari <?= $total ?> Data</span>
      </div>
    </div>
  </div>
  <!-- top tiles -->
  <div class="row">
    <?php $i = 1 ?>
    <?php foreach ($dataLokasi as $row) : ?>
      <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320">
          <div class="x_title">
            <h2>Lokasi <?= $i ?></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content text-dark">
            <h4 class="" align="justify"><i class="fa fa-map-marker text-danger"> <b class="text-dark"></b></i> <b>Lokasi :</b> <?= $row['name_location'] ?></h4>
            <div class="row mt-4">
              <div class="col-md-1 ">
                <h4><i class="fa fa-tint" style="color: #479ceb;"></i></h4>
              </div>
              <div class="col-md-1 ">
                <h4>:</h4>
              </div>
              <div class="col-md-3 ">
                <h4><b class="text-dark"> <?= $row['water_level'] ?> M</b></h4>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-1 ">
                <h4><i class="fa fa-temperature-high" style="color: #ff2600;"></i></h4>
              </div>
              <div class="col-md-1 ">
                <h4>:</h4>
              </div>
              <div class="col-md-3 ">
                <h4><b class="text-dark"> <?= $row['temperature'] ?> C</b></h4>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-1 ">
                <?php if ($row['state'] == 'AMAN') : ?>

                  <h4><i class="fa-brands fa-font-awesome text-success" style="color: #ff2600;"></i></h4>
                <?php elseif ($row['state'] == 'WASPADA') : ?>
                  <h4><i class="fa-brands fa-font-awesome text-warning" style="color: #ff2600;"></i></h4>
                <?php else : ?>
                  <h4><i class="fa-brands fa-font-awesome text-danger" style="color: #ff2600;"></i></h4>

                <?php endif ?>
              </div>
              <div class="col-md-1 ">
                <h4>:</h4>
              </div>
              <div class="col-md-3 ">
                <?php if ($row['state'] == 'AMAN') : ?>
                  <h4><b class="text-success"><?= $row['state'] ?></b></h4>
                <?php elseif ($row['state'] == 'WASPADA') : ?>

                  <h4><b class="text-warnign"><?= $row['state'] ?></b></h4>
                <?php else : ?>

                  <h4><b class="text-danger"><?= $row['state'] ?></b></h4>


                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $i++ ?>
    <?php endforeach ?>
  </div>
  <!-- /top tiles -->

  <br />

  

</div>
</div>
<!-- /page content -->