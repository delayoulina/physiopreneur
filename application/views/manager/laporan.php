<!DOCTYPE html>
<html lang="en">
<head>
<title>Laporan - Physiopreneur</title>
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
      <h1>Laporan</h1>
    </div>
  <!--End-breadcrumbs-->
  <center>
    <div class="control-group">
        <label for="checkboxes" class="control-label"><b>Pilih Jenis Laporan Berdasarkan</b></label>
        <div class="controls">
            <div data-toggle="buttons-radio" class="btn-group">
              <button class="btn btn-success" type="button" name="btn_minggu" onclick="showMinggu()">Mingguan</button>
              <button class="btn btn-primary" type="button" name="btn_bulan" onclick="showBulan()">Bulanan</button>
              <button class="btn btn-danger" type="button" name="btn_tahun" onclick="showTahun()">Tahunan</button>
            </div>
        </div>
    </div>
  </center>

  <div class="container-fluid" id="minggu" style="display:block;">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Laporan Per Minggu</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Cabang</th>
                    <th>Penghasilan</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if($dataLaporanPerMinggu != null){
						$no = 1;
						foreach ($dataLaporanPerMinggu->result() as $row){
				?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $row->tanggal ?></td>
					<td><?= $row->lokasi ?></td>
					<td><?= $row->total  ?></td>
				</tr>
				<?php
					} }
				?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>


  <div class="container-fluid" id="bulan" style="display:none;">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Laporan Per Bulan</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Bulan ke-</th>
                    <th>Cabang</th>
                    <th>Penghasilan</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if($dataLaporanPerBulan != null){
						$no = 1;
						foreach ($dataLaporanPerBulan->result() as $row){
				?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $row->bulan ?></td>
					<td><?= $row->lokasi ?></td>
					<td><?= $row->total  ?></td>
				</tr>
				<?php
					} }
				?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container-fluid" id="tahun" style="display:none;">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Laporan Per Tahun</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Cabang</th>
                    <th>Penghasilan</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if($dataLaporanPerTahun != null){
						$no = 1;
						foreach ($dataLaporanPerTahun->result() as $row){
				?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $row->tahun ?></td>
					<td><?= $row->lokasi ?></td>
					<td><?= $row->total  ?></td>
				</tr>
				<?php
					} }
				?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

</div>
<!--Footer-part-->

<!--end-Footer-part-->
<script>
	$('.textarea_editor').wysihtml5();

  function showMinggu() {
   document.getElementById('minggu').style.display = "block";
   document.getElementById('bulan').style.display = "none";
   document.getElementById('tahun').style.display = "none";
  }

  function showBulan() {
    document.getElementById('minggu').style.display = "none";
    document.getElementById('bulan').style.display = "block";
    document.getElementById('tahun').style.display = "none";
  }

  function showTahun() {
    document.getElementById('minggu').style.display = "none";
    document.getElementById('bulan').style.display = "none";
    document.getElementById('tahun').style.display = "block";
  }

</script>
</body>
</html>
