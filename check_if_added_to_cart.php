<?php
<?php
session_start();
function check_if_added_to_cart($item_id){
include("dbcon.php");
    $user_id=$_SESSION['id'];
$check=mysqli_query($con,"SELECT * FROM user_items WHERE item_id='$item_id' AND user_id ='$user_id' and status='Added to cart'");

    if (mysqli_num_rows($check>=1)){
        return 1;
        
    }else{
        return 0;
    }
}
?>