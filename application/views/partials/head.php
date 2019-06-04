<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $general_settings->sitename;?>">
  <meta name="author" content="<?php echo $general_settings->sitename;?>">
  <title><?php echo $general_settings->sitename;?></title>
  <!-- Favicon -->
  <link href="<?php echo base_url(); ?>resources/images/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/nucleo.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/all.min.css" />
  <!-- global.css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/global.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/main.css" />

  <script>
    var BASEPATH = '<?php echo base_url();?>';
    var PAGENAME = '<?php echo $tot_segments[1];?>';
    var VIEW = '<?php echo isset($tot_segments[3]) ? $tot_segments[3] : $tot_segments[2];?>';
  </script>

  <script src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/js/bootstrap.bundle.min.js"></script>
  <!-- coustome.js -->
  <script src="<?php echo base_url(); ?>resources/js/custom.js"></script>
  <?php
    if($tot_segments[1] == 'register'){
  ?>
  <script src="<?php echo base_url(); ?>resources/js/main.js"></script>  
  <?php
    }elseif($tot_segments[1] == 'login'){
  ?>
  <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
  <?php
    }
  ?>
</head>