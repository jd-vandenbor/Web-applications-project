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
		$username =$_POST['username'];
		$enteredpassword =$_POST['password'];
		$selectsql = "SELECT password FROM users WHERE username = '$username' ";
		$result = $conn->query($selectsql);
		
		if($result->rowCount()){
			$userinfo = $result->fetch();
			if(password_verify($enteredpassword, $userinfo['password'])){
				$_SESSION['user'] = $username;
				echo "Welcome back $username";
			} else {
				echo "Incorrect password <br>";
				echo "hash = ".$hash.", password = ".$userinfo['password'];
			}

			
		} else echo "Username not found";
		echo"<br>";
		echo"<a href=\"home.php\">Home</a>";
	}
	catch (PDOException $dbse){
		echo "Select failed". $dbse->getMessage();
	}
?>