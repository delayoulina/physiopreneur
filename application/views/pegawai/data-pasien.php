<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Pasien - Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <h1>Data Pasien</h1>
    </div>
  <!--End-breadcrumbs-->

  <!--php ambil data-->
  <?php
    $jumlahPasien = $listPasien->num_rows();
    if($jumlahPasien ==0 ){

  ?>
  <!--Kalau kosong, kita harus melakukan add pasien-->
  <a href="<?= base_url() ?> index.php/pegawai/tambahpasien">Tambah Pasien</a>
  <?php
    }
    else {
  ?>
  <!-- kalau ada datanya, maka kita akan tampilkan dalam table-->
      <div class="container-fluid">
        <hr>
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Data Seluruh Pasien</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>ID Pasien</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                  //Kita akan melakukan looping sesuai dengan data yg dimiliki
                  $nomor = 0; //untuk pengisian nomor
                  foreach ($listPasien->result() as $row){
                ?>
                  <tr>
                    <td><center><?= $nomor ?></center></td>
                    <td><?= $row->nama_pasien ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->id?></td>
                    <td>
                      <center>
                        <!--akan masuk ke rekam medik-->
                        <a href="<?php echo base_url() ?>index.php/rekammedik">
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
       <?php         
        }  
      ?>

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
</body>
</html>
