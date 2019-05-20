    <?php echo $head;?>     
    <?php echo $header;?>     
    <!-- Page content -->
    <div class="login-block">
    	<div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <h1 class="text-muted">Password Recovery</h1>
              <?php
                $msg = $this->session->userdata('has_error');
                if($msg && isset($msg)){
              ?>
              <div class="alert alert-danger alert-dismissible fade show">   
                <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('forget_notification');?>  
              </div>
              <?php
                }

                if(!$msg && isset($msg)){
              ?>  
              <div class="alert alert-success alert-dismissible fade show">   
                <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('forget_notification');?>  
              </div>
              <?php
                  }
                  $this->session->unset_userdata('forget_notification');
                  $this->session->unset_userdata('has_error');
              ?>            
              <form role="form" action="<?php echo base_url('home/process_forget_password');?>" method="post" novalidate>
                <div class="form-group mb-3">
                  <label class="field-titel" for="email">Email ID</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email ID" type="text" id="email" name="email" value="<?php if(isset($user_details->email)){echo $user_details->email;}?>">
                  </div>
                </div>  
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Send</button>
                </div>
              </form>
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