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
	">Registration Type</h1>
		
	<form 
		style="text-align:center; color: Chartreuse;
		action="/action_page.php" 
		target="_self" 
		method="post"
		>
			<select name="Catagory">
				<option value="Regular">Regular</option>
				<option value="Backlog">Backlog</option>
				<option value="Self Study">Self Study</option>
			</select> <br> <br>
			<input type="submit" value="Next">
		
	</form>
		
		
</body>
</html>