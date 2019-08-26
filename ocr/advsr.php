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

$sql = "select * from student where av_id='".$_SESSION['id']."'";
$result = $con->query($sql);

?>


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
	">Advisor's Homepage</h1>
		
	<h3 style="text-align:center;color:yellow;font-size:25px;">My Students</h3>
	<br>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Mobile No.</th>
				<th>Father</th>
				<th>Mobile No.</th>
				<th>Mother</th>
				<th>Address</th>
				<th>Hall</th>
				<th>Grade</th>
				<th colspan="2">Approval</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($result))
		{
			$sid = $row['s_id'];
			echo '<tr>
					<td>'.$row['s_id'].'</td>
					<td>'.$row['s_name'].'</td>
					<td>'.$row['mail'].'</td>
					<td>'.$row['s_mobile'].'</td>
					<td>'.$row['f_name'].'</td>
					<td>'.$row['f_mobile'].'</td>
					<td>'.$row['m_name'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['hall'].'</td>
					<td>'.$row['grade'].'</td>
					<td>
						<form
						action="apprvl.php"
						target="_self" 
						method="post"
						>
						<input type="hidden" name="sid" value="'.$sid.'">
						<input type="submit" value="Approve" name="apprvl">
						
						</form>
					</td>
					<td>
						<form
						action="apprvl.php"
						target="_self" 
						method="post"
						>
						<input type="hidden" name="sid" value="'.$sid.'">
						<input type="submit" value="Reject" name="apprvl">

						</form>
					</td>
				</tr>';
		}
		?>
		</tbody>
	</table>
	<br> <br>

	

 


</body>
</html>
