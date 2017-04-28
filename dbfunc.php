<?php 
error_reporting(E_ALL^E_NOTICE^E_WARNING);
error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);
require_once 'config.php';

function connectDB(){
	$conn = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
	if (!$conn) {
		die("DB is not found or it's empty");
	}
	mysql_select_db("blog");
	//console.log("123");
	return $conn;
}
?>