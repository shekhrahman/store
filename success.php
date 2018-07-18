<!DOCTYPE html>
<?php

include("header.php");
include('dbcon.php');
$id=$_SESSION['id'];
$p=mysqli_query($con,"update user_item set status='Confirm' where user_id=$id and status='Added to cart'");

?>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
       
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="myorder.php">here</a> to track your item.</p>
                </div>
            </div>
        </div>
      
    </body>
     <?php
include("footer.php");
    ?>
</html>