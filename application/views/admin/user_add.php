	<?php echo $head; ?>
	
	<div id="wrapper">

		<?php echo $header; ?>

		<div id="page-wrapper" style="min-height: 325px;">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Add User</h1>
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
							<?php echo $this->session->userdata('useradd_notification');?>
						</div>
					<?php } 
					$this->session->unset_userdata('has_error');
					$this->session->unset_userdata('useradd_notification');
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="<?php echo base_url('admin/user/add_user');?>" method="POST" role="form" novalidate>
										<div class="form-group">
											<label class="control-label">Sponsor Name <span style="color:#a94442;">*</span></label>
											<select name="parent_id" class="form-control">
												<option value="">Select Sponsor Name</option>
												<?php 
													if(!empty($sponsors)){
														foreach ($sponsors as $value) {
												?>
												<option value="<?php echo $value->parent_id;?>" <?php if(isset($user_details) && ($value->parent_id == $user_details->parent_id)){echo 'selected';}?>><?php echo $value->sponsor_id;?></option>
												<?php
														}
													}
												?>
											</select>
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
											<input class="form-control" type="password" name="password" placeholder="Enter Password" value="">
										</div>
										<div class="form-group">
											<label class="control-label">Email Address <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="email" name="email" placeholder="Enter Email" value="<?php if(isset($user_details->email) && $user_details->email){echo $user_details->email;}?>">
										</div>
										<div class="form-group">
											<label class="control-label">Mobile No <span style="color:#a94442;">*</span></label>
											<input class="form-control" type="text" name="mobile_no" placeholder="Enter Mobile No" value="<?php if(isset($user_details->mobile_no) && $user_details->mobile_no){echo $user_details->mobile_no;}?>">
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
												<input type="radio" name="status" value="Y" <?php if(isset($user_details->status)){if($user_details->status == "Y"){echo 'checked';}}?>>Active
											</label>
											<label class="radio-inline">
												<input type="radio" name="status" value="N" <?php if(isset($user_details->status)){if($user_details->status == "N"){echo 'checked';}}else{echo 'checked';}?>>Inactive
											</label>
										</div>
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