<?php
include ('currentuser.php');
$dsn = 'mysql:host=db-1.local;dbname=c3';
$PDO = new PDO($dsn, 'user', 'pass', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
 
$mid = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "update message2_recips set status='D' where mid=? and status != 'D' and uid=?";
$stmt = $PDO->prepare($sql);
$args = array($mid, $currentUser);
 
if (!$stmt->execute($args)) {
	die('error');
}
 
die(header('Location: inbox.php'));
?>