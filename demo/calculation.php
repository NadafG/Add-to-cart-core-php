<?php
include 'config.php';



	if(isset($_POST ) ) {

	$id =  $_POST['id'];

	$count = $_POST['count'];
 
	$query = "SELECT * FROM `products` WHERE `id` =".$id;

	$result = mysqli_query( $con,$query );

	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$price = (float)str_replace(',', '', $row['price'] );

	echo  $total =  $price*$count;
	
}


 
?>