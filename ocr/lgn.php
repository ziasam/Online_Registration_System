<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "ocr";

$con = new mysqli($host ,$user, $password, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if(isset($_POST['id'])){
	$id = $_POST['id'];
	$ps = $_POST['psw'];
	
	$st = "select * from student where s_id='".$id."' and s_pass='".$ps."' limit 1";
	$am = "select * from admin where am_id='".$id."' and am_pass='".$ps."' limit 1";
	$av = "select * from advisor where av_id='".$id."' and av_pass='".$ps."' limit 1";
	
	$r_st = mysqli_query($con, $st);
	$r_am = mysqli_query($con, $am);
	$r_av = mysqli_query($con, $av);
	
	if(mysqli_num_rows($r_st)==1){
		session_start();
		$_SESSION['id'] = $id;
		header('location: courses.php');
	}
	else if(mysqli_num_rows($r_am)==1){
		session_start();
		$_SESSION['id'] = $id;
		header('location: admin.php');
	}
	else if(mysqli_num_rows($r_av)==1){
		session_start();
		$_SESSION['id'] = $id;
		header('location: advsr.php');
	}
	else{
		echo 
		'<span 
		style=
		"color: white;
		font-family: Copperplate Gothic Bold;
		font-size: 22px;
		text-align:center;">
		Incorrect ID or Password!
		</span>';
		//echo "<b>Incorrect ID or Password</b>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<style> 
input {
	font-size: 15px;
    width: 14%;
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

input:focus {
	width: 25%;
    border: 3px solid #555;
	background-color: MediumAquaMarine;
}
input[type=submit]{ 
	font-size: 20px;
	font-family: franklin gothic;
	padding: 5px 5px;
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
	">Online Course Registration</h1>
		
	<form 
		style="text-align:center; color: Chartreuse;"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
		target="_self" 
		method="post"
		>
		<fieldset>
			<legend><b>Login information:</b></legend>
			ID:<br>
			<input type="number" name="id" placeholder="Enter ID Number"><br>
			Password:<br>
			<input type="password" name="psw" placeholder="Enter Password"><br><br>
			<input type="submit" value="Log in">
		</fieldset>
	</form>
		
		
</body>
</html>