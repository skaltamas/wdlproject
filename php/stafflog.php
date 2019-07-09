<!DOCTYPE html>
<html>
    <head>
        <title>Your Login Info</title>
        <style>
            table{
            	position: center;
            	margin-left: 380px;
            	margin-top: 180px;
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
	$username=$_POST['username'];
	$pass=$_POST['password'];
	if($username && $pass)
	{
?>
	<table>
            <tr>
                <td>Name</td>
                <td><?php echo $username;?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $pass;?></td>
            </tr>
	</table>
<?php
		$query =mysqli_query($conn,"SELECT * FROM staffmember WHERE username='$username'");
		$row = mysqli_num_rows($query);       //count the number of rows affected
		if ($row!=0)
		{
			//code to login
		    while($rows= mysqli_fetch_assoc($query))
		    {
		        $dbusername = $rows['username'];
		        $dbpassword = $rows['password'];
		    }
			//check to see if they match
			if ($username===$dbusername && $pass===$dbpassword) 
		    {
		    	echo "<br>";
				echo "<br>";
		     	echo "<p>Login Successful!!<p>";
		     	echo "<p>You can now use the services of our library!!<p>";
			  	$_SESSION['username']=$username;
			  	header("Refresh:3,url=../book.html");
		    }
		    else
			{
				echo "<br>";
				echo "<br>";
				echo "<p>Incorrect username or password!!<p>";
				echo "<p>Try again!!<p>";
				$_SESSION['username']=$username;
			  	header("Refresh:3,url=../stafflog.html");			
			}
		}
		else
		{
			echo "<p>Incorrect username or password!!<p>";		
		}
	}		
}
?>