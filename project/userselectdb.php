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
	$user =$_POST['username'];
	$selectsql = "SELECT username, name, address, phone, email FROM users WHERE username = '$user' ";
	$result = $conn->query($selectsql);

	echo "<table><tr><th>Username</th><th>Name</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>";

	while($row = $result->fetch()) {
		echo "<tr><td>".$row['username']."</td><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['phone']."</td><td>".$row['email']."</td></tr>";
	}
	echo "</table>";

}
catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>