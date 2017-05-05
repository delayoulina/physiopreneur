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
        <label for="checkboxes" class="control-label"><b>Pilih Jenis Laporan</b></label>
        <div class="controls">
            <div data-toggle="buttons-radio" class="btn-group">
              <button class="btn btn-success" type="button" name="btn_keuangan" onclick="showKeuangan()">Laporan Keuangan</button>
              <button class="btn btn-primary" type="button" name="btn_pasien" onclick="showPasien()">Laporan Pasien</button>
            </div>
        </div>
    </div>
  </center>

  <div class="container-fluid" id="keuangan" style="display:block;">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Laporan Keuangan</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Penghasilan</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if($dataLaporanKeuangan != null){
						$no = 1;
						foreach ($dataLaporanKeuangan->result() as $row){
				?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $row->tanggal  ?></td>
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

  <div class="container-fluid" id="pasien" style="display:none;">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Laporan Pasien</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					if($dataLaporanPasien != null){
						$no = 1;
						foreach ($dataLaporanPasien->result() as $row){
				?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $row->nama_pasien  ?></td>
					<td><?= $row->alamat  ?></td>
					<td>
						<center>
                        <!--akan masuk ke rekam medik-->
                        <a href="<?php echo base_url() ?>index.php/pegawai/viewRekamMedik/<?= $row->id?>">
                          <button class="btn btn-primary"><i class="icon icon-search"></i> Details</button>
                        </a>
                      </center>
					</td>
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

  function showKeuangan() {
   document.getElementById('keuangan').style.display = "block";
   document.getElementById('pasien').style.display = "none";
  }

  function showPasien() {
   document.getElementById('keuangan').style.display = "none";
   document.getElementById('pasien').style.display = "block";
  }

</script>
</body>
</html>
