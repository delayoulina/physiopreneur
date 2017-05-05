<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Diri Pegawai - Physiopreneur</title>
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
    <h1>Data Diri Pegawai</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <?php foreach ($dataPegawai->result() as $data){ ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Diri <?=$data->nama?></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">NIK</label>
                <div class="controls">
                  <input type="text" class="span11" disabled="" value="<?=$data->nik?>" name="idPasien"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Nama Lengkap" name="namaPasien" required value="<?=$data->nama?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">No Handphone</label>
                <div class="controls">
                  <input type="number" class="span11" placeholder="No Handphone" name="noHP" required value="<?=$data->no_hp?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                  <textarea class="span11" name="alamat" required><?=$data->alamat?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Lokasi</label>
                <div class="controls">
                  <input type="text" class="span11" name="namaLokasi" required value="<?=$data->lokasi?>, <?=$data->kota?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Foto</label>
                <div class="controls">
                  <img src="<?php echo base_url() ?>asset/foto_pegawai/<?=$data->foto?>" alt="<?=$data->foto?>" style="width:100px; height:100px;"/>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php } ?>
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
