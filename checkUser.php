<?php 
require_once 'dbfunc.php';

if (!isset($_POST['userAccount'])) {
	die("UserAccount is not found!");
}

if (!isset($_POST['userPwd'])) {
	die("UserPwd is not found!");
}

$UserAccount = $_POST['userAccount'];
$UserPwd = $_POST['userPwd'];
$errorNum = 155;
$conn = connectDB();
$result = mysql_query("SELECT UsersID,UsersPwd FROM T_Users WHERE UsersID=$UserAccount AND UsersPwd=$UserPwd");
$resArr = mysql_fetch_assoc($result);
if (empty($resArr)) {
	
	header("Location:signIn.php?errorNum=$errorNum");
}else{
	header("Location:index.php?UserAccount=$UserAccount");
}
 ?>