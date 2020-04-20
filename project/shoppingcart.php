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


<style>
  body {
    font-size: 30px;
  }
  div div:hover{
    background: #CCCCCC;
  }
</style>
<body>

<h1 id="title"> </h1>
<div style="width: 48%; float:left; border: 1px solid">
  <div onclick="myFunc()" style="border: 1px solid">
      <ul>
      <li>Start date = May 3rd 2020,</li>
      <li>Duration: 2 months</li>
      <li>Air fare and/or Cruise fare: $355</li>
      <li>Tour id number: 07</li>
      <li>Price in total: $355</li>
    </ul>
  </div>
  <div style="border: 1px solid">
      <ul>
      <li>Start date = May 11th 2020,</li>
      <li>Duration: 3 months</li>
      <li>Air fare and/or Cruise fare: $355</li>
      <li>Tour id number: 08</li>
      <li>Price in total: $355</li>
    </ul>
  </div>
  <div style="border: 1px solid">
      <ul>
      <li>Start date = June 10th 2020,</li>
      <li>Duration: 1 months</li>
      <li>Air fare and/or Cruise fare: $355</li>
      <li>Tour id number: 09</li>
      <li>Price in total: $355</li>
    </ul>
  </div>
</div>


<div id="part2" style="width: 50%; float:right; visibility:hidden">
  INFO:
  <form action="/action_page.php">
    <label for="fname">Number of travelers</label><br>
    <input type="text" id="fname" name="fname" value=""><br>
    <label for="fname">Age of travelers</label><br>
    <input type="text" id="fname" name="fname" value=""><br>
    <label for="fname">Final Invoice of travelers</label><br>
    <p>$355</p>
    <input type="submit" value="Submit">
  </form> 
</div>
</body>

<script>
    function myFunc (){
    var part2 = document.getElementById("part2");
    part2.style.visibility = "visible";
    }

    var title = document.getElementById("title");
    var something = document.getElementById("something");

    attraction2 = javascript_array[continent][Countryindex]['attractions'][attractionIndex];

    title.innerHTML = attraction2['name'];
    something.innerHTML = name;


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


</html>
