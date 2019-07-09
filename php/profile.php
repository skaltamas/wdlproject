<?php
//include('session.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Home Page</title>
	<style>
		 	table{
            	position: center;
            	margin-left: 50px;
            	margin-top: 0px;
                border: 2px solid brown;
                width: 40%;
                height: 140pt;
            }
            table td,th{
                padding: 20px;
            }
            table tr:nth-child(odd){
                background-color: #A0522D;
            }
		img.background {
			    width: 100%;
			    height: 85%;
			    position: absolute;
			    left: 0px;
			    top: 42px;
			    z-index: -1;
		}
		p{
				color: #A52A2A;
				font-size: 22pt;
				margin-top: 60px;
				margin-left: 380px;
				padding-left: 40px;
				margin-bottom: 10px;
				font-family: URW Chancery L, cursive;
		}
		#logout{
			width: 8%;
			height:	40px;
			background-color: #A0522D;
			color: #ffffff; 
			border-radius: 4px;
			border: 0;
			margin-left: 1025px;
		}
		#logout:hover,#btn:hover{
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
	<img class="background" src="../img/background.jpg" alt="Background" width="300" height="400">
	<div id="profile">
		<p id="welcome">Welcome  <i><?php echo $user_check; ?></i> to our Library !!</p>
		<form method="get" action="logout.php">
	    	<button id="logout" type="submit" name="logout">Log Out</button>
		</form>
		<form method="post" action="../book.html">
			<input id="btn" name="submit" type="submit" value="Click here to search books">
		</form>
	</div>
<?php
require_once('dbconn.php');
include('issue.php');
$query = mysqli_query($conn,"SELECT * FROM issue WHERE username='$user_check'");
$row = mysqli_num_rows($query);      //count the number of rows affected
if ($row!=0)
	{
		while($rows= mysqli_fetch_assoc($query))
			{
			    $book = $rows['book'];
			    $issue_date = $rows['issue_date'];
			    $due_date = $rows['due_date'];
			    $reissue = $rows['reissue'];
			
?>
	<table>
		<tr>
			<th>Book</th>
			<th>Issue Date</th>
			<th>Due Date</th>
			<th>Reissue attempts</th>
		</tr>
		<tr>
			<th><?php echo $book; ?></th>
			<th><?php echo $issue_date; ?></th>
			<th><?php echo $due_date; ?></th>
			<th><?php echo $reissue; ?></th>
		</tr>
	</table>
	
<?php
	}
}
	else
		{
			echo "<p>You have not issued any book yet !!<p>";	
			}
		$conn->close();
?>
</body>

</html>