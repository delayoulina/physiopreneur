<!DOCTYPE html>
<html lang="en">
<head>
<title>Keluhan & Tindakan - Physiopreneur</title>
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
      <h1>Tambah Keluhan & Tindakan</h1>
    </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span10">
        <div class="span2"></div>

        <div class="span5">
            <label class="control-label">Tanggal:&nbsp; <?php echo date('d/m/Y'); ?></label>
        </div>
		<?php
				foreach ($dataPegawai as $row):
			?>
        <div class="span3">
              <label class="control-label">Physioterapist:&nbsp; <?= $row->nama ?></label>
        </div>
				<?php endforeach; ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
		  <?php foreach($hasil as $data): ?>
            <h5>Pasien : <?php echo $data->nama_pasien; ?></h5>
          </div>
		  <?php endforeach; ?>
          <div class="widget-content nopadding">

            <form action="<?php echo base_url('index.php/Pegawai/actionTambahKeluhan') ?>" method="post" class="form-horizontal">
  		        <div class="control-group">
                <label class="control-label">Keluhan</label>
                <div class="controls">
                  <textarea class="span11" name="keluhan" required></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tindakan</label>
                <div class="controls">
                  <div class="span4">
                    <label><input type="checkbox" name="radios[]" value="Manual Therapy"/>Manual Therapy</label>
                    <label><input type="checkbox" name="radios[]" value="Infrared"/>Infrared</label>
                    <label><input type="checkbox" name="radios[]" value="Laser"/>Laser</label>
                  </div>
                  <div class="span4">
                    <label><input type="checkbox" name="radios[]" value="Functional Exercise"/>Functional Exercise</label>
                    <label><input type="checkbox" name="radios[]" value="Hot / Ice"/>Hot / Ice</label>
                    <label><input type="checkbox" name="radios[]" value="Ultrasound Dithermy"/>Ultrasound Dithermy</label>
                  </div>
                  <div class="span4">
                    <label><input type="checkbox" name="radios[]" value="Tens / ES"/>Tens / ES</label>
                    <label><input type="checkbox" name="radios[]" value="Gym"/>Gym</label>
                    <label><input type="checkbox" name="radios[]" value="Drill"/>Drill</label>
                  </div>
                </div>
              </div>
              <div class="form-actions">
				<span class="pull-right"><input type="submit" class="btn btn-success" value="Simpan"/></span>
              </div>
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
</script>
</body>
</html>
