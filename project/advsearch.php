<html>
<head>
	<title>review test</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>

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
</body>
</html>