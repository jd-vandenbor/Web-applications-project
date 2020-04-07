<?php
session_start();
session_unset();
session_destroy();

echo"You are now logged out";
echo"<br>";
echo"<a href=\"home.php\">Home</a>";
?>