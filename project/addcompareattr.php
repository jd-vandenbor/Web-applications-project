<?php
session_start();
$name = $_GET['name'];
$mode = $_GET['mode'];
if(isset($_SESSION['attractionA'])){
	$attrA = $_SESSION['attractionA']; 
}else $attrA ="-";

if(isset($_SESSION['attractionB'])){
	$attrB = $_SESSION['attractionB'];
}else $attrB ="-";

if($mode == "remove")
{
	if($attrA == $name){
		unset($_SESSION['attractionA']);
	}elseif($attrB == $name){
		unset($_SESSION['attractionB']);
	}
}else{
	if(!isset($_SESSION['attractionA'])){
				
		$_SESSION['attractionA'] = $name;
	}elseif(!isset($_SESSION['attractionB'])){
			
		$_SESSION['attractionB'] = $name;
	}
}
header('Location: comparison.php');

?>
