<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Crown | Chats</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animatecss/animate.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	
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
							<li>
								<a href="<?php echo base_url()?>">
									<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
									<span class="selected"></span>
								</a>					
							</li>
						
								<li><a class="" href="<?php echo base_url().'chat/sent ';?>"><i class="fa fa-envelope-o fa-fw"></i> <span class="menu-text">Sent</span></a></li>
							
							

							<li class="hidden" >
								<a href="<?php echo   base_url().'chat/compose'; ?>" class="">
								<i class="fa fa-pencil-square-o fa-fw"></i> <span class="menu-text">Compose</span>
								
								</a>
							
							</li>
							
					
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="<?php echo base_url();?>">Home</a>
										</li>
										<li>
											<a href="<?php 'chat/inbox/'?>">Chats</a>
										</li>
										<li>Inbox</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Chats</h3>
									</div>
									<div class="description">Chat Window</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!--
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-block alert-info fade in">
									<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
										<p><h4><i class="fa fa-comment"></i> Try Out Chat</h4> 
										1. Chat Window: Try out the chat by typing into the chat box and pressing 'Enter' or clicking the send button.</p>
										<p>2. Chat Widget: Click on the 'chevron' to show widget</p>
								</div>
							</div>
						</div>
						-->
						<!-- CHAT -->
						<div class="row">
						
<?php
$this->load->model('mdl_chat');

 //$currentUser=0;
//print "<h1>Acting as id{$currentUser}User{$currentUserName}</h1>";
//print "<h2>Inbox</h2>";
  
$dsn = 'mysql:host=localhost;dbname=earth';
$PDO = new PDO($dsn, 'root', '');
   $base_url = base_url();
$sql = "
select m.mid, m.seq, m.created_on, m.created_by, m.body, r.status,r.read from message2_recips r
inner join message2 m on m.mid=r.mid and m.seq=r.seq
where r.uid=? and r.status in ('A', 'N')
and r.seq=(select max(rr.seq) from message2_recips rr where rr.mid=m.mid and rr.status in ('A', 'N'))
and if (m.seq=1 and m.created_by=?, 1=0, 1=1)
order by created_on desc";
 
$stmt = $PDO->prepare($sql);
$args = array($currentUser, $currentUser);
 
if (!$stmt->execute($args)) {
	die('error');
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*
if (count($rows)) {
	print '<table><tr><th>From</th><th>When</th><th>Message Content</th>';
        print '<th>Status</th><th>View</th></tr>';
 
	foreach ($rows as $row) {  
	$from=$row['created_by'];
	$userName=$this->mdl_chat->get_user($from); 
		echo '<tr><td style="width:10%;" >id:'. $row['mid'] .'/' .$this->mdl_chat->get_user($row['created_by']) . '</td>
		          <td>' . $row['created_on'];
                echo  '</td><td style="width:15%;" >' . $row['body'] . '</td><td style="width:5%;">' . $row['status'] . '</td><td>';
		echo '<a href="'.$base_url.'chat/view/' . $row['mid'] . '">View</a>';
		echo '</td></tr>';
	}
	echo '</table>';
}
else {
	echo 'No items in your inbox';
}
echo '<div><a href="'.$base_url.'chat/compose">compose</a></div>';
echo '<div><a href="'.$base_url.'chat/sent">sent</a></div>';
*/
?>



							<div class="col-md-9 col-md-offset-1">
								<!-- BOX -->
								<div class="box border green chat-window">
									<div class="box-title">
										<i class="fa fa-comments"></i><h4>Inbox</h4><br><h5>Acting as User :<?php echo $currentUserName?></h5>

										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									
									<div class="box-body big">
									<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
									<?php   
									
									
									
									if (count($rows)) {
										
										foreach ($rows as $row) {
										$from=$row['created_by'];
	                                    $userName=$this->mdl_chat->get_user($from);
										
										
										?>
										
											<ul class="media-list chat-list">
												<!---
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object" alt="Generic placeholder image" src="img/chat/headshot1.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<tr><td><h4 class=""><?php $from.$this->mdl_chat->get_user($row['created_by'])?>xxx<span class="pull-right"><i class="fa fa-clock-o"></i><?php $row['created_on']?></span></h4>
													 <td style="width:5%;"><?php  $row['body']?> </td></tr>
													
												  </div>
												</li>
												-->
												<li class="media">
												<?php    
												    echo '<tr>
													          <td class="pull-left" class="media-heading" style="width:100%;" ><h4><strong>' .$this->mdl_chat->get_user($row['created_by']) .' </strong></h4></tr>
												        
												    <div class="media-body chat-pop">';
												  
												 echo '<tr><td class="media-heading" style="width:100%;" >status:<strong>' . $row['status'] .' </strong><span class="pull-right"><i class="fa fa-clock-o"></i><abbr class="timeago" title="' . $row['created_on'].'" >' . $row['created_on'].'</abbr></span></td>';
                                                 echo  '</br><td style="width:15%;" >' . $row['body'] . '</td></br><td style="width:5%;">';
		                                         echo '<span>read:' . $row['read'] . '</span><span class="pull-right"><a href="'.$base_url.'chat/view/' . $row['mid'] . '">View</span></a>';
		                                         echo '</td>
												       </tr></div></li>';
												?>
												
												
											
												<!----
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="img/chat/headshot1.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">John Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												--->
											</ul>
										
									<?php	
									}
									}
									else {
	echo 'No items in your inbox';
}
										?></div>
										<div class="divide-20"></div>
										
									</div>
									
									
									
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /CHAT -->
						<!-- CHAT WIDGET -->
						<div class="row">
							<div class="chat-widget">
								<div class="col-md-12">
									<!-- BOX -->
									<div class="box border red">
										<div class="box-title">
											<h4><i class="fa fa-comment"></i>Message Compose</h4>
											<div class="tools">
												<a href="javascript:;" class="expand">
													<i class="fa fa-chevron-down"></i>
												</a>
												<a href="javascript:;" class="remove">
													<i class="fa fa-times"></i>
												</a>
											</div>
										</div>
										<div class="box-body" style="display:none">
											
											<div class="divide-20"></div>
											<div class="chat-form">
												
												<div class="input-group"> 
												<form action="<?php base_url()?>chat/post" method="post">
	                                                To who : 
	                                                    <select name="uids"  class="form-control" >
                                                   
													 <?php
                                                            
                                                            $users=$this->db->select('*') 
			                                                       // ->group_by('terms')			  
			                                                        ->get('users');                               
								                            foreach ($users->result()as $u) 
								                             {
                                                                    echo '<option  value="' . $u->id. '">' . $u->username .'('. $u->email .')</option>  ';
                                                                                              }                                                                            
                                                                                                                    ?> 
                                                         </select>	
	
	
	<br />
	Message: <textarea name="body"  rows="10" cols="40" ></textarea><br />
	<input type="submit" value="send" />
</form>
												
												</div>
											</div>
										</div>
									</div>
									<!-- /BOX -->
								</div>
							</div>
						</div>
						<!-- /CHAT WIDGET -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/timeago/jquery.timeago.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("inbox");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>