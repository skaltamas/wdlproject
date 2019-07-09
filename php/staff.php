<!DOCTYPE html>
<html>
    <head>
        <title>Your Registeration Info</title>
        <style>
            table{
            	position: center;
            	margin-left: 380px;
            	margin-top: 80px;
                border: 2px solid brown;
                width: 40%;
                height: 140pt;
            }
            table td{
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
				margin-left: 380px;
				font-family: URW Chancery L, cursive;
			}
        </style>
    </head>
    <body>
    	<img class="background" src="../img/background.jpg" alt="Background" width="300" height="400">
<?php
require_once('dbconn.php');
if ($_POST['submit']) 
{
	$stid = $_POST['stid'];
	$name = $_POST['sname'];
	$email = $_POST['semail'];
	$username = $_POST['susername'];
	$password =  $_POST['spassword'];
	$cpassword = $_POST['scpassword'];
?>
	<table>
            <tr>
                <td>ST_ID</td>
                <td><?php echo $stid;?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $name;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email;?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $username;?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $password;?></td>
            </tr>
            <tr>
                <td>Cpassword</td>
                <td><?php echo $cpassword;?></td>
            </tr>
	</table>
<?php
	$sql = "INSERT INTO staffmember (stid,name,email,username,password,cpassword) VALUES ('$stid','$name','$email','$username','$password','$cpassword')";

	if ($conn->query($sql) === TRUE) {
		echo "<br>";
		echo "<br>";
    	echo "<p>New record created successfully!!<p>";
        echo "<p>Login to your account to get the services!!<p>";
    	$_SESSION['username']=$username;
		header("Refresh:10,url=../stafflog.html");
	} 
	else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<br>";
		echo "<br>";
		$dbusername=$_POST['susername'];
		$dbpassword=$_POST['spassword'];
		if ($dbusername===$username && $dbpassword===$password) {
			echo "<p>Already registered!!<p>";
            echo "<p>Try again!!<p>";
			$_SESSION['username']=$username;
			header("Refresh:10,url=../staff.html");
		}
	}

	$conn->close();
}
?>