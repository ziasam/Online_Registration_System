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

$result = $con->query("select * from student");

$result2 = $con->query("select * from advisor");

?>


<!DOCTYPE html>
<html>
<head>
<style>
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

.button {
    background-color: lightblue; 
    color: black; 
    padding: 6px 12px;
    border-radius: 8px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.button1 {
    background-color: lightblue; 
    color: black; 
    padding: 4px 7px;
    border-radius: 8px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.button2 {
    background-color: lightblue; 
    color: black; 
    padding: 3px 6px;
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
	">Admin's Homepage</h1>
		
	<h3 style="text-align:center;color:yellow;font-size:25px;">Students' Database</h3>

	<br>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Password</th>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Mobile No.</th>
				<th>Father</th>
				<th>Mobile No.</th>
				<th>Mother</th>
				<th>Address</th>
				<th>Hall</th>
				<th>Seat</th>
				<th>Grade</th>
				<th>Advisor ID</th>
				<th>Admin ID</th>
				<th>Approval</th>
				<th>Update</th>
				<th>Delete</th>				
				
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					<td>'.$row['s_id'].'</td>
					<td>'.$row['s_pass'].'</td>
					<td>'.$row['s_name'].'</td>
					<td>'.$row['mail'].'</td>
					<td>'.$row['s_mobile'].'</td>
					<td>'.$row['f_name'].'</td>
					<td>'.$row['f_mobile'].'</td>
					<td>'.$row['m_name'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['hall'].'</td>
					<td>'.$row['h_type'].'</td>
					<td>'.$row['grade'].'</td>
					<td>'.$row['av_id'].'</td>
					<td>'.$row['am_id'].'</td>
					<td>'.$row['approval'].'</td>
					<td>
						<form
						action="s_up.php"
						target="_self" 
						method="POST"
						>
						<input type="hidden" name="sid" value="'.$row['s_id'].'">
						<input type="submit" class="button button2" value="Update" name="ups">

						</form>
					</td>
					<td><a class="button button1" href="s_dlt.php?id='.$row['s_id'].'">Delete</a></td>
					
					
				</tr>';
		}
		?>
		</tbody>
	</table>
	<br>

	<a style="float:right" class="button button1" href="s_nw.php">Add New Student Data</a>

	<br><br>

	<h3 style="text-align:center;color:yellow;font-size:25px;">Advisors' Database</h3>

	<br>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Password</th>
				<th>Name</th>
				<th>Admin ID</th>
				<th>Update</th>
				<th>Delete</th>

			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($result2))
		{
			$avid = $row['av_id'];
			echo '<tr>
					<td>'.$row['av_id'].'</td>
					<td>'.$row['av_pass'].'</td>
					<td>'.$row['av_name'].'</td>
					<td>'.$row['am_id'].'</td>
					<td>
						<form
						action="a_up.php"
						target="_self" 
						method="POST"
						>
						<input type="hidden" name="aid" value="'.$avid.'">
						<input type="submit" class="button button2" value="Update" name="upa">

						</form>
					</td>
					<td><a class="button button2" href="a_dlt.php?id='.$avid.'">Delete</a></td>
				</tr>';
				//<td><a class="button button2" href="a_updt.php?id='.$avid.'">Update</a></td>
					
		}
		?>
		</tbody>
	</table>
	<br>

	<a style="float:right" class="button button1" href="a_nw.php">Add New Advisor Data</a>

	<br><br>
		
</body>
</html>
