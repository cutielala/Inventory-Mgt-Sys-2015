<?php echo Modules::run('template/dash_head');?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />

	
<style >


.event{
	/* Contains the event header and body list */
	float:left;
	padding:4px;
	text-align:left;
	width:300px;
	margin:0 5px 50px;
}

.eventList li{
	/* The individual events */
	background:#F4F4F4;
	border:1px solid #EEEEEE;
	list-style:none;
	margin:5px;
	padding:4px 7px;
	
	/* CSS3 rounded corners */
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}

.eventList li:hover{
	/* The hover state: */
	cursor:pointer;
	background:#E6F8FF;
	border:1px solid #D4E6EE;
	color:#548DA5;
}



/* Individual background images for each type of event: */

li.news span.icon { 	background:url(<?php echo base_url();?>assets/timeline/img/icons/newspaper.png) no-repeat; }

li.image span.icon { 	background:url(<?php echo base_url();?>assets/timeline/img/icons/camera.png) no-repeat; }
li.milestone span.icon { 	background:url(<?php echo base_url();?>assets/timeline/img/icons/chart.png) no-repeat; }

div.content{
	/* This div contains additional data for the content */
	display:none;
}

.eventHeading{
	/* The colorful year headings at the top */
	font-size:2em;
	margin:-5px -5px 10px;
	padding:2px 5px;
	text-align:center;
}

/* Three color styles for the headings: */

.eventHeading.chreme{
	background:#FBF7F0;
	border:1px solid #EEE4D4;
	color:#A78B5F;
}

.eventHeading.blue{
	background:#E6F8FF;
	border:1px solid #D4E6EE;
	color:#548DA5;
}

.eventHeading.green{
	background:#E6FFDF none repeat scroll 0 0;
	border:1px solid #C9E6C1;
	color:#6EA85F;
}

#timelineLimiter{
	/* Hides the overflowing timeline */
	
	overflow-y:hidden;
	padding-top:10px;
	margin:40px 0;
	background:#F5F5F5;
}

#scroll{
	/* The small timeline below the main one. Hidden here and shown by jQuery if JS is enabled: */

	height:30px;

	background:#F5F5F5;
	border:1px solid #EEEEEE;
	
}

.scrollPoints{
	/* The individual years */
	float:left;
	font-size:1.4em;
	padding:4px 10px;
	text-align:center;
	width:100px;
	
	position:relative;
	z-index:10;
}

#centered{
	/* Centers the years, width is assigned by jQuery */
	margin:0 auto;
	position:relative;
}

#slider{
	/* Holds the scroll bar */
	margin:10px auto;
	height:45px;
	display:none;
}

#bar{
	/* The scroll bar */
	background:url(<?php echo base_url();?>assets/timeline/img/slider_center.png) repeat-x center center; 
	
	height:25px;
	cursor:pointer;color:#999999;
}

#barLeft{
	 background:transparent url(<?php echo base_url();?>assets/timeline/img/slider.png) no-repeat scroll left center; 
	height:25px;
	width:20px;
	left:0;
	top:0;
	position:absolute;
}

#barRight{
	background:transparent url(<?php echo base_url();?>assets/timeline/img/slider.png) no-repeat scroll right center;
	height:25px;
	position:absolute;
	right:0;
	top:0;
	width:20px;
}

#overlay{
	/* The overlay that darkens the page when an event is clicked */
	position:absolute;
	z-index:10;
	top:0;
	left:0;
	background-color:#222222;
}

#windowBox{
	/* Shows details about the event on click */
	position:absolute;
	z-index:20;
	background-color:#fcfcfc;
	padding:10px;
	border:2px solid #666666;
	overflow:auto;
}

#titleDiv{
	/* The title of the windowBox */
	background:#F5F5F5;
	border:1px solid #EEEEEE;
	color:#AAAAAA;
	font-size:1.5em;
	margin-bottom:10px;
	padding:5px 10px;
}

#date{
	/* The date on the bottom of the windowBox */
	bottom:20px;
	color:#999999;
	font-size:0.8em;
	font-style:italic;
	position:absolute;
	right:15px;
	padding:2px;
	background:#FCFCFC;
}

#highlight{
	/* The blue highlight that moves with the scroll bar */
	height:30px;
	position:absolute;
	z-index:0;
	left:0;
	top:0;
	
	background:#E6F8FF;
	border:1px solid #D4E6EE;
	border-width:0 1px;
}

.clear{
	clear:both;
}

/* The styles below are only necessary for the demo page */

h1{
	background:#F4F4F4;
	border-bottom:1px solid #EEEEEE;
	font-family:"Myriad Pro",Arial,Helvetica,sans-serif;
	font-size:20px;
	font-weight:normal;
	margin-bottom:15px;
	padding:15px;
	text-align:center;
}

