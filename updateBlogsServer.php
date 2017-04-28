<?php 
require_once 'dbfunc.php';

session_start();
$BlogTitle=$_POST['BlogTitle'];
$BlogClassify=$_POST['BlogClassify'];
$BlogContent=$_POST['BlogContent'];
$BlogDate = date('y-m-d', time());
$userID = $_SESSION['UserAccount'];
$BlogTimes = 0;
$BlogID=$_SESSION['BlogID'];
$conn = connectDB();
echo $BlogID;
$result = mysql_query("UPDATE T_Blogs SET BlogsTitle='$BlogTitle', BlogsContent='$BlogContent', BlogsClassify='$BlogClassify' WHERE BlogsID=$BlogID");
if (mysql_errno()) {
		echo mysql_error();
	}
header("Location:index.php?UserAccount=$userID");
 ?>