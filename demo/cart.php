
<?php

include 'config.php';

$id =  implode(",",$_SESSION['cart']);

$query = "SELECT * FROM `products` WHERE `id` IN (".$id.")";

$result = mysqli_query( $con, $query );


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
            <h2>View Cart </h2> 
            <div class="pull-right">
              <a href="index.php" class="btn btn-primary"> View Product </a>
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
              <th  class="text-center" > Quentity  </th>
              <th class="text-center"> Price </th>
            </tr>
          </thead>
          <tbody>
           <?php

             while( $row = mysqli_fetch_array( $result ))
                {
                  echo " <tr>";
                  echo  '<td>'. $row['name'] .'</td>';
                  echo  '<td>'. $row['price'] .'</td>';  
                  echo  '<td class="text-center" > 
                          <span class="btn-increment-decrement" style = "cursor:pointer" onClick="remove('.$row["id"].' )"> 
                          <b > -- </b> </span> &nbsp; &nbsp;
                          <input style="width:40px;" class="input-quantity" id="count-'. $row["id"].'" value="1" disabled >
                          &nbsp; &nbsp;
                          <span class="btn-increment-decrement"  style = "cursor:pointer" onClick="add('. $row["id"].')"> 
                          <b > + </b> </span>
                        </td>';
                  echo  '<td>  <input style="width:100px;" class="total_price" id="total_price_'. $row["id"].'" value="'. $row['price'] .'" disabled > </td>';
                  echo " </tr>";
                }
                ?>
                <tr>
                <td> </td>
                <td> </td>
                <td  class="text-center"> Total </td>
                <td> <input style="width:100px;" class="final_price" id="final_price" value="0.00" disabled >  </td>
                </tr>

          </tbody>
        </table>  
    </div>
   </div>
</div>

</body>

<script type="text/javascript">
total_price_calucation();
  function add( id  )
  {
    var type ='ADD';
    var old_count = $('#count-'+id).val();
    var total = parseInt(old_count) + 1;
    $('#count-'+id).val( total );
    var current_count = $('#count-'+id).val();
     $.ajax({
          type: "POST",  
          url: "calculation.php",
          data: {'count':current_count,'id':id },  
          success: function(result)
          {
               $('#total_price_'+id).val( result );
               total_price_calucation();
             
          }});
  }
 function remove( id )
  {

    var old_count = $('#count-'+id).val();
    if( 0 != old_count )
    {
       var total = parseInt(old_count) - 1;
      $('#count-'+id).val( total );
     var current_count = $('#count-'+id).val();

       $.ajax({
            type: "POST",  
            url: "calculation.php",
            data: {'count':current_count,'id':id },  
            success: function(result)
            {

                $('#total_price_'+id).val( result );
               total_price_calucation();

            }});

    }
   
  }
  
function total_price_calucation(){

   var array = [];
    $(".total_price").each(function() {
          var val =  $(this).val();
       
          array.push(val);
    })

    console.log( array );

    var total = 0;
    for (var i = 0; i < array.length; i++) {
         
         total = total + parseFloat( array[i].replace(",", "") ) ;
       //  alert( total );
    }
    $('#final_price').val(total );
}

  

</script>

</html>