h2 {
	font-family:"Myriad Pro",Arial,Helvetica,sans-serif;
	font-size:12px;
	font-weight:normal;
	padding-right:40px;
	position:relative;
	right:0;
	text-align:right;
	text-transform:uppercase;
	top:-48px;
}

a, a:visited {
	color:#0196e3;
	text-decoration:none;
	outline:none;
}

a:hover{
	text-decoration:underline;
}

p.tutInfo{
	/* The tutorial info on the bottom of the page */
	padding:10px 0;
	text-align:center;
	position:absolute;
	bottom:0px;
	background:#F4F4F4;
	border-top:1px solid #EEEEEE;
	width:100%;margin-bottom:15px;
}



</style>
	
	
	



<body>
	<?php echo Modules::run('template/menu'); ?>
	
	
<div id="main-content">
    <div class="container">
	    <div class="row"> 
	        <div id="content" class="col-sm-12">
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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/po">Purchase Orders </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">ETD and ETA</h3>
                            </div>
                            <div class="description">ETD and ETA in Purchase Order</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER --> 
			    <div class="row"> 
			        <div class="col-sm-12"> 
			 
	                   <span  class="btn btn-block btn-pink "  disabled="">An Advanced Event Timeline, ETD and ETA in Purchase Order</span>
	                <br/>
	
                    <div id="timelineLimiter" style="overflow-x:scroll;"> <!-- Hides the overflowing timelineScroll div -->
	                    <div id="timelineScroll"> <!-- Contains the timeline and expands to fit -->
                            <div >
		<?php
        
        // We first select all the events from the database ordered by date:
        
        $dates = array();
        $res = mysql_query("SELECT * FROM po_orders  where status!='Completed' ORDER BY ETA ASC");
		
        while($row=mysql_fetch_assoc($res))
        {
			// Store the events in an array, grouped by years:
           // $dates[date('Y',strtotime($row['date_event']))][] = $row;
		   $dates[date('Y/m',strtotime($row['ETA']))][] = $row;
		  
        }
        
        $colors = array('green','blue','chreme');
		$scrollPoints = '';
		
        $i=0;
        //foreach($dates as $year=>$array) 
		foreach($dates as $year=>$array)
        {
			
			if($year!='1970/01'){
			// Loop through the years:
            echo '
            <div class="event">
                <div class="eventHeading '.$colors[$i++%3].'">'.$year.'</div>
                <ul class="eventList">
                ';
        
            foreach($array as $event)
            {
				// Loop through the events in the current year:
				$po_items=$this->db->where('po_id',$event['PO_id'])->get('po_orders_items'); 
				        
                                  
                echo '
				           <li class="'.$event['ETD'].'"  style="background:white;">
				                <span class=" " title="'.ucfirst($event['ETD']).'"></span>
				                    <font color="red">po#'.htmlspecialchars($event['PO_id']).'</font>&nbsp; ETA:&nbsp;'.date(" j F, Y",strtotime($event['ETA'])).'
				
				                        <div class="content">
				                            <div class="alert alert-default title">PO#:'.htmlspecialchars($event['PO_id']).'</div>
					                        <div class="body">';//.($event['split_po']=='Yes'?'<div style="text-align:center"><img src="'.$event['po_notes'].'" alt="Image" /></div>':nl2br('po#'.$event['PO_id'].'note'.$event['po_notes'])).'<BR>';
					 echo ' <table>
					            <thead>
                                   <tr><th>Zenith Code   .&nbsp; </th><th> QTY </th>';
					 echo '     </thead> 
					       <tbody>';
                                   
					 foreach($po_items ->result() as $item)
                    {
						  echo '<td>'.$item->CCL_Item.'  &nbsp; </td>
						        <td>  '.$item->item_qty.'</td></tr>';
					}
					
				echo ' </tbody></table>
				           <h4>&nbsp;<a class="btn btn-block btn-info" href=" '.base_url().'index.php/po/view/'.$event['PO_id'].'">View Detail</a></h4>
					   </div>	
				    
					
					<div class="date">';
					if ($event['ETD']==="0000-00-00"){
						echo'<br/><br/>ETD:No info.&nbsp; &amp;.&nbsp; </div>  <div class="date">ETA:'.date("F j, Y",strtotime($event['ETA'])).'</div>';
				  
					}
					else
					echo '<br/><br/>ETD:'.date("F j, Y",strtotime($event['ETD'])).'.&nbsp; &amp;.&nbsp; </div>  <div class="date">ETA:'.date("F j, Y",strtotime($event['ETA'])).'</div>
				    
				</div>
				
				</li>  
				';
				
				
				
            }
            
            echo '</ul></div>';
			
			// Generate a list of years for the time line scroll bar:
			//$scrollPoints.='<div class="scrollPoints">'.$year.'</div>';
			}
        }
        
        ?>
	                    </div>
                             <div class="hidden clear"></br></div> 
                        </div>
                            <div class="hidden">
                                <div id="scroll"> <!-- The year time line -->
                                     <div id="centered"> <!-- Sized by jQuery to fit all the years -->
	                                    <div id="highlight"></div> <!-- The light blue highlight shown behind the years -->
	                                        <?php echo "test".$scrollPoints ?> <!-- This PHP variable holds the years that have events -->
                                           </br>
				<div class="clear"></div>
            </div>
        </div>
        
            <div id="slider"> <!-- The slider container -->
        	<p>drag the horizontal scroll bar left and right to see parts of a event that are currently not visible

	        </p>
			<br/>
			    <div id="hidden bar"><!-- The bar that can be dragged -->
            	    <div id="barLeft"></div>  <!-- Left arrow of the bar -->
                    <div id="barRight"></div>  <!-- Right arrow, both are styled with CSS -->
                </div>
                                 </div>
                            </div>
                        </div> 

	
                    </div>
			   </div>
	<!--/PAGE --><!-- CUSTOM SCRIPT -->
	        </div>
	     </div>
	</div>
