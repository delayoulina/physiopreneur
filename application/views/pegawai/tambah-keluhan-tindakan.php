<!DOCTYPE html>
<html lang="en">
<head>
<title>Keluhan & Tindakan - Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
            <label class="control-label">Tanggal:&nbsp; 3/2/2017</label>
        </div>

        <div class="span3">
              <label class="control-label">Physioterapist:&nbsp; Zona</label>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Pasien : Satrio Wibowo</h5>
          </div>

          <div class="widget-content nopadding">

            <form action="#" method="get" class="form-horizontal">
  		        <div class="control-group">
                <label class="control-label">Keluhan</label>
                <div class="controls">
                  <textarea class="span11" ></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tindakan</label>
                <div class="controls">
                  <div class="span4">
                    <label><input type="checkbox" name="radios" />Manual Therapy</label>
                    <label><input type="checkbox" name="radios" />Infrared</label>
                    <label><input type="checkbox" name="radios" />Laser</label>
                  </div>
                  <div class="span4">
                    <label><input type="checkbox" name="radios" />Functional Exercise</label>
                    <label><input type="checkbox" name="radios" />Hot / Ice</label>
                    <label><input type="checkbox" name="radios" />Ultrasound Dithermy</label>
                  </div>
                  <div class="span4">
                    <label><input type="checkbox" name="radios" />Tens/Es</label>
                    <label><input type="checkbox" name="radios" />Gym</label>
                    <label><input type="checkbox" name="radios" />Drill</label>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                      <span class="pull-right"><a type="submit" href="rekam-medik.php" class="btn btn-success" /> Simpan</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!--Footer-part-->

<!--end-Footer-part-->
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>js/jquery.toggle.buttons.js"></script>
<script src="<?php echo base_url() ?>js/masked.js"></script>
<script src="<?php echo base_url() ?>js/jquery.uniform.js"></script>
<script src="<?php echo base_url() ?>js/select2.min.js"></script>
<script src="<?php echo base_url() ?>js/matrix.js"></script>
<script src="<?php echo base_url() ?>js/matrix.form_common.js"></script>
<script src="<?php echo base_url() ?>js/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-wysihtml5.js"></script>
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
