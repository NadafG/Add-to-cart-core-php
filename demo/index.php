<?php



include 'config.php';
$result = mysqli_query( $con,"SELECT * FROM `products" );

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
        <div class="col-md-12">
            <h2>Products</h2> 
            <div class="pull-right">
              <a href="add_product.php" class="btn btn-primary" >Add Product </a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> Products Name </th>
              <th> Photo </th>
              <th> Price </th>
              <th class="text-center"> Description </th>
              <th class="text-center"> Action </th>
            </tr>
          </thead>
          <tbody>
           
            <?php

             while( $row = mysqli_fetch_array( $result ))
                {
                  echo " <tr>";
                  echo  '<td>'. $row['name'] .'</td>';
                  echo  '<td><img src="products/'. $row['photo'] .'" class="img-thumbnail" height="20" alt="Cinque Terre"></td>';
                  echo  '<td>'. $row['price'] .'</td>';
                  echo  '<td>'. $row['description'] .'</td>';



                  if (in_array( $row['id'],$_SESSION['cart'])) 
                    { 
                      echo  '<td> <a onClick="addtocart('. $row['id'] .')" id="addcart'. $row['id'] .'" class="btn btn-success" >Add Cart </a></td>';
                   
                    } 
                  else
                    { 
                     echo  '<td> <a onClick="addtocart('. $row['id'] .')" id="addcart'. $row['id'] .'" class="btn btn-primary" >Add Cart </a></td>';
                   
                    } 
                echo " </tr>";

                 
                }
                ?>

              
         </tbody>
        </table>  
        <form action="cart.php" method="post">
        <input type="hidden" name="cart_ids" class="cart" id="cart"  value="" >
        <div class ="pull-right" >  <input type="submit"  value="Proced to cart" class="btn btn-primary btn-block">   </div>
       
        </form>

        
    </div>
   </div>
</div>

<script type="text/javascript">
  
  function addtocart( id )
  {
          $.ajax({
          type: "POST",  
          url: "session.php",
          data: {'id':id },  
          success: function(result)
          {

            console.log(result );
               $('#addcart'+id).removeClass('btn-primary');
               $('#addcart'+id).addClass('btn-success');
             
          }});
     
  }


</script>

</body>
</html>

