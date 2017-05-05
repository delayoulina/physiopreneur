<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Diri Pasien - Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body>

<!--Header-part-->
<?php include 'header.php';?>

<?php include 'navbar.php';?>

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Pendaftaran Pasien</a> </div>
    <h1>Update Pasien</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Update Pasien</h5>
          </div>
          <div class="widget-content nopadding">
            <?php foreach ($dataPasien->result() as $data) {
    ?>
            <form action="<?php echo base_url('index.php/Pegawai/actionUpdatePasien') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
			      <div class="control-group">
                <label class="control-label">Tipe Pasien</label>
                <div class="controls">
                  <select class="span11" name="tipe" required>
				  <?php $selected = "";
    $selected1 = "";
    if ($data->id_jenis_pasien == 1) {
        $selected = "selected";
    } elseif ($data->id_jenis_pasien == 2) {
        $selected1 = "selected";
    } ?>
            			<option value="1" <?= $selected ?> >Pelajar</option>
						<option value="2" <?= $selected1 ?> >Umum</option>
        			</select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kode Pasien</label>
                <div class="controls">
                  <input type="text" class="span11" value="<?=$data->kode_pasien?>" name="idPasien" readonly />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Nama Lengkap" name="namaPasien" required value="<?=$data->nama_pasien?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Tanggal Lahir</label>
                <div class="controls">
                  <input type="date" class="span11" name="tglLahir" required value="<?=$data->tanggal_lahir?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                  <textarea class="span11" name="alamat" required><?=$data->alamat?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">No Handphone</label>
                <div class="controls">
                  <input type="number" class="span11" placeholder="No Handphone" name="noHP" required value="<?=$data->no_hp?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Foto</label>
                <div class="controls">
                  <img src="<?php echo base_url() ?>asset/foto_pasien/<?=$data->foto?>" alt="<?=$data->foto?>" style="width:100px; height:100px;"/>
                  <input type="file" class="span11" name="fotoPasien"/>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success">Update</button>
              </div>
            </form>
            <?php

} ?>
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
