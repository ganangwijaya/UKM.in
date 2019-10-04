<!DOCTYPE html>
<html lang="en">
<head>
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <title><?php echo $judul; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>
    <body data-spy="scroll" data-offset="0" >
	<!--	NAVIGATION	-->
  	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container" style="display:block">
            <a class="navbar-brand" href="<?php echo base_url() ?>main/">UKM.in</a>
            <div class="pencet">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
            </div>
            <div class="navbar-header">
                <a href="<?php echo base_url() ?>main/" class="navbar-list">Tentang</a>
                <?php 
                if($this->session->userdata('logged_in')){ ?>
                    <a href="<?php echo base_url() ?>main/logout" class="navbar-list">Logout</a>
                    <a href="<?php echo base_url() ?>main/profile" class="navbar-list">Profile</a>
                <?php }
                else { ?>
                    <a href="<?php echo base_url() ?>main/pilihjurusan" class="navbar-list">Daftar</a>
                    <a href="<?php echo base_url() ?>main/login" class="navbar-list">Masuk</a>
                <?php } ?>
          	</div>
   		</div>
     </nav>
     
     

	<?php $this->load->view($isi);?>

    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>