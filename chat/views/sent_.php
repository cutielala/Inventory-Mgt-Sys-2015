<?php
//include ('currentuser.php');

print "<h1>Acting as {$currentUserName}</h1>";
print "<h2>Inbox</h2>";
 
$dsn = 'mysql:host=localhost;dbname=earth';
$PDO = new PDO($dsn, 'root', '');
   $base_url = base_url();
 
$sql = "
select m.mid, m.seq, m.created_on, m.created_by, m.body, r.status from message2_recips r
inner join message2 m on m.mid=r.mid and m.seq=r.seq
where m.created_by=? and r.uid=?
and r.status != 'D'
and m.seq=(select max(rr.seq) from message2_recips rr where rr.mid=m.mid and rr.status != 'D' and rr.uid=?)
order by created_on desc";
 
$stmt = $PDO->prepare($sql);
$args = array($currentUser, $currentUser, $currentUser);
 
if (!$stmt->execute($args)) {
	die('error');
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($rows)) {
	print '<table><tr><th>Originator</th><th>When</th><th>Body</th>';
        print '<th>Status</th><th>View</th></tr>';
 
	foreach ($rows as $row) {
		echo '<tr><td>' . $row['created_by'] . '</td><td>' . $row['created_on'];
                echo  '</td><td>' . $row['body'] . '</td><td>' . $row['status'] . '</td><td>';
		echo '<a href="view.php?id=' . $row['mid'] . '">View</a>';
		echo '</td></tr>';
	}
	echo '</table>';
}
else {
	echo 'No items in your inbox';
}
echo '<div><a href="'.$base_url.'chat/compose">compose</a></div>';
echo '<div><a href="'.$base_url.'chat/sent">sent</a></div>';
?>