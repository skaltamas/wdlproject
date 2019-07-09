<!DOCTYPE html>
<html>
    <head>
        <title>Your Book Info</title>
        <style>
	        img.background {
				    width: 100%;
				    height: 85%;
				    position: absolute;
				    left: 0px;
				    top: 50px;
				    z-index: -1;
				}
			p{
				color: #A52A2A;
				font-size: 22pt;
				margin-left: 400px;
				margin-top: 100px;
				font-family: URW Chancery L, cursive;
			}
			.smiley{
				margin-left: 500px;
				margin-top: 15px;
			}
			#btn:hover{
				background-color: #A52A2A;
				opacity: 0.8;
				color: white;
				}
			#btn{
				width: 20%;
				height:	40px;
				background-color: #A0522D;
				color: #ffffff; 
				border-radius: 4px;
				border: 0;
				margin-left: 950px;
				margin-top: 2px;
			}
		</style>
    </head>
    <body>
<?php
//include('session.php');
require_once('dbconn.php');
if(isset($_POST['confirm']))
{
$title=$_POST['title'];
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['username'];
$query = mysqli_query($conn,"SELECT sid FROM student WHERE username='$user_check'");
$row0 = mysqli_num_rows($query);    
while($rows= mysqli_fetch_assoc($query))
{
    $sid = $rows['sid'];
}

	//$dbtitle=mysqli_query($conn,"SELECT title FROM book WHERE ");
	$date=date('y:m:d');
	$duedate=date('y:m:d', strtotime("+7 days"));
	$query =mysqli_query($conn,"INSERT INTO issue(sid,username,book,issue_date,due_date,reissue) VALUES('$sid','$user_check','$title','$date','$duedate','3')");
	//echo "Error: " . $query . "<br>" . $conn->error;
}
?>
    	<img class="background" src="../img/background.jpg" alt="Background" width="300" height="400">
		<p>Dear <i><?php echo $user_check; ?></i>, Your Book is now confirmed.<br>You can now issue your book from our library within 3 days.
    	</p>
    	<img class="smiley" src="../img/smiley.jpg" alt="Smiley face" width="300" height="300">
    	<form method="post" action="profile.php">
			<input id="btn" name="submit" type="submit" value="Go to your home page">
		</form>
	</body>