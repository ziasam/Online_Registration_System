<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "ocr";

$con = new mysqli($host ,$user, $password, $db);

session_start();

if(empty($_SESSION['id']))
    {
        header("Location: lgn.php");
        die("Redirecting to Login");
    }

if ($_POST['apprvl']=='Approve')
	$aprv = 1;
else if($_POST['apprvl']=='Reject')
	$aprv = 0;
//else $aprv = 2;

/*if(isset($_POST['sid'])){
$sids = $_POST['sid'];
}

if(!isset($_POST['sid'])){
echo 'no vl';
}*/
$sid = $_POST['sid'];
//echo $aprv;
//echo $sids;
$sql2 = "UPDATE student SET approval = '$aprv' where s_id = '$sid'";
$result2 = $con->query($sql2);

header('location: advsr.php');

?>