    <?php echo $head;?>     
    <?php echo $header;?>     
    <!-- Page content -->
    <div class="login-block">
    	<div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <?php
                $msg = $this->session->userdata('has_error');
                if($msg && isset($msg)){
              ?>
              <div class="alert alert-danger alert-dismissible fade show">   
                <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('login_notification');?>  
              </div>
              <?php
                  $this->session->unset_userdata('login_notification');
                  $this->session->unset_userdata('has_error');
                }
              ?>
              <form role="form" action="<?php echo base_url('home/process_login');?>" method="post" novalidate>
                <div class="form-group mb-3">
                  <label class="field-titel" for="user_id">User Id</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="User Id" type="text" id="user_id" name="user_id">
                  </div>
                </div>                
                <div class="form-group">
                  <label class="field-titel" for="password">Password</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" id="password" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <!--<div class="form-group">
                  <label class="field-titel">Captcha Code</label>
                  <div class="captcha-code_image">
               	  	<img src="assets/img/captcha-code_image.png"  alt=""> 
                  </div>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-curved-next"></i></span>
                    </div>
                    <input class="form-control" placeholder="Captcha Code" type="Captcha Code">
                  </div>
                </div>-->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="<?php echo base_url('forget-password');?>" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="<?php echo base_url('register');?>" class="register.html"><small>Create new account</small></a>
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