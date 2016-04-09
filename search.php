<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<link rel="stylesheet" type="text/css" href="./css/table.css">
<title>Search Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Search Data</h1>
<form action="search.php" method="get">
<input type="text" value="" placeholder="ID" name="id">
<button>Search</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_GET["id"]))
{
	$id = (isset($_GET["id"]) ? $_GET["id"] : null);

	try
	{

		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//select data from db
		$stmt = $conn->prepare("SELECT STUD_ID, STUD_NAME, DATE_FORMAT(STUD_DOB,'%d-%m-%Y') AS DATE,
											 (YEAR(CURDATE()) - YEAR(STUD_DOB)) AS AGE, STUD_PHONE, STUD_IC, STUD_COURSE FROM STUDENTS  WHERE STUD_ID=?  ");

		//execute the sql query
		$stmt->execute(array($id));

		//function fetcht() used to get the column data
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//fetch data in db and store into variable
		$ids = $row['STUD_ID'];
		$namas = $row['STUD_NAME'];
		$lahir = $row['DATE'];
		$umur = $row['AGE'];
		$telepon = $row['STUD_PHONE'];
		$nokp = $row['STUD_IC'];
		$kos = $row['STUD_COURSE'];

		//use ic checker code
		include 'icchecker.php';

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

		echo "<div class='imgBorder'>";
		if(file_exists("./images/userimg/".$ids.".jpg"))
		{
			echo "<img width=150px height=150px src='./images/userimg/".$ids.".jpg'></img>";
		}
		else
		{
			echo "<img width=150px height=150px src='./images/userimg/noimage.jpg'></img>";
		}

		echo "</div>";

		echo "<table class='responstable'>";

		echo "<tr>";
		echo "	<th>ID</th>";
		echo "	<td>$ids</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Name</th>";
		echo "	<td>$namas</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Date of Birth</th>";
		echo "	<td>$lahir</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Age</th>";
		echo "	<td>$umur</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Gender</th>";
		echo "	<td>$jantina</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Phone Number</th>";
		echo "	<td>$telepon</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>IC</th>";
		echo "	<td>$nokp</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>State</th>";
		echo "	<td>$statename</td>";
		echo "</tr>";
		echo "<tr>";
		echo "	<th>Course</th>";
		echo "	<td>$kos</td>";
		echo "</tr>";

		echo "</table></center>";

	}
	catch (PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

	//close conection
	$conn = null;
	
	
	echo "
<br>
<a href='update.php?id={$id}''><button type='button'>Update Data</button></a><br>
";
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
