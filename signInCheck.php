<?php 
require_once 'dbfunc.php';

$UserAccount = $_POST['UserAccount'];
$UserPwd = $_POST['UserPwd'];

$conn = connectDB();
$result = mysql_query("SELECT UsersPwd FROM T_Users WHERE UsersAccount=$UserAccount");
$resArr = mysql_fetch_assoc($result);
echo $UserAccount;
$errorNum = 156;
if ($UserPwd == $resArr['UsersPwd']) {
	header("Location:index.php?UserAccount=$UserAccount");
}else{
	header("Location:signIn.php?errorNum=$errorNum");
}

 ?>