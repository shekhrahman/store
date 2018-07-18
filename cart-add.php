<?php
session_start();
include("dbcon.php");
$user_id=$_SESSION['id'];
$item_id=$_GET['id'];
$qty=0;
$check=mysqli_query($con,"select * from user_item where item_id='$item_id'");

if(mysqli_num_rows($check)==0){
$q=mysqli_query($con,"INSERT INTO user_item(user_id, item_id, status,qty) VALUES($user_id, $item_id, 'Added to cart',$qty+1)");
  echo"<script>window.open('cart.php','_self');</script>" ;
}else{
    $row=mysqli_fetch_assoc($check);
$qty=$row['qty'];
    $in=mysqli_query($con,"update user_item set qty=$qty+1 where item_id='$item_id'");
      echo"<script>window.open('cart.php','_self');</script>" ;

}

    ?>