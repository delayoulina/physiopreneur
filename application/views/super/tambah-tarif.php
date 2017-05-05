<!DOCTYPE html>
<html lang="en">
<head>
<title>Tambah Tarif - Physiopreneur</title>
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
    <h1>Tambah Tarif</h1>
  </div>
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <form action="<?php echo base_url('index.php/SuperAdmin/actionTambahTarif') ?>" method="post" class="form-horizontal">
        <hr>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Tambah Tarif</h5>
          </div>
          <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Lokasi</label>
                <div class="controls">
                  <select name="idLokasi" required>
                    <option value="#">---Pilih---</option>
                    <?php foreach ($lokasiAll->result() as $loc){ ?>
                        <option value="<?=$loc->id?>"><?=$loc->lokasi?></option>
                      <?php
                      } ?>
                 </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Jenis Pembayaran</label>
                    <div class="controls">
                      <select name="idJenisPembayaran" required>
                        <option value="#">---Pilih---</option>
                        <?php foreach ($pembayaranAll->result() as $loc){ ?>
                          <option value="<?=$loc->id?>"><?=$loc->jenis_pembayaran?></option>
                        <?php
                          } ?>
                       </select>
                    </div>
              </div>

              <div class="control-group">
                <label class="control-label">Tarif</label>
                <div class="controls">
                  <input type="number" name="number" id="number" required />
                </div>
              </div>

              <div class="form-actions">
                <button class="btn btn-success">Simpan</button>
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
</body>
</html>
