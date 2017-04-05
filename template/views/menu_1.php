<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.html">
						<img src="<?php echo base_url();?>assets/img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				
					
				
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
				
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge"><?php echo Modules::run('chat/notify'); ?></span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> Messages</span>
								<span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>
							</li>
						
						
							<?php echo Modules::run('chat/index'); ?>
                                                        
                                                        
                                                        
                                                        
							<li class="footer">
								<a href="#">See all messages <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
				
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="username"><?php echo $this->session->userdata('email'); ?> </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
							<li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
                                                        <li><a href="<?php echo base_url() ?>auth/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		
	</header>
	<!--/HEADER -->
        
        
        <!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li <?php if($this->uri->segment(1)=== 'dashboard'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>					
							</li>
                                                        
                                                     <li <?php if($this->uri->segment(1)=== 'company'){ echo 'class="active"'; }  ?>><a class="" href="<?php echo base_url();?>company" ><i class="fa fa-building-o fa-fw"></i> <span class="menu-text">Customers</span></a></li>
							
							
                                                        <li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-table fa-fw"></i> <span class="menu-text">Quotes</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url();?>quotes"><span class="sub-menu-text">View Quotes</span></a></li>
									<li><a class="" href="<?php echo base_url();?>quotes/new"><span class="sub-menu-text">Add New Quote</span></a></li>
									<li><a class="" href="<?php echo base_url();?>quotes/reports"><span class="sub-menu-text">Quote reports</span></a></li>
								</ul>
							</li>
                                                        
							 <li <?php if($this->uri->segment(1)=== 'warehouse'){ echo 'class="active"'; }  ?>><a class="" href="<?php echo base_url();?>warehouse" ><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Warehouse</span></a></li>
							
							 <li <?php if($this->uri->segment(1)=== 'salesorders'){ echo 'class="active"'; }  ?>class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-pencil-square-o fa-fw"></i> <span class="menu-text">Sales Orders</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url();?>salesorders"><span class="sub-menu-text">View Sales Orders</span></a></li>
									<li><a class="" ><span class="sub-menu-text">Add New Orders</span></a></li>
									<li><a class="" href="<?php echo base_url();?>salesorders/reports"><span class="sub-menu-text">Sales Order Reports</span></a></li>
									
								</ul>
							</li>
                                                        
                                                        <li <?php if($this->uri->segment(1)=== 'invoices'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>invoices" class="">
								<i class="fa fa-gbp fa-fw"></i>  <span class="menu-text">Invoices</span></li>
                                                </a>
                                                        
                                                        
							 <li <?php if($this->uri->segment(1)=== 'purchaseorders'){ echo 'class="active"'; }  ?>><a class="" href="<?php echo base_url();?>salesorders/reports"><i class="fa fa-th-large fa-fw"></i> <span class="menu-text">Purchase orders</span></a></li>
							<li <?php if($this->uri->segment(1)=== 'reports'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>reports" class="">
								<i class="fa fa-bar-chart-o fa-fw"></i>  <span class="menu-text">Reports</span></li>
                                                </a>
							
							
							
							
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
        </section><!-- Modal -->
        <!-- Modal -->
<div class="modal fade" id="myMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->