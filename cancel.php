<!DOCTYPE html>
<?php

include("header.php");
include('dbcon.php');
$user_id=$_SESSION['id'];
$item_id=$_SESSION['item_id'];
$p=mysqli_query($con,"update user_item set status='Added to cart' where user_id=$user_id and item_id=$item_id");
echo " <script> 

alert('Order Cancel Sucssesfully !');
window.open('myorder.php','_self');</script>";

?>
