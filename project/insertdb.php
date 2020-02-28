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
//insert student into data base
try{
	$name =$_POST['name'];
	$country =$_POST['country'];
	$continent =$_POST['continent'];
	$insertsql = "INSERT INTO attractions (name, country, continent) VALUES ('$name', '$country', '$continent')";
	$conn->query($insertsql);
	echo "Inserted '$name' successfully";
}
catch (PDOException $dbie){
	echo "insert failed". $dbie->getMessage();
		
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>
