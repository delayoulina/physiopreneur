<!DOCTYPE html>
<html lang="en">
<head>
<title>Tambah Pegawai - Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/matrix-media.css" />
<link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<?php include 'header.php';?>

<?php include 'navbar.php';?>
<!--sidebar-menu-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Pendaftaran Pasien</a> </div>
    <h1>Pendaftaran Pegawai</h1>
  </div>
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <form action="<?php echo base_url('index.php/manager/actionTambahPegawai') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Informasi Akun</h5>
          </div>
          <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" placeholder="Username" name="username" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="pwd" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Confirm password</label>
                <div class="controls">
                  <input type="password" name="confirm_password" id="pwd2" />
                </div>
              </div>
          </div>
        </div>

        <hr>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Diri Pegawai</h5>
          </div>
          <div class="widget-content nopadding">

              <div class="control-group">
                <label class="control-label">NIK</label>
                <div class="controls">
                  <input type="text" value="<?php echo $genNikPegawai; ?>" name="nik" readonly />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input type="text" class="span8" placeholder="Nama Lengkap" name="namaPegawai" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Nomor HP</label>
                <div class="controls">
                  <input type="phone" name="noHP" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                  <textarea class="span8" name="alamat" required></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Lokasi</label>
                <div class="controls">
                  <select name="idLokasi" required>
                      <option value="#">---Pilih---</option>
					  <?php 
					  foreach ($dataLokasi->result() as $row){
					  ?>
					  <option value="<?= $row->id ?>"><?= $row->lokasi ?></option>
					  <?php } ?>
                 </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Foto</label>
                <div class="controls">
                  <input type="file" class="span11" name="fotoPegawai" required />
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Simpan"/>
              </div>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
<!--</div>
<!--end-main-container-part-->


<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--End-Footer-part-->
<!-- JS part -->
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url()?>js/matrix.js"></script>
<script src="<?php echo base_url()?>js/matrix.interface.js"></script>
<script src="<?php echo base_url()?>js/matrix.popover.js"></script>
</body>
</html>
