<html>
<head>
	<title>review test</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>
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
$_SESSION['currentattraction'] = "CN Tower";
if(isset($_SESSION['user'])){
	echo "<form action=\"addreview.php\" id=\"attr\" method=\"POST\">";
	echo"<label for=\"rating\">Your Rating:</label>
		<select id=\"rating\" name=\"rating\">
			<option value=\"0\">0</option>
			<option value=\"1\">1</option>
			<option value=\"2\">2<option>
			<option value=\"3\">3</option>
			<option value=\"4\">4</option>
			<option value=\"5\">5</option>
		</select>          
		<br>";
		echo"<textarea id=\"reviewtext\" name=\"reviewtext\" form=\"attr\" rows=\"4\" cols=\"50\">
Enter description here
		</textarea>
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"submit\">
                       
     </form>";
}else{echo "Login to leave a review!";}
try {
	$selectsql = "SELECT * FROM reviews WHERE attractionname = '".$_SESSION['currentattraction']."' ";
	$result = $conn->query($selectsql);

	echo "<table><tr><th>User Name</th><th>Rating</th><th>Review</th></tr>";

	while($row = $result->fetch()) {
		echo "<tr><td>".$row['username']."</td><td>".$row['rating']." ".$row['reviewtext']."</td></tr>";
	}
	echo "</table>";

}
catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
?>
<br>
<a href="home.php">back</a>
</body>

</html>
