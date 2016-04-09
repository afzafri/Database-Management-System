<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<link rel="stylesheet" type="text/css" href="./css/table.css">
<title>List Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>List Data</h1>
<p>Note : Click on the ID to view detailed data</p>

<?php

include 'config.php';

	
try
{
	
	//connect to database
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//select data from db
	$stmt = $conn->prepare("SELECT STUD_ID, STUD_NAME, STUD_COURSE FROM STUDENTS");
	
	//execute the sql query
	$stmt->execute();
    
	$i = 0;
	
	
	echo "<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 5px;
	}
	</style>";
	
	echo "<br><center>";
	echo "<table class='responstable'>";
	echo "<tr>";
	echo "	<th>No.</th>";
	echo "	<th>ID</th>";
	echo "	<th>Name</th>";
	echo "	<th>Course</th>";
	echo "</tr>";
	
	//use php function fetch() to get the db column data
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
        //use the fetched data to store into variable
		$ids = $row['STUD_ID'];
		$names = $row['STUD_NAME'];
		$kos = $row['STUD_COURSE'];
		
		echo "<tr>";
		echo "	<td>".($i+1)."</td>";
	 	echo "	<td><a href='search.php?id=$ids'>$ids</a></td>";
		echo "	<td>$names</td>";
		echo "	<td>$kos</td>";
		echo "</tr>";
		
		$i++;
	}
	
	
	echo "</tr></table></center>";
	
	
}	
catch (PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

//close conection
$conn = null;


?>

<br><br>
<div class="back-but">
<a href="home.php"><button type="button">Back</button></a><br>
</div>
</center>
</div>
</body>
</html>