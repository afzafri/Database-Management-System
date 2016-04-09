<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Update Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Update Data</h1>
<form action="update.php" method="get">
<input type="text" value="" placeholder="ID" name="id">
<button>Search</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_GET["id"]))
{
	$ids = (isset($_GET['id']) ? $_GET['id'] : null);

	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//insert data into db
		$stmt = $conn->prepare("SELECT * FROM STUDENTS WHERE STUD_ID=?");

		//execute sql query
		$stmt->execute(array($ids));

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $id = $result['STUD_ID'];
  	$name = $result['STUD_NAME'];
  	$dob = $result['STUD_DOB'];
  	$phone = $result['STUD_PHONE'];
  	$ic = $result['STUD_IC'];
  	$course = $result['STUD_COURSE'];



		echo "
    <form action='update.php?id={$ids}' method='post'>
    <input disable type='text' placeholder='{$id}' name='id'>
    <input type='text' value='{$name}' placeholder='Name' name='name'>
    <input type='text' value='{$dob}' placeholder='Date of Birth (YYYY-MM-DD)' name='dob'>
    <input type='text' value='{$phone}' placeholder='Phone Number' name='phone'>
    <input type='text' value='{$ic}' placeholder='IC' name='ic'>
    <input type='text' value='{$course}' placeholder='Course' name='course'>
    <button name='update'>Update</button>
    </form>

    <form action='update.php?id={$ids}' method='post' enctype='multipart/form-data' >
    Choose an image to upload : <input type='file' name='fileToUpload' id='fileToUpload'>
    <button name='upimg'>Upload Image</button>
    </form>

    ";

    if(isset($_POST['update']))
    {
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$ic = $_POST['ic'];
		$course =$_POST['course'];
		
		  $stmt = $conn->prepare("UPDATE STUDENTS SET STUD_NAME=?, STUD_DOB=?, STUD_PHONE=?, STUD_IC=?,STUD_COURSE=?");
		  $stmt->execute(array($name,$dob,$phone,$ic,$course));
		  
      echo "<script>alert('Data updated.')</script>";
    }
	
	if(isset($_POST['upimg']))
	{
		//use image upload script
		include 'imgupdate.php';
	}


	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

	//close conection
	$conn = null;

	

echo "

<br><br>

<div class='back-but'>
<a href='search.php?id={$ids}'><button type='button'>Back</button></a><br>
</div>


";	
	
	
}


?>


</center>
</div>
</body>
</html>
