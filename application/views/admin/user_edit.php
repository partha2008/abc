	<?php echo $head; ?>
	
	<div id="wrapper">

		<?php echo $header; ?>

		<div id="page-wrapper" style="min-height: 325px;">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Update User</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">						
					<?php 
						$sess_notify = $this->session->userdata('has_error');
						if(isset($sess_notify) & $sess_notify){
					?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?php echo $this->session->userdata('useredit_notification');?>
					</div>
					<?php }
						$this->session->unset_userdata('has_error');
						$this->session->unset_userdata('useredit_notification');
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="<?php echo base_url('admin/user/edit_user');?>" method="POST" role="form" novalidate>
										<div class="form-group">
											<label class="control-label">Sponsor Id <span style="color:#a94442;">*</span></label>
											<input readonly class="form-control" type="text" name="sponsor_id" placeholder="Enter Sponsor Id" value="<?php if(isset($user_details->sponsor_id) && $user_details->sponsor_id){echo $user_details->sponsor_id;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">First Name <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="first_name" placeholder="Enter First Name" value="<?php if(isset($user_details->first_name) && $user_details->first_name){echo $user_details->first_name;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Last Name <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="last_name" placeholder="Enter Last Name" value="<?php if(isset($user_details->last_name) && $user_details->last_name){echo $user_details->last_name;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Password <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="password" placeholder="Enter Password" value="<?php if(isset($user_details->original_password) && $user_details->original_password){echo $user_details->original_password;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Email Address <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="email" name="email" placeholder="Enter Email" value="<?php if(isset($user_details->email) && $user_details->email){echo $user_details->email;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Mobile No <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="mobile_no" placeholder="Enter Phone" value="<?php if(isset($user_details->mobile_no) && $user_details->mobile_no){echo $user_details->mobile_no;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Address <span style="color:#a94442;">*</span></label>
											<textarea class="form-control" name="address" placeholder="Enter Address"><?php if(isset($user_details->address) && $user_details->address){echo $user_details->address;}?></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="city" placeholder="Enter City" value="<?php if(isset($user_details->city) && $user_details->city){echo $user_details->city;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">District <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="district" placeholder="Enter District" value="<?php if(isset($user_details->district) && $user_details->district){echo $user_details->district;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Post Code <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="post_code" placeholder="Enter Post Code" value="<?php if(isset($user_details->post_code) && $user_details->post_code){echo $user_details->post_code;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">State <span style="color:#a94442;">*</span></label>
											<select id="state_id" name="state_id" class="form-control">
												<?php 
													if(!empty($states)){
														foreach ($states as $value) {
												?>
												<option value="<?php echo $value->state_id;?>" <?php if(isset($user_details) && ($value->state_id == $user_details->state_id)){echo 'selected';}?>><?php echo $value->name;?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label">Nominee Information <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="nominee_info" placeholder="Enter Nominee Information" value="<?php if(isset($user_details->nominee_info) && $user_details->nominee_info){echo $user_details->nominee_info;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Nominee Relation <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="nominee_relation" placeholder="Enter Nominee Relation" value="<?php if(isset($user_details->nominee_relation) && $user_details->nominee_relation){echo $user_details->nominee_relation;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">About Me <span style="color:#a94442;">*</span></label>
											<textarea class="form-control" name="about_me" placeholder="Enter About Me"><?php if(isset($user_details->about_me) && $user_details->about_me){echo $user_details->about_me;}?></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">Status</label>
											<label class="radio-inline">
												<input type="radio" name="status" value="Y" <?php if(isset($user_details->status)){if($user_details->status == "Y"){echo 'checked';}}else{echo 'checked';}?>>Active
											</label>
											<label class="radio-inline">
												<input type="radio" name="status" value="N" <?php if(isset($user_details->status)){if($user_details->status == "N"){echo 'checked';}}?>>Inactive
											</label>
										</div>
										<div class="panel panel-primary">
									      <div class="panel-heading">PNR Details</div>
									      <div class="panel-body">
									      	
									      	<div class="form-inline" action="/action_page.php">
											    <div class="form-group col-sm-4">
											    	<label class="control-label">PNR1: </label>
											    	<input type="email" class="form-control" <?php if($user_details->pnr1){echo 'readonly';}?> placeholder="Enter PNR1"  name="pnr1" value="<?php if(isset($user_details->pnr1) && $user_details->pnr1){echo $user_details->pnr1;}?>">
											    </div>
											    <div class="form-group col-sm-4">
											    	<label class="control-label">PNR2: </label>
											    	<input type="email" class="form-control" <?php if($user_details->pnr2){echo 'readonly';}?> placeholder="Enter PNR2"  name="pnr2" value="<?php if(isset($user_details->pnr2) && $user_details->pnr2){echo $user_details->pnr2;}?>">
											    </div>
											    <div class="form-group col-sm-4">
											    	<label class="control-label">PNR3: </label>
											    	<input type="email" class="form-control" <?php if($user_details->pnr3){echo 'readonly';}?>  placeholder="Enter PNR3"  name="pnr3" value="<?php if(isset($user_details->pnr3) && $user_details->pnr3){echo $user_details->pnr3;}?>">
											    </div>
  											</div>
									      </div>
									    </div>
										<input type="hidden" name="old_email" value="<?php echo $user_details->email;?>">
										<input type="hidden" name="old_mobile_no" value="<?php echo $user_details->mobile_no;?>">
										<input type="hidden" name="user_id" value="<?php echo $user_details->user_id;?>">
										<input type="hidden" name="parent_id" value="<?php echo $user_details->parent_id;?>">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</form>
								</div>
								<!-- /.col-lg-6 (nested) -->									
							</div>
							<!-- /.row (nested) -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.page-wrapper -->
	</div>
	<!-- /#wrapper -->
	
	<?php echo $footer; ?>