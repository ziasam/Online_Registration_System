<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "ocr";

mysql_connect($host ,$user, $password):
mysql_select_db($db);

if(isset($_POST['id'])){
	$sid = $_POST['id'];
	$sps = $_POST['psw'];
	
	$sql = "select * from student where s_id='".$sid."' and s_pass='".$sps."' limit 1";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)==1){
		echo "Login Success";
		exit();
	}
	else{
		echo "Incorrect";
		exit();
	}
}
?>
