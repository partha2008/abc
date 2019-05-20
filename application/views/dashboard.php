<?php
  echo $head;
?>
<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="<?php echo base_url();?>">
          <img src="<?php echo base_url($general_settings->logopathname.'?v='.time()); ?>" class="navbar-brand-img" alt="Logo">
      </a>
      <!-- User -->
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">
              <i class="ni ni-tv-2 text-primary"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('myaccount');?>">
              <i class="ni ni-single-02 text-yellow"></i> Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle " href="JavaScript:Void(0);" id="teamdetails" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-badge text-orange"></i> Team Details
            </a>
            <div class="dropdown-menu" aria-labelledby="teamdetails">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="ni ni-bold-right"></i>Direct List</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="ni ni-bold-right"></i>Member Tree</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="ni ni-bold-right"></i>Team Level</a>
                </div>
          
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle " href="JavaScript:Void(0);" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-email-83 text-blue"></i> Message
            </a>
            <div class="dropdown-menu" aria-labelledby="message">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="ni ni-bold-right"></i>Message</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="ni ni-bold-right"></i>Message List</a>
                </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);">
              <i class="ni ni-money-coins text-info"></i> My Income
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('logout');?>">
              <i class="ni ni-button-power text-red"></i> Logout
            </a>
          </li>
          
        </ul>
      
        
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo base_url('dashboard');?>">Dashboard</a>
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="javascript:void(0);?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $user_details->first_name.' '.$user_details->last_name;?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url('myaccount');?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('logout');?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-8 pt-lg-6 d-flex align-items-center" style="min-height: 200px; background-image: url(resources/images/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">Hello, <?php echo $user_details->first_name;?> </h1>
            <p></p>
          </div>
        </div>
      </div>

    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <img src="<?php echo base_url('resources/images/user.jpg');?>" class="rounded-circle">
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 mt-md-8">              
              <div class="text-center">
                <h3 class="name">
                  <strong>Name:</strong> <?php echo $user_details->first_name.' '.$user_details->last_name;?>
                </h3>
                 <h3 class="sponsorid">
                  <strong>Sponsor ID:</strong> <?php echo $user_details->sponsor_id;?>
                </h3>
                 <h4 class="name">
                  <strong>Last Login:</strong> <?php echo date('d-m-Y H:i:s', $user_details->last_login);?>
                </h4>                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card bg-secondary shadow">
           
           <div class="container-fluid">
        <div class="dashboard-block">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <a href="<?php echo base_url('myaccount');?>"><div class="card card-stats mb-4 mb-xl-4 Profile-image">
                <div class="card-body">
                  	<div class="dashboard-box">
                    	<div class="icon">
                          <i class="ni ni-single-02"></i>
                        </div>
                        <span>Profile</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            
            <div class="col-xl-6 col-lg-6">
              <a href="javascript:void(0);"><div class="card card-stats mb-4 mb-xl-4 Profile-image">
                <div class="card-body">
                  	<div class="dashboard-box">
                    	<div class="icon">
                          <i class="ni ni-bullet-list-67"></i>
                        </div>
                        <span>Team</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            
            <div class="col-xl-6 col-lg-6">
              <a href="javascript:void(0);"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                  	<div class="dashboard-box">
                    	<div class="icon">
                          <i class="ni ni-email-83"></i>
                        </div>
                        <span>Message</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            
            <div class="col-xl-6 col-lg-6">
              <a href="javascript:void(0);"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                  	<div class="dashboard-box">
                    	<div class="icon">
                          <i class="ni ni-money-coins"></i>
                        </div>
                        <span>Income</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            
            
          </div>
        </div>
      </div>
            
          </div>
        </div>
      </div>
      <?php
        echo $footer;
      ?>