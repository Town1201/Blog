<?php 
require_once 'dbfunc.php';

session_start();
$BlogTitle=$_POST['BlogTitle'];
$BlogClassify=$_POST['BlogClassify'];
$BlogContent=$_POST['BlogContent'];
$BlogDate = date('y-m-d', time());
$userID = $_SESSION['UserAccount'];
$BlogTimes = 0;
$conn = connectDB();
$result = mysql_query("INSERT INTO T_Blogs(BlogsContent, BlogsTitle, BlogsClassify, BlogsDate, BlogsTimes, UsersID) VALUES ('$BlogContent', '$BlogTitle','$BlogClassify', '$BlogDate', '$BlogTimes', '$userID') ");
if (mysql_errno()) {
		echo mysql_error();
	}
header("Location:index.php?UserAccount=$userID");
// , BlogsTitle, BlogsClassify, BlogsDate, BlogsTimes, UsersID
// , '$BlogTitle','$BlogClassify', '$BlogDate', '$BlogTimes', $userID'
 ?>