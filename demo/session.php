<?php

include 'config.php';
//$_SESSION['cart']=array();

if (isset($_POST)) {

   array_push($_SESSION['cart'],$_POST['id']);
	
}

?>