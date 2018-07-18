<?php
session_start();
include('dbcon.php');
$id=$_GET['id'];
$user_id=$_SESSION['id'];

$q=mysqli_query($con,"delete from user_item where item_id=$id and user_id=$user_id");
echo "<script>
alert('Item remove sucssesfully !');
window.open('cart.php','_self');</script>";
?>