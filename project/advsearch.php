<html>
<style>


.divy {
	background-color: #f2efe1;
}

input[type=text], select {
	width: 30%;
	padding: 12px 20px;
	margin: 8px 0;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

input[type=submit] {
	color: white;
  	background-color: #75aaff;
  	padding: 14px 20px;
  	margin: 8px 0;
  	border: none;
  	border-radius: 4px;
  	cursor: pointer;
}

input[type=submit]:hover {
  	background-color: #2e4c7d;
}

</style>
<head>
	<title>review test</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>
<h1>Please input your search details below</h1>
<div class="divy" style="padding-top:20px;padding-bottom:150px;">
<form action="search.php" method="POST">

        Name:<input type="text" name="name" id="name">
		<br>
		<label for="continent">Continent:</label>
		<select id="continent" name="continent">
			<option value="" selected="selected">-</option>
			<option value="Africa">Africa</option>
			<option value="America">America</option>
			<option value="Asia">Asia<option>
			<option value="Europe">Europe</option>
			<option value="Oceania">Oceania</option>
		</select>          
		<br>
		Country:<input type="text" name="country" id="country">
		<br>
		Maxium Price:<input type="number" name="maxprice" id="maxprice" min="0">
		<br>

        <input type="submit">
                       
</form>
<br>
<a href="home.php">back</a>
</div>
</body>
</html>
