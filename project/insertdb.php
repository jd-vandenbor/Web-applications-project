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
//insert into data base
try{
	$name =$_POST['name'];
	$country =$_POST['country'];
	$continent =$_POST['continent'];
	$price =$_POST['price'];
	$lat =$_POST['lat'];
	$longti =$_POST['longti'];
	$address =$_POST['address'];
	$description =$_POST['description'];
	$image =$_POST['imagefile'];
	$pagelink =$_POST['pagelink'];
	$insertsql = "INSERT INTO attractions (name, country, continent, price, lat, longti, address, description, image, link ) VALUES ('$name', '$country', '$continent', '$price', '$lat', '$longti', '$address', '$description', '$image', '$pagelink')";
	$conn->query($insertsql);
	echo "Inserted '$name' successfully $insertsql";
}
catch (PDOException $dbie){
	echo "insert failed". $dbie->getMessage();
		
}
echo "<br>";
echo "<a href=\"dbmaintain.php\">back</a>";
?>
