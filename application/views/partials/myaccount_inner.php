<div class="col-xl-12 order-xl-1">
  <div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">My account</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php
        $msg = $this->session->userdata('has_error');
        if(!$msg && isset($msg)){
      ?>
      <div class="alert alert-success alert-dismissible fade show">   
        <h4 class="alert-heading">Success!</h4> <?php echo $this->session->userdata('myaccount_notification');?>  
      </div>
      <?php
          $this->session->unset_userdata('myaccount_notification');
          $this->session->unset_userdata('has_error');
        }
      ?>
      <?php
        if($msg && isset($msg)){
      ?>
      <div class="alert alert-danger alert-dismissible fade show">   
        <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('myaccount_notification');?>  
      </div>
      <?php
          $this->session->unset_userdata('myaccount_notification');
          $this->session->unset_userdata('has_error');
        }
      ?>
      <form action="<?php echo base_url('home/update_account');?>" method="post">
        <h6 class="heading-small text-muted mb-4">User information</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="user_id">User ID</label>
                <input type="text" id="user_id" class="form-control form-control-alternative" placeholder="User ID" name="sponsor_id" value="<?php echo $user_details->sponsor_id;?>" readonly>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="email">Email ID</label>
                <input type="email" id="email" class="form-control form-control-alternative" placeholder="Email ID" name="email" value="<?php echo $user_details->email;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group required">
                <label class="form-control-label" for="first_name">First Name</label>
                <input type="text" id="first_name" class="form-control form-control-alternative" placeholder="First Name" name="first_name" value="<?php echo $user_details->first_name;?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group required">
                <label class="form-control-label" for="last_name">Last Name</label>
                <input type="text" id="last_name" class="form-control form-control-alternative" placeholder="Last Name" name="last_name" value="<?php echo $user_details->last_name;?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group required">
                <label class="form-control-label" for="mobile_no">Mobile No</label>
                <input type="text" id="mobile_no" class="form-control form-control-alternative" placeholder="Mobile No" name="mobile_no" value="<?php echo $user_details->mobile_no;?>">
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Address -->
        <h6 class="heading-small text-muted mb-4">Contact information</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group required">
                <label class="form-control-label" for="address">Address</label>
                <input id="address" name="address" class="form-control form-control-alternative" placeholder="Address" value="<?php echo $user_details->address;?>" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group required">
                <label class="form-control-label" for="city">City</label>
                <input type="text" name="city" id="city" class="form-control form-control-alternative" placeholder="City" value="<?php echo $user_details->city;?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group required">
                <label class="form-control-label" for="district">District</label>
                <input type="text" name="district" id="district" class="form-control form-control-alternative" placeholder="Country" value="<?php echo $user_details->district;?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group required">
                <label class="form-control-label" for="post_code">Postal Code</label>
                <input type="number" name="post_code" id="post_code" class="form-control form-control-alternative" placeholder="Postal code" value="<?php echo $user_details->post_code;?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group required">
                <label class="form-control-label" for="state_id">State</label>
                <select class="form-control" name="state_id" id="state_id">
                  <option value="">State</option>
                  <?php
                    if(!empty($state)){
                      foreach ($state as $key => $value) {
                  ?>
                    <option value="<?php echo $value->state_id;?>" <?php if(isset($user_details) && ($value->state_id == $user_details->state_id)){echo 'selected';}?>><?php echo $value->name;?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Address -->
        <h6 class="heading-small text-muted mb-4">Nominee information</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="nominee_info">Nominee Information</label>
                <input type="text" id="nominee_info" class="form-control form-control-alternative" placeholder="Nominee Information" name="nominee_info" value="<?php echo $user_details->nominee_info;?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group required">
                <label class="form-control-label" for="nominee_relation">Nominee Relation</label>
                <input type="text" id="nominee_relation" class="form-control form-control-alternative" placeholder="Nominee Relation" name="nominee_relation" value="<?php echo $user_details->nominee_relation;?>">
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Description -->
        <h6 class="heading-small text-muted mb-4">About me</h6>
        <div class="pl-lg-4">
          <div class="form-group required">
            <label class="form-control-label" for="about_me">About Me</label>
            <textarea id="about_me" rows="4" class="form-control form-control-alternative" placeholder="About me" name="about_me"><?php echo $user_details->about_me;?></textarea>
          </div>
        </div>
        <div class="pl-lg-4">                  
          <div class="row">
            <div class="text-center">
              <input type="hidden" name="old_email" value="<?php echo $user_details->email;?>">
              <input type="hidden" name="old_mobile_no" value="<?php echo $user_details->mobile_no;?>">
              <button type="submit" class="btn btn-primary my-4">Update</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>