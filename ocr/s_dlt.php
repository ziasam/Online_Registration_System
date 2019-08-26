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

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


session_start();

$sid = $_GET['id'];

$sql = "delete from student where s_id = '$sid' limit 1";
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


