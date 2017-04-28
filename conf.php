<?php 

require_once 'config.php';

function connectDB(){
	$conn = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
	if (!$conn) {
		die("DB is not found or it's empty");
	}
	mysql_select_db("blog");
	return $conn;
}
?>