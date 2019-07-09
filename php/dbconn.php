<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$conn = mysqli_connect('localhost','root','root','wdlproject');
if (mysqli_connect_errno()){
	echo "Failed To Connect To MySql :".mysqli_connect_error();
}
 //else{
//echo "Connected";
//}
?>