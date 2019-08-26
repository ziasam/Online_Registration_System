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

?>

<!DOCTYPE html>
<html>
<head>
<style> 
input, select {
	font-size: 15px;
    width: 25%;
	padding: 8px 20px;
    margin: 2px 0;
    border: 3px solid gray;
	border-radius: 12px;
	border-bottom: 2px solid blue;
	background-color: #3CBC8D;
    color: black;
	-webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

select:focus {
	width: 25%;
    border: 3px solid #555;
	background-color: MediumAquaMarine;
}
input[type=submit]{ 
	font-size: 20px;
	font-family: franklin gothic;
	padding: 5px 5px;
	border: 3px solid gray;
	border-radius: 12px;
	width: 8%;
	background-color: blue;
	-webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	cursor: pointer;
} 
input:focus[type=submit]{
	width: 16%;
    border: 3px solid #555;
	background-color: LightSeaGreen;
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 10%;
}
</style>
</head>
<body style="background-color:darkred;">
	<img src="CUET_logo.png" alt="cuet logo" width="104" height="142"> 
	<h1 style="
				text-align:center; 
				border:5px solid black; 
				border-radius: 8px;
				padding: 12px; 
				margin: 50px;
				font-size:40px; 
				font-family:impact;
				color:lightblue; 
	">Registration Fee</h1>

	<h3 style="text-align:center;">Account No.: 1234567890<br>Pay through Rocket (DBBL Mobile Banking)</h3>
		
	<form 
		style="text-align: center; color: Chartreuse;"
		action="status.php" 
		target="_self" 
		method="post"
		>
			<br> <br>
			Transaction ID:<br>
			<input type="number" name="tid" placeholder="Enter Transaction ID"><br><br>
			<input type="submit" value="Send">
		
	</form>
		
		
</body>
</html>