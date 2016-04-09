<?php

//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_MEMBER_USER']);
unset($_SESSION['SESS_MEMBER_PASS']);

?>

<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<title>Database System</title>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>

<div class="logo"></div>

<div class="login-block">

<form action="index.php" method="post">
	<h1>Login</h1>
	<input type="text" value="" placeholder="Username" id="username" name="user"/>
    <input type="password" value="" placeholder="Password" id="password" name="pass" />
    <button>Submit</button>
 </form>

</div>

<?php

$user = (isset($_POST["user"]) ? $_POST["user"] : null);
$pass = (isset($_POST["pass"]) ? $_POST["pass"] : null);

include 'config.php';

if(isset($_POST["user"]) && isset($_POST["pass"]))
{

	try
	{
		//connect to db
		$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//sql query
		$stmt = $conn->prepare("SELECT ID, USERNAME, PASSWORD FROM LOGIN");

		//execute query
		$stmt->execute();

		//fetch
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		//store fetched data into variable
		$i = $result['ID'];
		$u = $result['USERNAME'];
		$p = $result['PASSWORD'];

		if($user == $u && $pass == $p)
		{
			session_regenerate_id();
			$_SESSION['SESS_MEMBER_ID'] = $i;
			$_SESSION['SESS_MEMBER_USER'] = $u;
			$_SESSION['SESS_MEMBER_PASS'] = $p;
			session_write_close();
			header("location: home.php");
			exit();
		}
		else
		{
			session_write_close();
			header("location: index.php");
			exit();
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed : " . $e->getMessage();
	}

	$conn = null;
}

?>

</body>
</html>
