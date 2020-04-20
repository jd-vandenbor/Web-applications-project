<html>
<head>
	<title>Search Results</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>
<body>
<a href="home.php">Home</a>
<br>
<?php
//<form  method="post" acti$on="search.php?go"  id="searchform"> 
//      <input  type="text" name="name"> 
//	     <input  type="submit" name="submit" value="search"> 
//</form>
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
	$selectsql = "SELECT *  FROM attractions ";//WHERE name LIKE '%$name%' ";
	$result = $conn->query($selectsql);
	$attractions = array();
	$scores = array();
	$numofattractions = $result->rowCount();
	while($row = $result->fetch()){
		$attractions[] = $row;
		$scores[] = 0;
	}		
	if(isset($_POST['maxprice'])){
		for($i = 0; $i < $numofattractions; $i += 1){
				if($_POST['maxprice'] == 0){$scores[$i] = 1;continue;}
				if(($attractions[$i]['price'] - floatval($_POST['maxprice']))>  0){
					$scores[$i] = -20;
			}
		}
	}
		if(isset($_POST['name'])){
		for($i = 0; $i < $numofattractions; $i += 1){
			if(!empty($_POST['name'])&&strpos(strtolower($attractions[$i]['name']), strtolower($_POST['name']),0)!== false ){
				$scores[$i]+= 5;
			}elseif(strlen($_POST['name']) < 1){
				$scores[$i] += 1;
			}else{$scores[$i] -= 1;}
		}
	}
	//echo"??".$_POST['name']."??";
	if(isset($_POST['continent'])){
		for($i = 0; $i < $numofattractions; $i += 1){
			if($attractions[$i]['continent'] == $_POST['continent']){
				$scores[$i]+= 1;
			}
		}
	}
	if(isset($_POST['country'])){
		for($i = 0; $i < $numofattractions; $i += 1){
			if(!empty($_POST['country'])&&strpos(strtolower($attractions[$i]['country']),strtolower($_POST['country'])) !== false){
				$scores[$i]+= 5;
			}
		}
	} 
	for($i = 0; $i < $numofattractions; $i += 1){
		if($scores[$i] >= 1)
			$scores[$i]+= floatval($attractions[$i]['rating']);
	}
	$combined = array();
	for($i = 0; $i < $numofattractions; $i += 1){
			if($scores[$i] <= 0){
				unset($attractions[$i]);
				unset($scores[$i]);
			}else{
				$combined[]= array($scores[$i], $attractions[$i]);
			}
	}
	usort($combined, function($a, $b){
		return $b[0] - $a[0];
	} );
	if(isset($_SESSION['attractionA']))$attrA = $_SESSION['attractionA'];
	else $attrA ="-";
	if(isset($_SESSION['attractionB']))$attrB = $_SESSION['attractionB'];
	else $attrB ="-";
	
	echo "<table class=\"searchresults\"><tr><th>Name</th><th>Country</th><th>Continent</th><th>Raiting</th><th>Price</th></tr>";
	foreach($combined as $row) {

		if( ($attrA!= $row[1]['name']&&$attrB != $row[1]['name'])&&($attrA == "-"|| $attrB == "-")){
			$compare = "<a href=\"addcompareattr.php?name=".$row[1]['name']."&mode=add\">Add<a>";
		}else{
			$compare = "<a href=\"addcompareattr.php?name=".$row[1]['name']."&mode=remove\">Remove<a>";
		}
		echo "<tr><td><a href=\"".$row[1]['link']."\">".$row[1]['name']."</a> </td><td>".$row[1]['country']."</td><td>".$row[1]['continent']."</td><td>".$row[1]['rating']."</td><td>".$row[1]['price']."</td><td>".$compare."</td></tr>";
	}
	echo "</table>";
	echo"<br>";
	echo"<a href=\"advsearch.php\">back</a> <br>";
}catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
?>
<a href="comparison.php">Compare Attractions</a>
<br>
</body>
</html>
