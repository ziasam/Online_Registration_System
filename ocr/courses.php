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
if(isset($_POST['Catagory']))
{
	$ctg = $_POST['Catagory'];
}
else $ctg = null;

$sql = "select * from course where sem = '$ctg'";
$result = $con->query($sql);

$htyp = "select h_type from student where s_id='".$_SESSION['id']."'";
$r_htyp = $con->query($htyp);
$rw = mysqli_fetch_array($r_htyp);
$htp = $rw['h_type'];

if($htp == 'Allotted') {
	$sql2 = "select h_fee+s_fee from fee where sem = '$ctg'";
	$result2 = $con->query($sql2);
}
else {
	$sql2 = "select s_fee from fee where sem = '$ctg'";
	$result2 = $con->query($sql2);
}

if(isset($_POST['pay']))
	header('location: reg_fee.php');

?>

<!DOCTYPE html>
<html>
<head>
<style> 
select {
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

table {
	width:75%;
	margin: auto;
	border: 1px solid black;
	border-collapse: collapse;
	
}

th {
	text-align: center;
	border: 1px solid black;
	border-collapse: collapse;
	padding: 5px;
	background-color: #4CAF50;
    color: white;
}

td {
	text-align: center;
	border: 1px solid black;
	border-collapse: collapse;
	padding: 5px;
	color: silver;
}

tr:hover {background-color:brown;}

#f {
	text-align:center;
	font-size:25px;
	font-weight: bold;
	color: LightSeaGreen;
	-webkit-animation: mymove 5s infinite;
}
@-webkit-keyframes mymove {
    50% {color: white;}
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
	">Courses</h1>
		
	<form 
		style="text-align:center; color: Chartreuse;
		action="" 
		target="_self" 
		method="post"
		>
			<select name="Catagory">
				<option value="1">L-1, T-I</option>
				<option value="2">L-1, T-II</option>
				<option value="3">L-2, T-I</option>
				<option value="4">L-2, T-II</option>
				<option value="5">L-3, T-I</option>
				<option value="6">L-3, T-II</option>
				<option value="7">L-4, T-I</option>
				<option value="8">L-4, T-II</option>
			</select> <br> <br>
			<input type="submit" value="Next">
		
	</form>
	<br> <br>

	<table>
		<thead>
			<tr>
				<th>Course No.</th>
				<th>Course Name</th>
				<th>Credit</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					<td>'.$row['c_no'].'</td>
					<td>'.$row['c_name'].'</td>
					<td>'.$row['credit'].'</td>
				</tr>';
		}
		?>
		</tbody>
	</table>
	<br> <br>

	<h2 style="
				text-align:center; 
				border:5px solid black; 
				border-radius: 8px;
				padding: 12px; 
				margin: 50px;
				font-size:40px; 
				font-family:impact;
				color:lightblue; 
	">Fees</h2>
	<div id="f"
		<p>Total fee = <?php 
			$row= mysqli_fetch_row($result2);
			$fee= $row[0];
			echo $fee;
		?> TK
		</p>
	</div>
	

	<form 
		style="text-align:center; color: Chartreuse;"
		action="reg_fee.php" 
		target="_self" 
		method="post"
		>
		<input type="hidden" name="pay"> 
		<input type="submit" value="Pay">
	</form>


</body>
</html>