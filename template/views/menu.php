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
					
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN tony-->
					
					
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
							<li><a href="<?php echo base_url() ?>auth/profile"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="<?php echo base_url() ?>auth/change_password"><i class="fa fa-user"></i>Change Password</a></li>
							
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
						<!---div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div----->
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							
                            <li  <?php if($this->uri->segment(1)=== 'dashboard'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>index.php/dashboard">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="label label-right label-success tip-right" title="view me">DEMO</span>
								<span class="selected"></span>
								</a>								
							</li>  
							<li <?php if($this->uri->segment(1)=== 'businesses'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>index.php/businesses" >
								    <i class="fa fa-user fa-fw"></i> 
								    <span class="menu-text">Customers</span>
									<span class="label label-right label-success tip-right" title="view me">DEMO</span>
								</a>
							</li>                         
                            
							<div class="divide-5"></div>
							<li <?php if($this->uri->segment(1)=== 'quotes'){ echo 'class="active"'; }  ?>>
								<a href="<?php echo base_url();?>index.php/quotes">
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
								       <a class="" href="<?php echo base_url();?>index.php/salesorders">
								       
								       <span class="menu-text">Sales Orders</span>
								       </a>								
							        </li>
									<li><a  href="<?php echo base_url();?>index.php/salesorders/order_onhold"><span class="sub-menu-text">Orders on Hold</span></a></li>
								    <li><a class="" href="<?php echo base_url();?>index.php/salesorders/order_invoiced"><span class="sub-menu-text">Invoiced Orders</span></a></li>
									<li><a class="" href="<?php echo base_url();?>index.php/salesorders/order_canceled"><span class="sub-menu-text">Canceled Orders</span></a></li>
									<li><a class="" href="<?php echo base_url();?>index.php/salesorders/order_returned"><span class="sub-menu-text">Returned Orders</span></a></li>
									<li class="has-sub-sub">
										<a href="javascript:;" class=""><span class="sub-menu-text">Refund</span>
										<span class="arrow"></span>
										</a>
										<ul class="sub-sub">
											<li><a class="" href="<?php echo base_url();?>index.php/salesorders/order_refund"><span class="sub-sub-menu-text">Credit Note</span></a></li>
															</ul>
									</li>
							 
								</ul>
							</li>
				
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-gbp fa-fw"></i>  <span class="menu-text">Invoices</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li <?php if($this->uri->segment(1)=== 'invoices'){ echo 'class="active"'; }  ?>>
								      <a href="<?php echo base_url();?>index.php/invoices" class="">
								       
								      <span class="menu-text">All Invoices</span> </a>
						            </li>
									<li><a class="" href="<?php echo base_url();?>index.php/invoices/invoices_unpaid"><span class="sub-menu-text">Awaiting Invoices</span></a></li>
									
									
									<li><a class="" href="<?php echo base_url();?>index.php/invoices/invoices_part_paid"><span class="sub-menu-text">Part Paid Invoices</span></a></li>
									<li><a class="" href="<?php echo base_url();?>index.php/invoices/invoices_paid"><span class="sub-menu-text">Paid Invoices</span></a></li>
									
									
							        <li><a class="" href="<?php echo base_url();?>index.php/invoices/pay_at_a_time"><span class="sub-menu-text">Make Payment At a Time</span></a></li>

								</ul>
							</li>
							<li>
							<li class="has-sub"     <?php if($this->uri->segment(1)=== 'po'){ echo 'class="active"'; }  ?>    >
								<a href="javascript:;" class="">
								 <i class="fa fa-th-large fa-fw"></i>   <span class="menu-text">Purchase orders</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li <?php //if($this->uri->segment(1)=== 'po'){ echo 'class="active"'; }  ?>>
							            <a class="" href="<?php echo base_url();?>index.php/po">
								            
								            <span class="menu-text">Purchase Orders Pending</span>
							             </a>
						            </li>								
								    <li>
									    <a class="" href="<?php echo base_url();?>index.php/po/po_placed" >Purchase Orders Placed</a>
									 </li>
									 <li><a class="" href="<?php echo base_url();?>index.php/po/po_received" >Purchase Orders Received</a></li>									
							        									
							 									
															
							 
									
									<li><a class="" href="<?php echo base_url();?>index.php/po/po_complete" >Purchase Orders Complete</a></li>									
							 
									<li><a class="" href="<?php echo base_url();?>index.php/po/eta_etd" >Check ETD/ETA Time-line</a></li>									
							 
								</ul>
							</li>
							
							<li <?php if($this->uri->segment(1)=== 'vendors'){ echo 'class="active"'; }  ?>>
							     <a class="" href="<?php echo base_url();?>index.php/vendors">
								 <i class="fa fa-male fa-fw"></i> 
								 <span class="menu-text">Vendors</span>
								 </a>
						    </li>
							<div class="divide-20"></div>
                           <li class="has-sub">
								<a href="javascript:;" class="">
								 <i class="fa fa-desktop fa-fw"></i>   <span class="menu-text">Warehouse</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li <?php if($this->uri->segment(1)=== 'warehouse'){ echo 'class="active"'; }  ?>>
							            <a class="" href="<?php echo base_url();?>index.php/warehouse" >
								            
								            <span class="menu-text">Warehouse</span>
							             </a>
						            </li>								
									<li><a title="QTY less than 10 " class="" href="<?php echo base_url();?>index.php/warehouse/lowstockitems" >Low Stock Items</a></li>									
							 
								</ul>
							</li>                                                                                                                                          
                            <li <?php if($this->uri->segment(1)=== 'reports'){ echo 'class="active"'; }  ?>>
						        <a href="<?php echo base_url();?>index.php/reports" class="">
								<i class="fa fa-bar-chart-o fa-fw"></i>  
								<span class="menu-text">Reports</span>
                                </a>
							</li>
							
							
							
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->

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

<script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript">
	function no_allow() {
        return confirm('Sorry, I am afriad you cannot view this on demo,please check others!');
    }
  	
	function no_demo() {
        return confirm('Sorry, I am afriad you cannot check this on demo,please check others with demo label!');
    }
  

	
</script>


