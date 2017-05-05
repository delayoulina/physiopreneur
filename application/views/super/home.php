<!DOCTYPE html>
<html lang="en">
<head>
<title>Physiopreneur</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/matrix-media.css" />
<link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<body>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
	       <div id="search"></div>
        <li class="bg_lb"> <a href="<?php echo base_url('index.php/SuperAdmin/tambahManager') ?>"> <i class="icon-plus"></i>Tambah Manager</a> </li>
        <li class="bg_lg" data-toggle = "modal" data-target = "#myModal"> <a href="#"> <i class="icon-search"></i> Cari Manager</a> </li>
      </ul>
    </div>
<!--End-Action boxes-->

<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Input NIK Manager
            </h4>
         </div>
		<form action="<?php echo base_url('index.php/SuperAdmin/viewManagerById') ?>" method="post">
         <div class = "modal-body">
            <center><input type="text" name="nik" placeholder="NIK" required /></center>
         </div>

         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
              <button type = "submit" class = "btn btn-primary">
                <i class="icon-search"></i>
                 Search
              </button>
            </a>
         </div>
		 </form>

      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

<!--Chart-box-->



      </div>
    </div>
  </div>
</div>
<!--Chart-box-->

<!--End-Chart-box-->


<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url()?>js/matrix.js"></script>
<script src="<?php echo base_url()?>js/matrix.interface.js"></script>
<script src="<?php echo base_url()?>js/matrix.popover.js"></script>
</body>
</html>
