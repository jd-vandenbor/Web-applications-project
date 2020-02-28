<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./home.css">
<style>

</style>
</head>

<!-- PHP -->
<?php
$servername = "192.168.64.2";
$username = "name";
$password = "cps630cps";
$dbname = "places";


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

console.log(javascript_array['America'][0]['attractions'][0]);
</script>



<body>
<a href="dbmaintain.php">Database maintenance</a>
<br>
<ul class="nav">
  <li class="navelement"><a class="active" href="#home">Home</a></li>
  <li class="navelement"><a href="#news">About us</a></li>
  <li class="navelement"><a href="#contact">Contact us</a></li>
  <li class="navelement"><a href="#about">Shopping cart</a></li>
</ul>

<div class="grid-container">
  <div class="grid-item">
    <div class="dropdown">
      <h3 style="margin:0px; padding:0px">Continent</h3>
      <button class="dropbtn" >Select</button>
      <div class="dropdown-content">
        <a onclick="selectContinent(this.innerHTML)" href="#" >Africa</a>
        <a onclick="selectContinent(this.innerHTML)" href="#">America</a>
        <a onclick="selectContinent(this.innerHTML)" href="#">Asia</a>
        <a onclick="selectContinent(this.innerHTML)" href="#">Europe</a>
        <a onclick="selectContinent(this.innerHTML)" href="#">Oceania</a>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <h3 style="margin:0px; padding:0px">Countries</h3>
    <ul id="countries">
    </ul>
  </div>
  <div class="grid-item">
    <h3 style="margin:0px; padding:0px">Attractions</h3>
    <ul id="attractions">
    </ul>
  </div>  
  <div class="grid-item">
    <div class="dropdown">
        <h3 style="margin:0px; padding:0px">Popular attractions</h3>
        <button class="dropbtn" >Select</button>
        <div class="dropdown-content">
          <a onclick="selectAttraction (0, 'America', 0)" href="#" >CN tower</a>
          <a onclick="selectAttraction (, 'Africa', 0)" href="#">Amboseli National Park</a>
          <a onclick="selectAttraction (1, 'America', 0)" href="#">Grand Canyon</a>
          <a onclick="selectAttraction (1, 'America', 1)" href="#">Mount Rushmore</a>
          <a onclick="selectAttraction (1, 'Europe', 0)" href="#">Keukenhof</a>
        </div>
      </div>
  </div> 
  <div class="grid-item" style="grid-column: 2 / span 2;">
    <h2 id="atrHeadline">Attraction!</h2>
    <img id="atrimg" style="width:50%" class="attractin-img" src="">
  </div>
  <!-- <div class="grid-item">6</div>   -->
  <!--<div class="grid-item">7</div>
  <div class="grid-item">8</div>
  <div class="grid-item">9</div>   -->
</div>

<!-- <h2 class="nothing" id="atrHeadline">Attraction!</h2>
<img class="nothing" id="atrimg" style="width:50%" class="attractin-img" src=""> -->


<div style="padding: 100px;">

</div>



<script>

  var selectedContinent = "";
  function selectContinent(continent) {
    selectedContinent = continent;
    countries = javascript_array[continent];
    console.log(countries);
    //get the list element and clear it before adding in the countries that are slected
    var listelement = document.getElementById("countries");
    //clear the list
    while( listelement.firstChild ){
      listelement.removeChild( listelement.firstChild );
    }
    for (i=0; i < countries.length; i++){
      country = countries[i]['name'];
      var countryelement = document.createElement("li");
      var node = document.createTextNode(country);
      countryelement.classList.add("dropbtn");
      countryelement.appendChild(node);
      countryelement.onclick = (function(i, continent){
        return function(){
            selectCountry(i, continent);
        }
      })(i, continent);

      listelement.appendChild(countryelement);
    }
  }

  function selectCountry(Countryindex, continent) {
    //country = javascript_array[continent];
    attractions = javascript_array[continent][Countryindex]['attractions'];
    console.log(attractions);
 
    //get the list element and clear it before adding in the countries that are slected
    var attractionslist = document.getElementById("attractions");
    //clear the list
    while( attractionslist.firstChild ){
      attractionslist.removeChild( attractionslist.firstChild );
    }
    for (i=0; i < attractions.length; i++){
      attraction = attractions[i]['name'];
      var attractionelement = document.createElement("li");
      var node = document.createTextNode(attraction);
      attractionelement.classList.add("dropbtn");
      attractionelement.appendChild(node);
      attractionelement.onclick = (function(Countryindex, continent, i){
        return function(){
          selectAttraction(Countryindex, continent, i);
        }
      })(Countryindex, continent, i);
      attractionslist.appendChild(attractionelement);
    }
  }

  function selectAttraction (Countryindex, continent, attractionIndex) {
    attraction2 = javascript_array[continent][Countryindex]['attractions'][attractionIndex];
    //change image url
    console.log(attraction2['imageURL']);
    var atrimage = document.getElementById("atrimg");
    atrimage.src = attraction2['imageURL'];

    //change headline
    var atrHeadline = document.getElementById("atrHeadline");
    atrHeadline.innerHTML = attraction2['name'];



  }

</script>

</body>

</html>
