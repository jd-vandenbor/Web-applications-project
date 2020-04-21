<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./home.css">
<style>

</style>
</head>

<!-- PHP -->
<?php
$servername = "localhost";
$username = "name";
$password = "cps630cps";
$dbname = "places";

session_start();
$_SESSION['id'] = 1;


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die ("Connection Failed"); }


try {

  $continents = array();
  array_push($continents, 'Africa');
  array_push($continents, 'America');
  array_push($continents, 'Asia');
  array_push($continents, 'Europe');
  array_push($continents, 'Oceania');

  $continentsArray = array();
  foreach ($continents as $continent) {

    $SQLstatement = "SELECT name FROM country WHERE continent = '$continent'";
    $rows = [];
    $result = mysqli_query($conn, $SQLstatement);
    $countrylist = array(); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        array_push($countrylist, $row);
      }
    }

    $continentsArray[$continent] = $countrylist;

    $count = 0;
    foreach($countrylist as $country){
      $country = $country['name'];
      //print_r( $country);
      $SQLstatementAttractions = "SELECT * FROM attractions WHERE country = '$country'";
      $rows2 = [];
      $result2 = mysqli_query($conn, $SQLstatementAttractions);
      $attractionslist = array();
      if (mysqli_num_rows($result2) > 0) {
        while($rows2 = mysqli_fetch_assoc($result2)){
          array_push($attractionslist, $rows2);
          //print_r($rows2);
        }
      }

      $continentsArray[$continent][$count]['attractions'] =  $attractionslist;   
      $count +=1;
    }

  }

}
catch (PDOException $dbse){
	echo "Select failed". $dbse->getMessage();
}

?>
<script type='text/javascript'>
<?php
$js_array = json_encode($continentsArray);
echo "var javascript_array = ". $js_array . ";\n";
?>

var Countryindex = sessionStorage.getItem("Countryindex");
var continent = sessionStorage.getItem("continent");
var attractionIndex = sessionStorage.getItem("attractionIndex");

name = javascript_array[continent][Countryindex]['attractions'][attractionIndex]['name'];

</script>



<body>

<h1 id="title"> </h1>
<a href="shoppingcart.php" >shopping cart</a>
<hr>
<img id="atrimg" style="width:50%" class="attractin-img" src="">
<p id="description" style="float: left;">This Attraction is a 553.3 m-high (1,815.3 ft) area. [5][8] Built on the former Railway Lands, it was completed in 1976. Its name originally referred to its countries National emblem, the railway company that built the tower before it. Following the railway's decision to divest non-core freight railway assets prior to the company's privatization in 1995, it transferred the tower to the Canada Lands Company, a federal Crown corporation responsible for real estate development.
The CN Tower held the record for the world's tallest free-standing structure for 32 years until 2007 when it was surpassed by the Burj Khalifa and was the world's tallest tower until 2009 when it was surpassed by the Canton Tower.[9][10][11][12] It is now the ninth tallest free-standing structure in the world and remains the tallest free-standing structure on land in the Western Hemisphere. In 1995, the CN Tower was declared one of the modern Seven Wonders of the World by the American Society of Civil Engineers. It also belongs to the World Federation of Great Towers.[13][14][7]</p>
<hr>
<h3>Related places:</h3>

<img id="atrimg2" style="width:30%" class="attractin-img" src="">
<img id="atrimg3" style="width:30%" class="attractin-img" src="">
<img id="atrimg4" style="width:30%" class="attractin-img" src="">
</body>

<script>
    var title = document.getElementById("title");

    attraction2 = javascript_array[continent][Countryindex]['attractions'][attractionIndex];
    title.innerHTML = attraction2['name'];

    // var something = document.getElementById("something");
    // something.innerHTML = name;

  



    if (attractionIndex == 1) { altA = 0} else {altA = 1}
    if (Countryindex == 1) { altC = 0} else {altC = 1}
    attraction2 = javascript_array[continent][Countryindex]['attractions'][attractionIndex];
    attraction3 = javascript_array[continent][Countryindex]['attractions'][altA];
    attraction4 = javascript_array[continent][altC]['attractions'][0];
    attraction5 = javascript_array[continent][altC]['attractions'][1];
    
    //change image url
    console.log(attraction2['imageURL']);
    var atrimage = document.getElementById("atrimg");
    atrimage.src = attraction2['imageURL'];

    console.log(attraction3['imageURL']);
    var atrimage = document.getElementById("atrimg2");
    atrimage.src = attraction3['imageURL'];

    console.log(attraction4['imageURL']);
    var atrimage = document.getElementById("atrimg3");
    atrimage.src = attraction4['imageURL'];

    console.log(attraction5['imageURL']);
    var atrimage = document.getElementById("atrimg4");
    atrimage.src = attraction5['imageURL'];


</script>
<script>
    if( attraction2['descrip'] != null){
    var descrip = attraction2['descrip'];
    var description = document.getElementById("description");
    description.innerHTML = descrip;
    }
</script>
<br>
<a href="home.php">back</a>
<?php

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
$_SESSION['currentattraction'] = $_GET['attraction'];
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
</html>
