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
try{
	$attractionname =$_SESSION['currentattraction'];
	unset($_SESSION['currentattraction']);
	$username =$_SESSION['user'];
	$rating =$_POST['rating'];
	$reviewtext = $_POST['reviewtext'];
	$insertsql = "INSERT INTO reviews (attractionname, username, rating, reviewtext) VALUES('$attractionname', '$username', '$rating', '$reviewtext');";
	$conn->query($insertsql);
	//echo "Inserted '$attractionname' successfully $insertsql";
	header('Location: readmore.php?attraction='.$attractionname);
}
catch (PDOException $dbie){
	echo "insert failed". $dbie->getMessage();
		
}
?>
