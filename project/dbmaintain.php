<html>
<head>
	<title>Places maintenance</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>

<body>
<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['user'] == "admin")){
	 echo "<form action=\"insertdb.php\" id=\"attr\" method=\"POST\">

        Enter Attraction info:
        Name: <input type=\"text\" name=\"name\">
		<br>
		Country: <input type=\"text\" name=\"country\">
		<br>
		Continent: <input type=\"text\" name=\"continent\">
        <br>
		Address: <input type=\"text\" name=\"address\">
		<br>
		Latitude: <input type=\"text\" name=\"lat\">
        <br> 
		Longtitude: <input type=\"text\" name=\"longti\">
        <br>    
		Price: <input type=\"text\" name=\"price\">
		<br>
		
		Image file: <input type=\"text\" name=\"imagefile\">
        <br>
		Page Link: <input type=\"text\" name=\"pagelink\">
        <br>
		<textarea id=\"description\" name=\"description\" form=\"attr\" rows=\"4\" cols=\"50\">
Enter description here
		</textarea>
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"submit\">
                       
     </form>
	
	 <form action=\"selectdb.php\" method=\"POST\">

        Enter Attraction to Select:
        <input type=\"text\" name=\"name\">

        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"select\">
                       
     </form>
	 
	  <form action=\"deletedb.php\" method=\"POST\">

        Enter Attraction to Delete:
        <input type=\"text\" name=\"name\">
        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"delete\">
                       
     </form>
	 <form action=\"register.php\" method=\"POST\">

        Full Name:<input type=\"text\" name=\"name\" id=\"name\">
		<br>
		Username:<input type=\"text\" name=\"username\" id=\"username\">
		<br>
		Password:<input type=\"text\" name=\"password\" id=\"password\">
		<br>
		Address:<input type=\"text\" name=\"address\" id=\"address\">
		<br>
		Email:<input type=\"text\" name=\"email\" id=\"email\">
		<br>
		Phone Number<input type=\"text\" name=\"phonenum\" id=\"phonenum\">
        <br>

        <input type=\"submit\">
                       
     </form>
	 <form action=\"userselectdb.php\" method=\"POST\">

        Enter User to Select:
        <input type=\"text\" name=\"username\">

        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"select\">
                       
     </form>
	 
	  <form action=\"userdeletedb.php\" method=\"POST\">

        Enter User to Delete:
        <input type=\"text\" name=\"username\">
        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"delete\">
                       
     </form>
	<br>";
}else{echo "Admin access only";}
?>
<br>
<a href="home.php">back</a>
</body>

</html>
