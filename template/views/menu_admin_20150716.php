
<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="<?php echo base_url();?>dashboard">
						<img src="<?php echo base_url();?>assets/images/logo-pdf.jpg" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
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
				</div>
				<!-- NAVBAR LEFT -->
				
					
				
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
				
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN from viola-->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">3 / <?php echo Modules::run('chat/notify'); ?></span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> 3 Messages</span>
								<span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar2.jpg" alt="" />
									<span class="body">
										<span class="from">Jane Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>Just Now</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar1.jpg" alt="" />
									<span class="body">
										<span class="from">Vince Pelt</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>15 min ago</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar8.jpg" alt="" />
									<span class="body">
										<span class="from">Debby Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hours ago</span>
										</span>
									</span>
									 
								</a>
							</li>
						    <?php echo Modules::run('chat/index'); ?>
							<li class="footer">
								<a href="#">See all messages <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					
					<!-- BEGIN INBOX DROPDOWN from viola-->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge"><?php echo Modules::run('chat/notify_new'); ?></span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> <?php echo Modules::run('chat/notify_new'); ?> New Messages</span>
								<!---
								<a  href="<?php echo base_url();?>chat/compose" target="_blank"><span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span></a>
							--->
						
							</li><li class=" center " >
					            <span class="body ">
										<i class="fa fa-pencil-square-o"></i><span class="from ">Inbox</span></br>
										<span class="message ">
										You have <?php echo Modules::run('chat/notify_total'); ?>Messages
										</span> 
										
									</span>
							</li>
							
						    <?php //echo Modules::run('chat/index'); ?>
							<li class="footer">
								<a class="" href="<?php echo base_url();?>chat/inbox" target="_blank">See all messages <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					
					
					<!-- BEGIN INBOX DROPDOWN tony-->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge"><?php echo Modules::run('chat/notify'); ?></span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> Messages</span>
								<span class="compose pull-right tip-right" title="Compose message">
								<a class="" href="<?php echo base_url();?>chat" >
								<i class="fa fa-pencil-square-o"></i></span>
							</li>
						        
						
							
                                                        
                                                        
                                                        
                                                        
							<li class="footer">
								<a href="#">See all messages <i class="fa fa-arrow-circle-right"></i></a>
								<?php echo Modules::run('chat/index'); ?>
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
							<li><a href="<?php echo base_url() ?>auth/index"><i class="fa fa-user"></i> User Profile</a></li>
							<li><a href="<?php echo base_url() ?>auth/create_user"><i class="fa fa-user"></i> Create User</a></li>
							<li><a href="<?php echo base_url() ?>auth/create_user"><i class="fa fa-cog"></i> Account Settings</a></li>
							
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
					    <!--
						<div class="divide-20"></div>
						-->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li <?php if($this->uri->segment(1)=== 'dashboard'){ echo 'class="active"'; }  ?>>
								<a class=""href="<?php echo base_url();?>dashboard" >
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>					
							</li>
                            
							                         
                            
							<div class="divide-5"></div>
							<i class="fa fa-bookmark-o fa-fw"></i> 
							    <span class="menu-text"><font size="2" color="blue">Sales</font></span>
							<div class="divide-5"></div>
                            <li <?php if($this->uri->segment(1)=== 'businesses'){ echo 'class="active"'; }  ?>>
								<a class="" href="<?php echo base_url();?>businesses" >
								<i class="fa fa-user fa-fw"></i> 
								      <span class="menu-text">Customers</span>
								</a>
							</li>
							<li <?php if($this->uri->segment(1)=== 'quotes'){ echo 'class="active"'; }  ?>>
								        <a class="" href="<?php echo base_url();?>quotes">
										    <i class="fa fa-table fa-fw"></i> 
										    <span class="menu-text">Quote</span>							
								        </a>						
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-pencil-square-o fa-fw"></i>  <span class="menu-text">Sales Orders</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li <?php if($this->uri->segment(1)=== 'salesorders'){ echo 'class="active"'; }  ?>>
								       <a class="" href="<?php echo base_url();?>salesorders">
								       
								       <span class="menu-text">Sales Orders</span>
								       </a>								
							        </li>
									<li><a class="" href="<?php echo base_url();?>salesorders/order_invoiced"><span class="sub-menu-text">Invoiced Orders</span></a></li>
									<li><a class="" href="<?php echo base_url();?>salesorders/order_canceled"><span class="sub-menu-text">Cancelled Orders</span></a></li>
									<li><a class="" href="<?php echo base_url();?>salesorders/order_returned"><span class="sub-menu-text">Returned Orders</span></a></li>
									
							 
								</ul>
							</li>
							<!---
							<li <?php if($this->uri->segment(1)=== 'invoices'){ echo 'class="active"'; }  ?>>
								      <a href="<?php echo base_url();?>invoices" class="">
								      <i class="fa fa-gbp fa-fw"></i>  
								      <span class="menu-text">Invoices</span> </a>
						    </li>--->
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-gbp fa-fw"></i>  <span class="menu-text">Invoices</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li <?php if($this->uri->segment(1)=== 'invoices'){ echo 'class="active"'; }  ?>>
								      <a href="<?php echo base_url();?>invoices" class="">
								       
								      <span class="menu-text">Invoices</span> </a>
						            </li>
									<li><a class="" href="<?php echo base_url();?>invoices/invoices_part_paid"><span class="sub-menu-text">Part Paid Invoices</span></a></li>
									<li><a class="" href="<?php echo base_url();?>invoices/invoices_paid"><span class="sub-menu-text">Paid Invoices</span></a></li>
									<li><a class="" href="<?php echo base_url();?>invoices/email_com_inv"><span class="sub-menu-text">Email Invoices	to Customers</span></a></li>
									
							        <li><a class="" href="<?php echo base_url();?>invoices/pay_at_a_time"><span class="sub-menu-text">Make Payment At a Time</span></a></li>
                                  		 
									 
									<li class="has-sub-sub">
										<a href="javascript:;" class=""><span class="sub-menu-text">Update</span>
										<span class="arrow"></span>
										</a>
										<ul class="sub-sub">
											<li>                                  		  <a class="btn-lg btn-danger pop-hover" data-title="Update Corrected VAT AMOUNT! " data-content="for unpaid invoices only" data-original-title="" title="" href="<?php echo base_url();?>invoices/update_vat_n_total">Update and Correct Inc Vat Amount </span></a></li>
											<li><a class="" href="#"><span class="sub-sub-menu-text">Item 2</span></a></li>
										</ul>
									</li>
									 
								</ul>
							</li>
							<li>
							
							
							
							<div class="divide-"></div>
							<i class="fa  fa-shopping-cart fa-fw"></i> 
							    <span class="menu-text"><font size="2" color="green">Purchasing</font></span>
							<div class="divide-"></div>
					        <li <?php if($this->uri->segment(1)=== 'po'){ echo 'class="active"'; }  ?>>
							    <a class="" href="<?php echo base_url();?>po">
								<i class="fa fa-th-large fa-fw"></i> 
								<span class="menu-text">Purchase orders</span>
							     </a>
						    </li>
							
							<li <?php if($this->uri->segment(1)=== 'vendors'){ echo 'class="active"'; }  ?>>
							     <a class="" href="<?php echo base_url();?>vendors">
								 <i class="fa fa-male fa-fw"></i> 
								 <span class="menu-text">Vendors</span>
								 </a>
						    </li>
							<div class="divide-20"></div>
                            <li <?php if($this->uri->segment(1)=== 'warehouse'){ echo 'class="active"'; }  ?>>
							    <a class="" href="<?php echo base_url();?>warehouse" ><i class="fa fa-desktop fa-fw"></i> 
								<span class="menu-text">Warehouse</span>
								</a>
							</li>                                                                                                                                           
                            <li <?php if($this->uri->segment(1)=== 'reports'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>reports" class="">
								<i class="fa fa-bar-chart-o fa-fw"></i>  
								<span class="menu-text">Reports</span>
                                </a>
							</li>
							<li <?php if($this->uri->segment(1)=== 'calendar'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>calendar" class="">
								<i class="fa fa-calendar-o fa-fw"></i>  
								<span class="menu-text">Calendar</span>
                                </a>
							</li>
							
							
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
			<!-- /SIDEBAR -->
    </section><!-- Modal -->
        <!-- Modal -->
<!-- SAMPLE BOX CONFIGURATION MODAL FORM>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">New Customer</h4>
					</div>
					<div class="modal-body">
					<?php 
                                        
                                       // echo Modules::run('businesses/add_company');                                                                            
                                        
                                        ?>
					</div>
				
				  </div>
				</div>
			  </div>
			<-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

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

<!-- FULL CALENDAR -->
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>