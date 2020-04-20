<html>
<head>
	<title>Compare Attractions</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>
<?php
session_start();
$servername = "localhost";
$username = "name";
$password = "cps630cps";
$dbname = "places";
function distance($lat1, $longti1, $lat2, $longti2){
	$earthRadius = 6371; //in KM
	$deltaLat = deg2rad($lat2-$lat1);
	$deltaLon = deg2rad($longti2-$longti1);
	$a = sin($deltaLat/2) * sin($deltaLat/2) +
    cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
    sin($deltaLon/2) * sin($deltaLon/2); 
	$c = 2 * atan2(sqrt($a),sqrt(1-$a));
	$dis = $earthRadius * $c; 
	return round($dis, 2);
}
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
	if(isset($_SESSION['attractionA'])){
		$attraction1 = $_SESSION['attractionA'];
		$selectsql = "SELECT * FROM attractions WHERE name = '$attraction1'";
		$result1 = $conn->query($selectsql);
		$row1 = $result1->fetch();

	}
	if(isset($_SESSION['attractionB'])){
		$attraction2 = $_SESSION['attractionB'];
		$selectsql = "SELECT * FROM attractions WHERE name = '$attraction2'";
		$result2 = $conn->query($selectsql);
		$row2 = $result2->fetch();
	}
	echo "<table class=\"searchresults\"><tr><th>Name</th><th>Country</th><th>Continent</th><th>Raiting</th><th>Price</th></tr>";
	
	if(isset($row1)) {
		echo "<tr><td><a href=\"".$row1['link']."\">".$row1['name']."</a> </td><td>".$row1['country']."</td><td>".$row1['continent']."</td><td>".$row1['rating']."</td><td>".$row1['price']."</td><td>"."<a href=\"addcompareattr.php?name=".$row1['name']."&mode=remove\">Remove<a>"."</td></tr>";
	}
	if(isset($row2)) {
		echo "<tr><td><a href=\"".$row2['link']."\">".$row2['name']."</a> </td><td>".$row2['country']."</td><td>".$row2['continent']."</td><td>".$row2['rating']."</td><td>".$row2['price']."</td><td>"."<a href=\"addcompareattr.php?name=".$row2['name']."&mode=remove\">Remove<a>"."</td></tr>";
	}
	echo"</table>";
	if(isset($_SESSION['attractionA']) && isset($_SESSION['attractionB'])){
		echo "distance between these two attractions: ".distance(floatval($row1['lat']),floatval($row1['longti']),floatval($row2['lat']),floatval($row2['longti']))." KM";
	}
	
}catch (PDOException $dbse){
	echo "Failed to load attractions: ". $dbse->getMessage();
}
echo"<br>";
echo "<a href=\"advsearch.php\">Add an Attraction<a>";

?>
<br>
<a href="home.php">Home</a>
</body>
</html>
