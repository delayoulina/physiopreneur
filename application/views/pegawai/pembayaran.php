<!DOCTYPE html>
<html lang="en">
<head>
<title>Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

  <?php
  	if(!$this->session->userdata('username') && $this->session->userdata('status') == 0){
  		redirect(base_url());
  	}
  ?>
  <!--Header-part-->
  <?php include 'header.php';?>

  <?php include 'navbar.php';?>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
  <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"></div>
      <h1>Pembayaran</h1>
    </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span2"></div>

      <div class="span5">
          <label class="control-label">Tanggal:&nbsp; <?php echo date('d/m/Y'); ?></label>
      </div>
      <?php
      foreach ($dataPegawai->result() as $row){
         ?>
      <div class="span3">
            <label class="control-label">Physioterapist:&nbsp; <?= $row->nama ?></label>
      </div>
      <?php } ?>
      <div class="span11">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Formulir Pembayaran</h5>
          </div>

          <div class="widget-content nopadding">
            <form action="<?php echo base_url('index.php/Pegawai/actionTambahPembayaran') ?>" method="post" class="form-horizontal">
			<?php
				if($dataPasien != null){
				foreach ($dataPasien->result() as $row){
			?>
              <div class="control-group">
                <label class="control-label">Kode Pasien</label>
                <div class="controls">
                  <input type="text" class="span5" value="<?= $row->kode_pasien ?>" name="kd_pasien" readonly />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama Pasien</label>
                <div class="controls">
                  <input type="text" class="span8" value="<?= $row->nama_pasien ?>" name="nama_pasien" readonly />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Untuk Pembayaran</label>
                <div class="controls">
                  <input type="text" class="span8" name="ket_pembayaran" value="<?= $row->diagnosa ?>" />
                </div>
              </div>              
			  <?php
				if($row->free_pass == 0){
					foreach ($dataTarif->result() as $row){
						$jumlahTarif = $row->tarif;
					}
			  ?>
			  <div class="control-group">
                <label class="control-label">Jenis Pembayaran :</label>
                <div id="combox" class="controls" >
                  <select required class="span2" name="jenis_pembayaran" id="jenis_pembayaran">
                    <option value="1">Single Visit</option>
                    <option value="2">5 Cares</option>
                    <option value="3">10 Cares</option>
                  </select>
				  <input type="hidden" name="totalAwal" id="totalAwal" value="<?= $jumlahTarif ?>"/>
                </div>
              </div>
				<?php }else{
					$jumlahTarif = 0;
					?>
				<div class="control-group">
                <label class="control-label">Jenis Pembayaran :</label>
                <div class="controls">
                  <select class="span2" name="jenis_pembayaran" readonly>
                    <option value="4">Free</option>
                  </select>
				  <input type="hidden" name="totalAwal" id="totalAwal" value="<?= $jumlahTarif ?>"/>
                </div>
              </div>
				<?php }	
					$jmlRegio = 0;
				?>				
              <div class="control-group">
                <label class="control-label"> + Regio :</label>
                <div class="controls" id="inputRegio">
                  <input type="number" min="0" class="span1" value="<?= $jmlRegio ?>" name="regio" id="regio"/>
				  <input type="hidden" name="totalRegio" id="totalRegio"/>
                </div>
              </div>			  
              <div class="control-group">
                <label class="control-label">Total Pembayaran :</label>
                <div class="controls">
                  <input type="number" class="span8" value="<?= $jumlahTarif ?>" name="total_bayar" id="total_bayar"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Metode Pembayaran :</label>
                <div class="controls">
                  <select class="span2" name="metode_pembayaran">
                    <option value="1">Cash</option>
                    <option value="2">Debet</option>
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success">Checkout</button>
              </div>
				<?php  }}else{
					redirect('index.php/pegawai');
				} ?>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!--Chart-box-->

<!--End-Chart-box-->


<!--end-main-container-part-->

<!--Footer-part-->
<!-- jquery core -->
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
    $('#combox select').change(function () {
        var selProv = $(this).val();
        console.log(selProv);  //menampilan pada log browser apa yang dibawa pada saat dipilih pada combo box
        $.ajax({
            url: "<?php echo base_url('index.php/Pegawai/getTarif') ?>",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "jenis_pembayaran="+selProv,   //data yang akan dibawa di url
            dataType: "html",
            success: function(data) {
				document.getElementById('totalAwal').value = data;
				document.getElementById('total_bayar').value = data;
                //$('#total_bayar').html(data);   //hasil ditampilkan pada combobox id=kota
            }
        })
    });
	$('#inputRegio input').change(function (){
		var jml = $(this).val();		
		var total = jml * 25000;		
		document.getElementById('totalRegio').value = parseInt(total);
		var totalAwal = parseInt(document.getElementById('totalAwal').value);
		var totalAkhir = totalAwal + total;
		document.getElementById('total_bayar').value = parseInt(totalAkhir);
	});
 });
</script>


<!--end-Footer-part-->
</body>
</html>
