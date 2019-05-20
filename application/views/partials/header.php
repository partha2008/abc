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
                  <li class="nav-item register <?php echo ($tot_segments[1] == 'register') ? 'active' : '';?>">
                    <a class="nav-link nav-link-icon" href="<?php echo base_url('dashboard');?>">
                      <i class="ni ni-single-copy-04"></i>
                      <span class="nav-link-inner--text">Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-item register">
                  <a class="nav-link nav-link-icon" href="<?php echo base_url('logout');?>">
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