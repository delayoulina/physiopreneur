<!DOCTYPE html>
<html lang="en">
<head>
<title>Rekam Medik - Physiopreneur</title>
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
      <h1>Rekam Medik</h1>
    </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="span4">
          <div class="span4"></div>
          <?php foreach ($rekamMedik->result() as $data){ ?>
              <label class="control-label">Kode Pasien &nbsp; : &nbsp;<?= $data->kode_pasien; ?> </label>
              <label class="control-label">Nama Pasien &nbsp; : &nbsp;<?= $data->nama_pasien; ?> </label>
        </div>

        <div class="span4">  </div>

        <div class="span4">
        <img src="<?php echo base_url() ?>asset/foto_pasien/<?=$data->foto?>" alt="<?=$data->foto?>" style="width:100px; height:100px;"/>
        </div>
        <div class="span4"></div>
        <div class="span4">
          <div class="span3"></div>
            <a href="<?php echo base_url() ?>index.php/pegawai/viewTambahKeluhan">
              <button class="btn btn-info"><i class="icon icon-plus"></i>Rekam Medik</button>
            </a>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekam Medik - <?= $data->nama_pasien; ?></h5>
        <?php
			$session_data['idPasienTambahRekam'] = $data->id;
			$this->session->set_userdata($session_data);
		}?>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Keluhan</th>
                  <th>Tindakan</th>
                  <th>Physioterapist</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $jumlahRekamMedik = $medik->num_rows();
                  if ($jumlahRekamMedik > 0) {
                  foreach ($medik->result() as $data){ ?>
                <tr>
                  <td><?= $data->tanggal  ?></td>
                  <td><?= $data->diagnosa  ?></td>
                  <td><?= $data->tindakan  ?></td>
                  <td class="center"><?= $data->nama  ?></td>
                </tr>
                <?php }} ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
</body>
</html>
