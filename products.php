<!DOCTYPE html>
<?php

$con=mysqli_connect("localhost","root","","store");
include("header.php");
include("slideshow.php");


?>
<html lang="en">
    

   <body>

        <div class="container" id="content">


            <div class="row text-center" id="cameras">
                <?php 
                $check=mysqli_query($con,"select * from item");
                while($row=mysqli_fetch_assoc($check)){
                    $item_id=$row['id']; ?>
               
                <div class="col-md-3 col-sm-6 home-feature">
                 <?php echo "   <div class='thumbnail'>
                    <img src='img/$item_id.jpg' alt=''>";?>
                        <div class="caption">
                            <h3><?php echo $row['name'] ?> </h3>
                            <p><?php echo $row['price'] ?> Rs </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
                            <?php } 
                            else { 
                            echo  "<a href='cart-add.php?id=$item_id' name='add' value='add' class='btn btn-block btn-primary'>Add to cart</a>";
                            }   ?>
                          
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
            <hr>
        </div>
      
    </body>
 <?php
include("footer.php");
?>
<?php

function check_if_added_to_cart($item_id){
include("dbcon.php");
    $user_id=$_SESSION['id'];
$check=mysqli_query($con,"SELECT * FROM user_item WHERE item_id=$item_id AND user_id =$user_id");
$r=mysqli_fetch_assoc($check);
    $status=$r['status'];
    if (mysqli_num_rows($check)>=1){
        return $status;
        
    }else{
        return 0;
    }
}
?>
</html>
