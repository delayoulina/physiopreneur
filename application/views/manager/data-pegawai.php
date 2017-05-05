<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Pegawai - Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/matrix-media.css" />
<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'></head>
</head>
<body>

  <!--Header-part-->
  <?php include 'header.php';?>

  <?php include 'navbar.php';?>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
  <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"></div>
      <h1>Data Pegawai</h1>
    </div>
  <!--End-breadcrumbs-->
  <!--php ambil data-->
  <?php
    $jumlahPegawai = $listPegawai->num_rows();
    if($jumlahPegawai ==0 ){
  ?>
  <!--Kalau kosong, kita harus melakukan add pasien-->
  <a href="<?= base_url() ?> index.php/pegawai/TambahPegawai">Tambah Pegawai</a>
  <?php
    }
    else {
  ?>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Seluruh Pegawai</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Lokasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //Kita akan melakukan looping sesuai dengan data yg dimiliki
                  $nomor = 1; //untuk pengisian nomor
                  foreach ($listPegawai->result() as $row){
                ?>
                <tr>
                  <td><center><?= $nomor++ ?></center></td>
                  <td><?= $row->nik ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->no_hp?></td>
                  <td><?= $row->lokasi?>, <?= $row->kota?></td>
                  <td>
                    <center>
                      <!--akan masuk ke rekam medik-->
                      <a href="<?php echo base_url() ?>index.php/Manager/viewDetailPegawai/<?= $row->nik?>">
                        <button class="btn btn-primary"><i class="icon icon-search"></i> Details</button>
                      </a>
                    </center>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--Footer-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--End-Footer-part-->
<!-- JS part -->
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.uniform.js"></script>
<script src="<?php echo base_url() ?>js/select2.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>js/matrix.js"></script>
<script src="<?php echo base_url() ?>js/matrix.tables.js"></script>
</body>
</html>
