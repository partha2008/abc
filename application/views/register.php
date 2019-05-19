<?php
  echo $header;
?>  
    
    
    <!-- Page content -->
    <div class="register-block">
    	<div class="container">
      			
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Register Form</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <?php
                $msg = $this->session->userdata('has_error');
                if(!$msg && isset($msg)){
              ?>
              <div class="alert alert-success alert-dismissible fade show">   
                <h4 class="alert-heading">Success!</h4> Thank you for registering with us.  
              </div>
              <?php
                $this->session->unset_userdata('has_error');
                }
              ?>
              <?php
                if($msg && isset($msg)){
              ?>
              <div class="alert alert-danger alert-dismissible fade show">   
                <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('register_notification');?>  
              </div>
              <?php
                  $this->session->unset_userdata('register_notification');
                  $this->session->unset_userdata('has_error');
                }
              ?>
              <form action="<?php echo base_url('home/process_register');?>" method="post" novalidate>
                <div class="pl-lg-4">
                  <div class="row">                  
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Sponsor ID</label>
                        <input type="text"  class="form-control form-control-alternative" placeholder="Sponsor ID" value="" name="sponsor_id" onblur="getSponsor(this.value)">
                      </div>
                    </div> 
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Sponsor Name</label>
                        <input type="text"  class="form-control form-control-alternative" placeholder="Sponsor Name" id="sponsor_name" value="" readonly>
                      </div>
                    </div>                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Password</label>
                        <input type="password"  class="form-control form-control-alternative" placeholder="Password" name="password" value="">
                      </div>
                    </div>                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Confirm Password</label>
                        <input type="password"  class="form-control form-control-alternative" placeholder="Confirm Password" name="confirm_password" value="">
                      </div>
                    </div>     
                  </div>                  
                </div>                
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" name="first_name" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last Name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" name="last_name" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mobile No</label>
                        <input type="number" id="input-first-name" class="form-control form-control-alternative" placeholder="Mobile No" name="mobile_no" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Email ID</label>
                        <input type="email" id="input-last-name" class="form-control form-control-alternative" placeholder="Email ID" name="email" value="">
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
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="" name="address" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" name="city" value="">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="District" name="district" value="">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" name="post_code" placeholder="Postal code">
                      </div>
                    </div>                    
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">State</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" name="state_id" placeholder="State">
                      </div>
                    </div>                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                
                <h6 class="heading-small text-muted mb-4">Nominee Information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nominee Information</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Nominee Information" name="nominee_info" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Nominee Relation</label>
                        <input type="text"  class="form-control form-control-alternative" placeholder="Nominee Relation" name="nominee_relation" value="">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary my-4">Submit</button>
                    </div> 
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      
      
    </div>
    </div>
    
    
    
  </div>
  <?php
    echo $footer;
  ?>