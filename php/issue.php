
<?php
//include('session.php');
//include('avail.php');
require_once('dbconn.php');
if(isset($_POST['confirm']))
{
	//$dbtitle=mysqli_query($conn,"SELECT title FROM book WHERE ");
	$date=date('d:m:y');
	$duedate=date('y:m:d', strtotime("+7 days"));
	$query =mysqli_query($conn,"INSERT INTO issue(username,issue_date,due_date,reissue) VALUES('$user_check',$date','$duedate',3)");
	//echo "Error: " . $query . "<br>" . $conn->error;
	header("Refresh:30,url:profile.php");
}
?>
