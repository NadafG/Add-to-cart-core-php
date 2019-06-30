<?php

  include 'config.php';
  if ( isset( $_POST['submit'] ) ) {

   $message = "";
    $photo ="";
    $target_dir = "products/";
    $target_file = $target_dir . basename( $_FILES["photo"]["name"] );
 
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if( isset( $_FILES["photo"]["name"] ) ) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if( $check !== false ) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $photo = basename( $_FILES["photo"]["name"] );
              } else {
                  $message = 'Photo not uploaed...';
              }
        } else {
            $message = "File is not an image...";
        }
    }

    $sql = "INSERT INTO `products`( `name`, `price`, `description`, `photo`) VALUES ('". $_POST['product_name'] ."','".$_POST['price']."','".$_POST['description']."','". $photo ."')";

    if ( mysqli_query( $con, $sql ) ) {
        $message =  "Product added successfully";
    } else {

        $message = $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

   <div class="row">
        <div class="col-md-10">
            <h2> Add Product </h2> 
            <div class="pull-right">
              <a href="index.php" class="btn btn-primary" >View Product </a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10">
            <form method="post" enctype="multipart/form-data"> 
           
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Products Name </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name...">

                </div>
              </div> 

              <div class="form-group row">
                <label for="price" class="col-sm-3 col-form-label"> Products Photo </label>
                <div class="col-sm-9">
                 <input type="file" class="custom-file-input" id="photo" name="photo" lang="es">
                </div>
              </div> <div class="form-group row">
                <label for="price" class="col-sm-3 col-form-label"> Products Price </label>
                <div class="col-sm-9">
                  <input type="price" class="form-control" id="price" name="price" placeholder="Enter price...">
                </div>
              </div>

               <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label"> Products Description </label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="description" rows="5" id="description"></textarea>
                </div>
              </div>
              <div class="form-group row">
               <label for="description" class="col-sm-3 col-form-label">  </label>
                <div class="col-sm-9">
                 <button type="submit" name="submit" class="btn btn-primary btn-block"> Add Product </button>
                </div>
                <center>
                <?php
                  if (isset( $message ) &&  $message !== "" ) {
                    echo $message;
                  }
                ?>
              </div>
              </center>
            </form>
        </div>
    </div>
</div>