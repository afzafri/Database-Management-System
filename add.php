<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Add Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Add Data</h1>
<form action="add.php" method="post" enctype="multipart/form-data" >
<input type="text" value="" placeholder="ID" name="id">
<input type="text" value="" placeholder="Name" name="name">
<input type="text" value="" placeholder="Date of Birth (YYYY-MM-DD)" name="dob">
<input type="text" value="" placeholder="Phone Number" name="phone">
<input type="text" value="" placeholder="IC" name="ic">
<input type="text" value="" placeholder="Course" name="course">
Choose an image to upload : <input type="file" name="fileToUpload" id="fileToUpload">
 <button>Submit</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["dob"]) && isset($_POST["phone"]) && isset($_POST["ic"]) && isset($_POST["course"]))
{
	$id = (isset($_POST["id"]) ? $_POST["id"] : null);
	$name = (isset($_POST["name"]) ? $_POST["name"] : null);
	$dob = (isset($_POST["dob"]) ? $_POST["dob"] : null);
	$phone = (isset($_POST["phone"]) ? $_POST["phone"] : null);
	$ic = (isset($_POST["ic"]) ? $_POST["ic"] : null);
	$course = (isset($_POST["course"]) ? $_POST["course"] : null);

	
	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//insert data into db
		$stmt = $conn->prepare("INSERT INTO STUDENTS VALUES(? , ? , ?, ? , ? , ? );");
		
		//execute sql query
		$stmt->execute(array($id,$name,$dob,$phone,$ic,$course));
		
		
		
		echo "<script>alert('Success! Data Inserted.')</script>";
		
		
		
		
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

	//close conection
	$conn = null;
	
	//use image upload script
	include 'imgup.php';
	
}




?>

<br><br>

<div class="back-but">
<a href="home.php"><button type="button">Back</button></a><br>
</div>
</center>
</div>
</body>
</html>