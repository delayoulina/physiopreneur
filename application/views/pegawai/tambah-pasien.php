<!DOCTYPE html>
<html lang="en">
<head>
<title>Tambah Pasien - Physiopreneur</title>
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
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Pendaftaran Pasien</a> </div>
    <h1>Pendaftaran Pasien</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Diri Pasien</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url('index.php/Pegawai/actionTambahPasien') ?>" method="post" enctype="multipart/form-data" class="form-horizontal"	>
			  <div class="control-group">
                <label class="control-label">Tipe Pasien :</label>
                <div class="controls">
                  <select required class="span11" name="tipe">
					<option value="">---Pilih---</option>
					<option value="1">Pelajar</option>
					<option value="2">Umum</option>
				  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kode Pasien :</label>
                <div class="controls">
                  <input type="text" class="span11" value="<?php echo $genKdPasien; ?>" name="kdPasien" readonly/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Nama Lengkap" name="namaPasien" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Tanggal Lahir :</label>
                <div class="controls">
                  <input type="date" class="span11" name="tglLahir" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                  <textarea class="span11" name="alamat" required></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">No Handphone :</label>
                <div class="controls">
                  <input type="number" class="span11" placeholder="No Handphone" name="noHP" required/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Foto :</label>
                <div class="controls">
                 <input type="file" class="span11" name="fotoPasien" required />
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Simpan"/>
                <!--<button class="btn btn-success">Simpan</button>-->
              </div>
            </form>
          </div>
        </div>
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
</body>
</html>
