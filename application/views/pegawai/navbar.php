<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="<?php echo base_url() ?>index.php/pegawai"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li><a href="<?php echo base_url() ?>index.php/pegawai/viewDataPasien"><i class="icon icon-table"></i> <span>Data Pasien</span></a> </li>
    <li data-toggle="modal" data-target = "#myModal1"><a href="#"><i class="icon icon-money"></i> <span>Pembayaran</span></a> </li>
    <li><a href="<?php echo base_url() ?>index.php/pegawai/viewLaporan"><i class="icon icon-book"></i> <span>Laporan</span></a></li>
  </ul>
</div>

<!-- Modal -->
<div class = "modal fade" id = "myModal1" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Input Kode Pasien
            </h4>
         </div>
		<form action="<?php echo base_url('index.php/pegawai/viewPembayaran') ?>" method="post">
         <div class = "modal-body">
            <center><input type="text" name="kd_pasien" placeholder="Kode Pasien" required autofocus=""/></center>
         </div>

         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
              <button type = "submit" class = "btn btn-primary">
                <i class="icon-search"></i>
                 Search
              </button>
         </div>
		</form>

      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
