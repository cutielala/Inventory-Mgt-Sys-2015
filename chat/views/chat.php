<?php
/*
foreach($chat->result() as $chat){
    
 $originalDate =$chat->sent;
                                                        $newDate = date("d-m-Y ---  h:i ", strtotime($originalDate));
                                                        


echo '<li data-toggle="modal" data-target="#myMsg" data-id="' . $chat->id . '">
                                                            
                                                            
								<a href="#">
									
									<span class="body">
										<span class="from">from : ';

                                                                              if($chat->read === '0'){
                                                                                  echo '<strong>'.$chat->from.'</strong></span>'; 
}  else {
     echo ''.$chat->from.'</span>   <i class="fa fa-check"></i> seen'; 
}
										echo '<span class="message">
										'.$chat->message.'
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>'.$newDate.'</span>
										</span>
									</span>
									 
								</a>
							</li>';
        
}*/
?>
test 
<?php
$dsn = 'mysql:host=localhost;dbname=earth';
$PDO = new PDO($dsn, 'root', '');
   $base_url = base_url();
$sql = "
select m.mid, m.seq, m.created_on, m.created_by, m.body, r.status from message2_recips r
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
	echo '<li><a href="#">
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
							</li>';

	
	
	
	
	
}

?>
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