<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "ocr";

$con = new mysqli($host ,$user, $password, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

session_start();

if(empty($_SESSION['id']))
    {
        header("Location: lgn.php");
        die("Redirecting to Login");
    }


$aid = $_GET['id'];

$sql = "delete from advisor where av_id = '$aid' limit 1";
$rslt = $con->query($sql);

header('location: admin.php');

//function renderForm($first = '', $last ='', $error = '', $id = '')  {}
/*if(empty($_SESSION['id']))
    {
        header("Location: lgn.php");
        die("Redirecting to Login");
    }
*/


?>


