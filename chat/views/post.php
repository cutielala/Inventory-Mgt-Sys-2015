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
 $this->load->library('session');
//include ('currentuser.php');
 $username = $this->session->userdata('email');
  $currentUserName =  $username;
 $currentUser = $this->session->userdata('user_id');
$dsn = 'mysql:host=localhost;dbname=earth';
$PDO = new PDO($dsn, 'root', '');
 $uids = $_POST['uids'] ;
$mid = isset($_POST['mid']) ? $_POST['mid'] : 0;
$body = $_POST['body'];
  //echo 'uid'.$uids ;
  echo $mid ;
 echo $body .'</br>';
if (!empty($mid)) {//reply
	/** get the recips first **/
	$sql = "SELECT distinct(uid) as uid FROM message2_recips m where mid=?";
	$stmt = $PDO->prepare($sql);
	$args = array($mid);
	if (!$stmt->execute($args)) {
		die('error');
	}
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
	/** get seq # **/
	$sql = "select max(seq)+1 as seq from message2 where mid=?";
	$args = array($mid);
	$stmt = $PDO->prepare($sql);
	$stmt->execute($args);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$seq = $row['seq'];
	
	 echo 'if (!empty($mid))'.$uids ;
}
else {//compose
	$seq = 1;
	$uids = explode(',', $_POST['uids']);
	$receiver = explode(',', $_POST['uids']);
	 echo 'else($uid))'.$_POST['uids'];
	//$uids[] = $currentUser;
	$uids[] = $_POST['uids'];
	$uids = array_unique($uids);
	$rows = array();
	foreach ($uids as $uid) {
		$rows[] = array('uid'=>$uid);
	}
	
}
 
if (count($rows)) {
	$sql = "insert into message2 (mid, seq, created_on_ip, created_by, body) values (?, ?, ?, ?, ?)";
	$args = array($mid, $seq, '1.2.2.1', $currentUser, $body);
	$stmt = $PDO->prepare($sql);
	$stmt->execute($args);
 
	if (empty($mid)) {
		$mid = $PDO->lastInsertId();
	}
 
	/*$insertSql = "insert into message2_recips values ";
	
	$holders = array();
	$params = array();
	foreach ($rows as $row) {
		$holders[] = "(?, ?, ?, ?)";
		//$params[] = '';
		$params[] = $mid;
		$params[] = $seq;
		//$params[] = $receiver;
		$params[] = $row['uid'];//receiver
		$params[] = $row['uid'] == $currentUser ? 'A' : 'N';
		
		
		//echo '$uids'.$row['uid'].'$mid'.$mid.'$seq'.$seq;
	}
	$insertSql .= implode(',', $holders);*/
	
	$insertSql = "insert into message2_recips (mid, seq, uid, status) values (?, ?, ?, ?)";
	$params = array($mid, $seq, $_POST['uids'], $currentUser ? 'A' : 'N');
	
	$stmt = $PDO->prepare($insertSql);
	$stmt->execute($params);
 echo '$currentUser'.$currentUser.'$uids'.$_POST['uids'].'$mid'.$mid.'$seq'.$seq;
	die(header('Location:'. base_url().'chat/view/' . $mid));
}
else {
	die('no recips found');
}
?>

</body>
</html>