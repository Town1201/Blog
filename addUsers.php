<?php 
require_once 'dbfunc.php';

$UserAccount = $_POST['UserAccount'];
$UserName = $_POST['UserName'];
$UserPwd = $_POST['UserPwd'];
$UserSex = $_POST['UserSex'];
$UserPhone = $_POST['UserPhone'];
$UserAge = $_POST['UserAge'];
$UserMail = $_POST['UserMail'];

$conn = connectDB();
$result = mysql_query("INSERT INTO T_Users(UsersAccount, UsersName, UsersPwd, UsersSex, UsersPhone, UsersAge, UsersMail) 
	VALUES ('$UserAccount', '$UserName', '$UserPwd', '$UserSex', '$UserPhone', '$UserAge', '$UserMail')");
header("Location:index.php?UserAccount=$UserAccount");
 ?>