<div class="col-xl-12 order-xl-1">
  <div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Change Password</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php
        $msg = $this->session->userdata('has_error');
        if(!$msg && isset($msg)){
      ?>
      <div class="alert alert-success alert-dismissible fade show">   
        <h4 class="alert-heading">Success!</h4> <?php echo $this->session->userdata('password_notification');?>  
      </div>
      <?php
          $this->session->unset_userdata('password_notification');
          $this->session->unset_userdata('has_error');
        }
      ?>
      <?php
        if($msg && isset($msg)){
      ?>
      <div class="alert alert-danger alert-dismissible fade show">   
        <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('password_notification');?>  
      </div>
      <?php
          $this->session->unset_userdata('password_notification');
          $this->session->unset_userdata('has_error');
        }
      ?>
      <form action="<?php echo base_url('home/update_password');?>" method="post">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-alternative" placeholder="Password" name="password" value="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control form-control-alternative" placeholder="Confirm Password" name="confirm_password" value="">
              </div>
            </div>
          </div>
        </div>
        <div class="pl-lg-4">                  
          <div class="row">
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Update</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>