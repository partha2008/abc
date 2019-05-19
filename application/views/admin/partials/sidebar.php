	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">					
				<li>
					<a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-users fa-fw"></i> User Management<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="<?php echo base_url('admin/user-list');?>"><i class="fa fa-th-list fa-fw"></i> User List</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/user-add');?>"><i class="fa fa-plus fa-fw"></i> Add User</a>
						</li>
					</ul>
				</li>				
				<li>
					<a href="#"><i class="fa fa-th fa-fw"></i> Content Management<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="<?php echo base_url('admin/term');?>"><i class="fa fa-hand-o-right fa-fw"></i> Terms & Conditions</a>
							<a href="<?php echo base_url('admin/privacy');?>"><i class="fa fa-hand-o-right fa-fw"></i> Privacy & Policy</a>
							<a href="<?php echo base_url('admin/return');?>"><i class="fa fa-hand-o-right fa-fw"></i> Cancellation & Returns</a>
							<a href="<?php echo base_url('admin/shipping');?>"><i class="fa fa-hand-o-right fa-fw"></i> Shipping Policy</a>
							<a href="<?php echo base_url('admin/about');?>"><i class="fa fa-hand-o-right fa-fw"></i> About Us</a>
							<a href="<?php echo base_url('admin/feedback');?>"><i class="fa fa-hand-o-right fa-fw"></i> Feedback</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->