<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Delete Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Delete Data</h1>
<form action="delete.php" method="get">
<input type="text" value="" placeholder="ID" name="ids">
<button>Delete</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_GET["ids"]))
{
	
	$ids = (isset($_GET["ids"]) ? $_GET["ids"] : null);
	
	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//delete data from db
		$stmt = $conn->prepare("DELETE FROM STUDENTS WHERE STUD_ID=?  ");
		
		//execute the sql query
		$stmt->execute(array($ids));
		echo "<script>alert('Success! Data Deleted.')</script>";
		
		
	}	
	catch (PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

	//close conection
	$conn = null;
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