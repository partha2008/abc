<?php
  echo $head;
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
                <h4 class="alert-heading">Success!</h4> <?php echo $this->session->userdata('register_notification');?>  
              </div>
              <?php
                  $this->session->unset_userdata('register_notification');
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
                      <div class="form-group required">
                        <label class="form-control-label" for="sponsor_id">Sponsor ID</label>
                        <input type="text" id="sponsor_id" class="form-control form-control-alternative" placeholder="Sponsor ID" value="" name="sponsor_id" onblur="getSponsor(this.value)">
                      </div>
                    </div> 
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="sponsor_name">Sponsor Name</label>
                        <input type="text"  class="form-control form-control-alternative" placeholder="Sponsor Name" id="sponsor_name" value="" readonly>
                      </div>
                    </div>                    
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
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="first_name">First Name</label>
                        <input type="text" id="first_name" class="form-control form-control-alternative" placeholder="First name" name="first_name" value="<?php if(isset($user_details->first_name) && $user_details->first_name){echo $user_details->first_name;}?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="last_name">Last Name</label>
                        <input type="text" id="last_name" class="form-control form-control-alternative" placeholder="Last name" name="last_name" value="<?php if(isset($user_details->last_name) && $user_details->last_name){echo $user_details->last_name;}?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="mobile_no">Mobile No</label>
                        <input type="text" id="mobile_no" class="form-control form-control-alternative" placeholder="Mobile No" name="mobile_no" value="<?php if(isset($user_details->mobile_no) && $user_details->mobile_no){echo $user_details->mobile_no;}?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="email">Email ID</label>
                        <input type="email" id="email" class="form-control form-control-alternative" placeholder="Email ID" name="email" value="<?php if(isset($user_details->email) && $user_details->email){echo $user_details->email;}?>">
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
                        <input id="address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php if(isset($user_details->address) && $user_details->address){echo $user_details->address;}?>" name="address" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group required">
                        <label class="form-control-label" for="city">City</label>
                        <input type="text" id="city" class="form-control form-control-alternative" placeholder="City" name="city" value="<?php if(isset($user_details->city) && $user_details->city){echo $user_details->city;}?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group required">
                        <label class="form-control-label" for="district">District</label>
                        <input type="text" id="district" class="form-control form-control-alternative" placeholder="District" name="district" value="<?php if(isset($user_details->district) && $user_details->district){echo $user_details->district;}?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group required">
                        <label class="form-control-label" for="post_code">Postal code</label>
                        <input type="text" id="post_code" class="form-control form-control-alternative" name="post_code" placeholder="Postal code" value="<?php if(isset($user_details->post_code) && $user_details->post_code){echo $user_details->post_code;}?>">
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
                <!-- Description -->
                
                <h6 class="heading-small text-muted mb-4">Nominee Information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="nominee_info">Nominee Information</label>
                        <input type="text" id="nominee_info" class="form-control form-control-alternative" placeholder="Nominee Information" name="nominee_info" value="<?php if(isset($user_details->nominee_info) && $user_details->nominee_info){echo $user_details->nominee_info;}?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group required">
                        <label class="form-control-label" for="nominee_relation">Nominee Relation</label>
                        <input type="text" id="nominee_relation" class="form-control form-control-alternative" placeholder="Nominee Relation" name="nominee_relation" value="<?php if(isset($user_details->nominee_relation) && $user_details->nominee_relation){echo $user_details->nominee_relation;}?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="hidden" name="parent_id" id="parent_id" value="">
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