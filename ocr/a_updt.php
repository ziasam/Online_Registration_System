<?php

session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "ocr";

$con = new mysqli($host ,$user, $password, $db);

if ($con->connect_error) {
    die("Connection failed: ".$con->connect_error);
}



if(empty($_SESSION['id']))
    {
        header("Location: lgn.php");
        die("Redirecting to Login");
    }

$aid = $_GET['id'];
$bid = $_POST['aid'];
//echo "$aid";

//function renderForm($first = '', $last ='', $error = '', $id = '')  {}
/*if(empty($_SESSION['id']))
    {
        header("Location: lgn.php");
        die("Redirecting to Login");
    }
*/


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

.button {
    background-color: lightblue; 
    color: black; 
    padding: 6px 12px;
    border-radius: 8px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.button:hover {
    background-color: #f44336;
    color: white;
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
	"><?php if (($aid!= '')||($bid!='')) { echo "Update Advisor Data"; } else { echo "Add New Advisor Data"; } ?></h1>
	<br> <br>

	<form
		style="text-align:center; color: Chartreuse;"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
		target="_self" 
		method="POST"
		>
		ID:<br>
		<input type="number" name="aid"><br>
		Password:<br>
		<input type="text" name="aps"><br>
		Name:<br>
		<input type="text" name="anm"><br>
		Admin ID:<br>
		<input type="number" name="amid"><br>
		
		
		<input type="submit" name="sub" value="<?php if ($aid!= '') { echo "Update"; } else { echo "Add"; } ?>">
		
	</form>

	<?php
	
	if (isset($bid))
	{
	if (isset($_POST['sub']))
		{

			$a = $_POST['aps'];
			$b = $_POST['anm'];
			$c = $_POST['amid'];
		
			$sql= "UPDATE advisor SET av_pass='$a' WHERE av_id='$aid'";
			
			$result = $con->query($sql);

			header('location: admin.php');
		}
	}



	else 
	{
		if (isset($_POST['sub']))
		{
			$sql2= "insert into advisor values ('".$_POST['aid']."', '".$_POST['aps']."', '".$_POST['anm']."', '".$_POST['amid']."')";

			$rslt2= $con->query($sql2);
			header('location: admin.php');
		}
	}


	?>
	

</body>
</html>