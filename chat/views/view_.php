<html>
<head>
<title>Crown | Chat </title>

<!-- DATA TABLES -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />


<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />

	<!-- JQGRID -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 
<body>
<?php
//include ('currentuser.php');

print "<h1>Acting as {$currentUserName}</h1>";
$_GET['id']=$mid;
$dsn = 'mysql:host=localhost;dbname=earth';
$PDO = new PDO($dsn, 'root', '');
print "<h2>Viewing a single message: " . $_GET['id'] . "</h2>";
 
//$dsn = 'mysql:host=db-1.local;dbname=c3';

 
$sql = "
select m.mid, m.seq, m.created_on, m.created_by, m.body, r.status from message2_recips r
inner join message2 m on m.mid=r.mid and m.seq=r.seq
where r.uid=? and m.mid=? and r.status in ('A', 'N')";
$stmt = $PDO->prepare($sql);
 $currentUser=0;;
$args = array($currentUser, $_GET['id']);
if (!$stmt->execute($args)) {
	die('error');
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($rows)) {
	/** get all of the people this is between **/
	$sql = "select distinct(uid) as uid from message2_recips where mid=?";
	$stmt = $PDO->prepare($sql);
	$args = array($_GET['id']);
	$stmt->execute($args);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$uids = array();
	foreach ($results as $result) {
		$uids[] = $result['uid'];
	}
	$last = array_pop($uids);
 
	print '<p>Conversation between ';
	print implode(', ', $uids) . ' and ' . $last;
	echo '.</p>';
 
	print '<table><tr><th>Originator</th><th>When</th><th>Body</th></tr>';
	foreach ($rows as $row) {
		echo '<tr><td>' . $row['created_by'] . '</td><td>' . $row['created_on'];
                echo '</td><td>' . $row['body'] . '</td></tr>';
	}
	echo '</table>';
 
	/** now update the message to viewed **/
	$sql = "update message2_recips set status='A' where status='N' and mid=? and uid=?";
	$stmt = $PDO->prepare($sql);
	$args = array($_GET['id'], $currentUser);
	$stmt->execute($args);
 
	echo '<form action="'. base_url().'chat/post" method="post">';
	echo '<strong>Reply:</strong><br />';
	echo '<textarea name="body"></textarea><br />';
	//echo '<input type="hidden" name="mid" value="' . $row['mid'] . '" />';
	//echo 'uid<input type="hidden" name="uids" value="' . $row['uid'] . '" />';
	echo 'mid<input type="text" name="mid" value="' . $row['mid'] . '" />';
	echo '<input type="submit" value="reply" /></form>';
}
else {
	echo 'Cannot find this message';
}
echo '<div><a href="'. base_url().'chat/inbox">Inbox</a></div>';
echo '<div><a href="'. base_url().'chat/delete/' . $_GET['id'] . '">Delete</a></div>';
echo '$_GET[id]'.$_GET['id'];

?>

</body>
</html>