<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
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
    }
  ?>
</head>

<body class="bg-default home">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
      
        <div class="hometop-header">
            <div class="logo">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url($general_settings->logopathname.'?v='.time()); ?>" alt="Logo">
                </a>
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
              <!-- Collapse header -->
              <div class="navbar-collapse-header d-md-none">
                <div class="row">
                  <div class="col-6 collapse-brand">
                    <a href="index.html">
                      <img src="<?php echo base_url(); ?>resources/images/blue.png">
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Navbar items -->
              <ul class="navbar-nav ml-auto">
                <?php
                  if($this->session->userdata('user_id')){
                ?>
                  <li class="nav-item register">
                  <a class="nav-link nav-link-icon" href="<?php echo base_url('home/logout');?>">
                    <i class="ni ni-button-power"></i>
                    <span class="nav-link-inner--text">Logout</span>
                  </a>
                </li>
                <?php
                  }else{
                ?>
                <li class="nav-item register <?php echo ($tot_segments[1] == 'register') ? 'active' : '';?>">
                  <a class="nav-link nav-link-icon" href="<?php echo base_url('register');?>">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                  </a>
                </li>
                <li class="nav-item login <?php echo ($tot_segments[1] == 'login') ? 'active' : '';?>">
                  <a class="nav-link nav-link-icon" href="<?php echo base_url('login');?>">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">Login</span>
                  </a>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
        </div>
        
        
        
      </div>
    </nav>
    <!-- header-animation -->
  <div class="header-animation">
      <div class="container">
          <div class="welcome-animation">              
                <marquee width="1000PX"> 
                  <div class="ourtitlestext"><?php echo $general_settings->notification;?></div> 
                </marquee>            
            </div>
        </div>
    </div> 