<!DOCTYPE html>
<html>
    <head>
        <title>Your Book Info</title>
        <style>
            table{
            	position: center;
            	margin-left: 380px;
            	margin-top: 100px;
                border: 2px solid brown;
                width: 40%;
                height: 140pt;
            }
            table td{
                padding: 15px;
            }
            table tr:nth-child(odd){
                background-color: #A0522D;
            }
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
				margin-left: 380px;
				font-family: URW Chancery L, cursive;
			}
			#btn{
				width: 160px;
				height: 50px;
				margin-top: 7px;
				margin-left: 530px;
				background-color: #A0522D;
				color: #ffffff;
				border-radius: 4px;
				border: 0;
				font-style: bold;
			}
			#btn:hover{
				background-color: #A52A2A;
				opacity: 0.8;
				color: white;
			}
        </style>
    </head>
    <body>
    	<img class="background" src="../img/background.jpg" alt="Background" width="300" height="400">
<?php
require_once('dbconn.php');
if ($_POST['submit'])
{
	$dbtitle = $_POST['search'];
	if($dbtitle)
	{
?>
		<table>
            <tr>
                <td>Title</td>
                <td><?php echo $dbtitle;?></td>
            </tr>  
<?php
		$query =mysqli_query($conn,"SELECT * FROM book WHERE title='$dbtitle'");
		$row = mysqli_num_rows($query);       //count the number of rows affected
		if ($row!=0)
		{
		    while($rows= mysqli_fetch_assoc($query))
		    {
		    	$dbisbn = $rows['isbn'];
		    	$dbauthor = $rows['author'];
		    	$dbedition = $rows['edition'];
		    	$dbpublication = $rows['publication'];
		    	$dbstatus = $rows['status'];
?>
			<tr>
                <td>ISBN</td>
                <td><?php echo $dbisbn;?></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><?php echo $dbauthor;?></td>
            </tr>
            <tr>
                <td>Edition</td>
                <td><?php echo $dbedition;?></td>
            </tr>
            <tr>
                <td>Publication</td>
                <td><?php echo $dbpublication;?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $dbstatus;?></td>
            </tr>
        </table>
<?php
		    }
			if ($dbstatus==="Available") 
		    {
		    	echo "<br>";
				echo "<br>";
		     	echo "<p>Book is Available!! You can now confirm your book issue!!</p>";
?>
			<form method="post" action="confirm.php">
				<input type="text" name="title" value="<?php echo $dbtitle?>" style='display:none;'/>
				<input id="btn" name="confirm" type="submit" value="Click here to confirm">
			</form>
<?php
			  	$_SESSION['title']=$dbtitle;
			  	//header("Refresh:3,url=book.php");
		    }
		    else
			{
				echo "<br>";
				echo "<br>";
				//echo "Error: " . $sql . "<br>" . $conn->error;
				echo "<p>Book is not Available!! Try for another book!!</p>";
				$_SESSION['title']=$dbtitle;
			  	header("Refresh:3,url=../book.html");
			}
		}
		else
		{
			echo "<br>";
			echo "<br>";
			//echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<p>Book is not Available!! Try for another book!!</p>";
			$_SESSION['title']=$dbtitle;
			header("Refresh:3,url=../book.html");		
		}
	}		
}
?>