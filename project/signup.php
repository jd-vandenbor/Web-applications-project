<html>
<head>
	<title>Make an Account</title>
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
<h1>Please input the user credentials below and hit submit</h1>
<div class="divy" style="padding-top:20px;padding-bottom:150px;">
<body>
	 <form action="register.php" method="POST">

        Full Name:<input type="text" name="name" id="name">
		<br>
		Username:<input type="text" name="username" id="username">
		<br>
		Password:<input type="text" name="password" id="password">
		<br>
		Address:<input type="text" name="address" id="address">
		<br>
		Email:<input type="text" name="email" id="email">
		<br>
		Phone Number<input type="text" name="phonenum" id="phonenum">
        <br>

        <input type="submit">
                       
     </form>
	
	
	<br>
	<a href="home.php">back</a>
	</div>
</body>

</html>