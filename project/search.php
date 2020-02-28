<?php
//<form  method="post" action="search.php?go"  id="searchform"> 
//      <input  type="text" name="name"> 
//	     <input  type="submit" name="submit" value="search"> 
//</form>

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
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
	$selectsql = "SELECT name, country, continent FROM attractions WHERE name LIKE '%$name%' ";
	$result = $conn->query($selectsql);

	echo "<table class=\"searchresults\"><tr><th>Name</th><th>Country</th><th>Continent</th></tr>";
	while($row = $result->fetch()) {
		echo "<tr><td>".$row['name']."</td><td>".$row['country']." ".$row['continent']."</td></tr>";
	}
	echo "</table>";
	echo"<br>";
	echo"<a href=\"home.php\">back</a>";

}
catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
	
}
}

?>