</div>	

</section>
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!--/PAGE -->
<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>


<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>



<!-- DATE RANGE PICKER -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<!-- DATE PICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- AUTOSIZE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autosize/jquery.autosize.min.js"></script>
<!-- COUNTABLE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/countable/jquery.simplyCountable.min.js"></script>
<!-- INPUT MASK -->
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<!-- FILE UPLOAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
<!-- UNIFORM -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js"></script>
<!-- JQUERY UPLOAD -->
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-template/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-loadimg/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload.min.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-process.min.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>/assets/js/jquery-upload/js/jquery.fileupload-image.min.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-audio.min.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-video.min.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-validate.min.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-ui.min.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/main.js"></script>
<!-- COOKIE -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>	 
    jQuery(document).ready(function() {
        App.setPage("eta_etd");  //Set current page
        App.init(); //Initialise plugins and elements
    });
	
	
	<!-- HANDLEBAR SCRIPT TEMPLATES -->
	$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */

	/* The number of event sections / years with events */
	var tot=$('.event').length;
	
	$('.eventList li').click(function(e){
			showWindow('<div>'+$(this).find('div.content').html()+'</div>');
	});
	
	/* Each event section is 320 px wide */ 
	var timelineWidth = 320*tot;
	var screenWidth = $(document).width();
	
	$('#timelineScroll').width(timelineWidth);
	
	/* If the timeline is wider than the screen show the slider: */
	if(timelineWidth > screenWidth)
	{
		$('#scroll,#slider').show();
		$('#centered,#slider').width(120*tot);
		
		/* Making the scrollbar draggable: */
		$('#bar').width((120/320)*screenWidth).draggable({

			containment: 'parent',
			drag: function(e, ui) {
	
				if(!this.elem)
				{
					/* This section is executed only the first time the function is run for performance */
					
					this.elem = $('#timelineScroll');
					
					/* The difference between the slider's width and its container: */
					this.maxSlide = ui.helper.parent().width()-ui.helper.width();

					/* The difference between the timeline's width and its container */
					this.cWidth = this.elem.width()-this.elem.parent().width();
					this.highlight = $('#highlight');
				}
				
				/* Translating each movement of the slider to the timeline: */
				this.elem.css({marginLeft:'-'+((ui.position.left/this.maxSlide)*this.cWidth)+'px'});
				
				/* Moving the highlight: */
				this.highlight.css('left',ui.position.left)
			}
		});
		
		$('#highlight').width((120/320)*screenWidth-3);
	}
	
});

function showWindow(data)
{
	/* Each event contains a set of hidden divs that hold
	   additional information about the event: */
	   
	var title = $('.title',data).text();
	var date = $('.date',data).text();
	var body = $('.body',data).html();
	
	$('<div id="overlay">').css({
								
		width:$(document).width(),
		height:$(document).height(),
		opacity:0.6
		
	}).appendTo('body').click(function(){
		
		$(this).remove();
		$('#windowBox').remove();
		
	});
	
	$('body').append('<div id="windowBox" class=""><div id="titleDiv" style="background:yellow">'+title+'</div>'+body+'<div id="date">'+date+'</div></div>');

	$('#windowBox').css({
		width:400,
		height:400,
		left: ($(window).width() - 400)/2,
		top: ($(window).height() - 400)/2
	});
	
}
  </script>
	
</body>
</html>