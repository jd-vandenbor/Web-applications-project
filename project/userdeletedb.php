<?php
session_start();
$servername = "localhost";
$username = "name";
$password = "cps630cps";
$dbname = "places";

//start MYSQL
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected";
}
catch (PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}
try {
	$name =$_POST['username'];
	
	$deletesql = "DELETE FROM users WHERE username = '$name'";
	$conn->query($deletesql);
	echo "The User: $name , has been removed";
}
catch(PDOException $dbde){
	echo "Could not delete entry: ". $dbde->getMessage();
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>