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
                  <strong>User ID:</strong> <?php echo $user_details->sponsor_id;?>
                </h3>
                 <h4 class="name">
                  <strong>Approved On:</strong> <?php echo date('d-m-Y H:i:s', $user_details->approved_on);?>
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
              <a href="<?php echo base_url('member-tree');?>"><div class="card card-stats mb-4 mb-xl-4 Profile-image">
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
              <a href="<?php echo base_url('message');?>"><div class="card card-stats mb-4 mb-xl-4 Profile-image">
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
              <a href="<?php echo base_url('my-income');?>"><div class="card card-stats mb-4 mb-xl-4 Profile-image">
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

            <div class="col-xl-3 col-lg-3">
              <a href="<?php echo base_url('member/create_form/Form-1');?>"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                    <div class="dashboard-box">
                      <div class="icon">
                          <i class="ni ni-cloud-download-95"></i>
                        </div>
                        <span>Form1</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            <div class="col-xl-3 col-lg-3">
              <a href="<?php echo base_url('member/create_form/Form-2');?>"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                    <div class="dashboard-box">
                      <div class="icon">
                          <i class="ni ni-cloud-download-95"></i>
                        </div>
                        <span>Form2</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            <div class="col-xl-3 col-lg-3">
              <a href="<?php echo base_url('member/create_form/Form-3');?>"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                    <div class="dashboard-box">
                      <div class="icon">
                          <i class="ni ni-cloud-download-95"></i>
                        </div>
                        <span>Form3</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            <div class="col-xl-3 col-lg-3">
              <a href="<?php echo base_url('member/create_form/Form-4');?>"><div class="card card-stats mb-4 mb-xl-0 Profile-image">
                <div class="card-body">
                    <div class="dashboard-box">
                      <div class="icon">
                          <i class="ni ni-cloud-download-95"></i>
                        </div>
                        <span>Form4</span>
                    </div>
                  
                </div>
              </div></a>
            </div>
            
            
          </div>
        </div>
      </div>
            
          </div>
        </div>