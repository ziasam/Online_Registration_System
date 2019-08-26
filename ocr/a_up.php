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

$aid = $_POST['aid'];

?>

<!DOCTYPE html>
<html>
<style> 
input, select {
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
	">Update Advisor Data</h1>
	<br> <br>

	<form
		style="text-align:center; color: Chartreuse;"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
		target="_self" 
		method="POST"
		>
		ID: <?php echo $aid;?><br><br>
		<input type="number" name="aid"><br>
		Password:<br>
		<input type="text" name="aps"><br>
		Name:<br>
		<input type="text" name="anm"><br>
		Admin ID:<br>
		<input type="number" name="amid"><br>
		
		<input type="submit" name="sub" value="Update">
		
	</form>

	<?php
	
	if (isset($_POST['sub']))
		{

			$a = $_POST['aps'];
			$b = $_POST['anm'];
			$c = $_POST['amid'];
		
			$sql= "UPDATE advisor SET av_pass='$a', av_name = '$b', am_id = '$c' WHERE av_id='$aid'";
			
			$result = $con->query($sql);

			header('location: admin.php');
		}
	


	?>
	

</body>
</html>