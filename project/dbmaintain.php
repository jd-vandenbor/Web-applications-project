<html>
<head>
	<title>Places maintenance</title>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>
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

<body>
<h1>Maintain server below</h1>
<div class="divy" style="padding-top:20px;padding-bottom:150px;">
<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['user'] == "admin")){
	 echo "<form action=\"insertdb.php\" id=\"attr\" method=\"POST\">

	 <h2>Add Attraction</h2>
	 <hr>

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
		

		<h2>Select Attraction</h2>
		<hr> 
     </form>
	
	 <form action=\"selectdb.php\" method=\"POST\">

        Enter Attraction to Select:
        <input type=\"text\" name=\"name\">

        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"select\">
			  
		
		<h2>Delete Attraction</h2>
		<hr>
     </form>
	 
	  <form action=\"deletedb.php\" method=\"POST\">

        Enter Attraction to Delete:
        <input type=\"text\" name=\"name\">
        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"delete\">
			
		<h2>Add new User</h2>
		<hr>
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
					   
					
		<h2>Select User</h2>
		<hr>
     </form>
	 <form action=\"userselectdb.php\" method=\"POST\">

        Enter User to Select:
        <input type=\"text\" name=\"username\">

        <br>
                          
		<input type=\"hidden\" name=\"form_submitted\" value=\"1\" />

        <input type=\"submit\" value=\"select\">
				  
		<h2>Delete User</h2>
		<hr>
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
</div>
</body>

</html>
