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
		if(!isset($_POST['name']) || !isset($_POST['username']) || !isset($_POST['address']) || !isset($_POST['password']) || !isset($_POST['email']) || !isset($_POST['phonenum'])){die("Missing parameters"); }
			
		
		$name =$_POST['name'];
		$user =$_POST['username'];
		$address =$_POST['address'];
		$newuserpassword =$_POST['password'];
		$email = $_POST['email'];
		$phonenum =$_POST['phonenum']; 
		$hash = password_hash($newuserpassword, PASSWORD_DEFAULT);
		
		$insertsql = "INSERT INTO users (name, username, password, address, phone, email) VALUES ('$name', '$user', '$hash','$address', '$phonenum', '$email')";
		
		$conn->query($insertsql);
		echo "Your account has been added!";
	}
	catch (PDOException $dbie){
	echo "insert failed". $dbie->getMessage();
		
	}
	echo "<br>";
	echo "<a href=\"home.php\">Home</a>";
?>