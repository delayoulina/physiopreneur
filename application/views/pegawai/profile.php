<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile Pegawai - Physiopreneur</title>
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
    <h1>My Profile</h1>
  </div>
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <?php foreach ($profilePegawai->result() as $data){ ?>
        <form action="<?php echo base_url('index.php/pegawai/actionUpdateProfile') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Informasi Akun</h5>
          </div>
          <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" placeholder="Username" name="username" required value="<?=$data->username?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="pwd" value="<?=$data->password?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Confirm password</label>
                <div class="controls">
                  <input type="password" name="confirm_password" id="pwd2" value="<?=$data->password?>"/>
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
                  <input type="text" readonly name="nik" value="<?=$data->nik?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input type="text" class="span8" placeholder="Nama Lengkap" name="namaPegawai" required value="<?=$data->nama?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Nomor HP</label>
                <div class="controls">
                  <input type="phone" name="noHP" required value="<?=$data->no_hp?>"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                  <textarea class="span8" name="alamat" required><?=$data->alamat?></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Lokasi</label>
                <div class="controls">
                  <select name="idLokasi" required>
                    <option value="#">---Pilih---</option>
                    <?php foreach ($lokasiAll->result() as $loc){ ?>
                      <?php if ($loc->id == $data->id_lokasi) {?>
                        <option value="<?=$loc->id?>" selected=""><?=$loc->lokasi?></option>
                      <?php
                          }else {
                      echo "<option value='$loc->id'>$loc->lokasi</option>";
                          }
                      } ?>
                 </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Foto</label>
                <div class="controls">
					<img src="<?php echo base_url() ?>asset/foto_pegawai/<?=$data->foto?>" alt="<?=$data->foto?>" style="width:100px; height:100px;"/>
					<br>
                  <input type="file" name="fotoPegawai"/>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success">Simpan</button>
              </div>

          </div>
        </div>
        </form>
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
