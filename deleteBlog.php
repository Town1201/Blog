<?php 

require_once 'dbfunc.php';
	session_start();
	$userID = $_SESSION['UserAccount'];
	$BlogID = $_GET['BlogID'];
	$conn = connectDB();
	$res = mysql_query("DELETE FROM T_Blogs WHERE BlogsID=$BlogID");

	header("Location:blogManage.php?UserAccount=$userID");
 ?>