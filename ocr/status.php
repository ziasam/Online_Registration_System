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
    
$t = $_POST['tid'];
$sql = "select * from transaction where s_id='".$_SESSION['id']."' and t_id='".$t."' limit 1";
$result = $con->query($sql);

$sql2 = "select approval from student where s_id='".$_SESSION['id']."'";
$result2 = $con->query($sql2);
$rw = mysqli_fetch_array($result2);
$ap = $rw['approval'];

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
	<a style="float: right;" href="lgt.php" class="button">Log Out</a>
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
	">Registration Status</h1>
		
	<?php

	if(mysqli_num_rows($result)==1){
		echo "<div style='text-align:center; color: MediumSeaGreen;'><h2>Payment Successful!<br><br></h2></div>";
	}
	else echo "<div style='text-align:center'><h2>Payment Unsuccessful!<br><br></h2></div>";
	
	if($ap == 2)
		echo "<div style='text-align:center; color: Yellow;'><h2>Advisor's Approval: Pending<br><br></h2></div>";
	else if($ap == 1)
		echo "<div style='text-align:center; color: MediumSeaGreen;'><h2>Advisor's Approval: Approved!<br><br></h2></div>";
	else if($ap == 0)
		echo "<div style='text-align:center'><h2>Advisor's Approval: Rejected!<br><br></h2></div>";
	
	?>

</body>
</html>