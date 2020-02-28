<?php
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
	$name =$_POST['name'];
	
	$deletesql = "DELETE FROM attractions WHERE name = '$name'";
	$conn->query($deletesql);
	echo "the attraction: $name , has been removed";
}
catch(PDOException $dbde){
	echo "Could not delete entry: ". $dbde->getMessage();
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>
