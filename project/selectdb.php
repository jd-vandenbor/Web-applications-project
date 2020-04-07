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
	$name =$_POST['name'];
	$selectsql = "SELECT name, country, continent FROM attractions WHERE name = '$name' ";
	$result = $conn->query($selectsql);

	echo "<table class=\"searchresults\"><tr><th>Name</th><th>Country</th><th>Continent</th><th>Raiting</th><th>Price</th></tr>";
	while($row = $result->fetch()) {
		echo "<tr><td><a href=\"".$row[1]['link']."\">".$row[1]['name']."</a> </td><td>".$row[1]['country']."</td><td>".$row[1]['continent']."</td><td>".$row[1]['rating']."</td><td>".$row[1]['price']."</td></tr>";
	}
	echo "</table>";
	echo"<br>";

}
catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>
