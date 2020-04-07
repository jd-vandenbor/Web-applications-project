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
				if($_POST['maxprice'] == 0){$scores[$i] = 0;continue;}
				if(($attractions[$i]['price'] - floatval($_POST['maxprice']))>  0){
					$scores[$i] = -20;
			}
		}
	}
	//$numofattractions = $attractions->count();

		if(isset($_POST['name'])){
		for($i = 0; $i < $numofattractions; $i += 1){
			if(!empty($_POST['name'])&&strpos(strtolower($attractions[$i]['name']), strtolower($_POST['name']),0)!== false ){
				$scores[$i]+= 5;
			}
		}
	}
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
	
	
	echo "<table class=\"searchresults\"><tr><th>Name</th><th>Country</th><th>Continent</th><th>Raiting</th><th>Price</th></tr>";
	foreach($combined as $row) {
		echo "<tr><td><a href=\"".$row[1]['link']."\">".$row[1]['name']."</a> </td><td>".$row[1]['country']."</td><td>".$row[1]['continent']."</td><td>".$row[1]['rating']."</td><td>".$row[1]['price']."</td></tr>";
	}
	echo "</table>";
	echo"<br>";
	echo"<a href=\"advsearch.php\">back</a>";
}catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}
?>
