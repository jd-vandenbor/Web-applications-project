<html>
<head>
	<title>Places maintenance</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>
	 <form action="insertdb.php" method="POST">

        Enter Attraction info:
        <input type="text" name="name">
		<input type="text" name="country">
		<input type="text" name="continent">
        <br>
                          
		<input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="submit">
                       
     </form>
	
	 <form action="selectdb.php" method="POST">

        Enter Attraction to Select:
        <input type="text" name="name">

        <br>
                          
		<input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="select">
                       
     </form>
	 
	  <form action="deletedb.php" method="POST">

        Enter Attraction to Delete:
        <input type="text" name="name">
        <br>
                          
		<input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="delete">
                       
     </form>
	<br>
	<a href="home.php">back</a>
</body>

</html>
