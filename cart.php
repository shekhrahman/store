
<?php
include("dbcon.php");
include("header.php");
$user_id=$_SESSION['id'];
$s=mysqli_query($con,"select * from user_item where user_id='$user_id' and status='Added to cart'");

?>

<html>  
    <body>           
       <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price(Rs)</th>
                                 <th> Qyt </th>
                                 <th> Sub_total</th>
                                <th>Remove Item </th>
                               
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
                if(mysqli_num_rows($s)==0){   
                    echo "";
                }else{
                    $sum=0;
                    while($row=mysqli_fetch_assoc($s)){
                        $iid=$row['item_id'];
                        $qty=$row['qty'];
                        $p1=mysqli_query($con,"select name,price from item where id=$iid ");
                        
                        $row1=mysqli_fetch_assoc($p1);
                            $sub_total=$row1['price']*$qty;
                            $sum=$sum+$sub_total;
                       
                        
                            ?>
                            <tr>
                                <td><?php   echo $iid; ?></td>
                                <td><?php echo $row1['name']; ?></td>
                                <td><?php echo $row1['price'];?></td>
                                <td><?php echo $row['qty'];?></td>
                                <td><?php echo $sub_total;?></td>
                                <td> <?php echo "<form method='GET' action='cart-remove.php' onsubmit='return cnf()'><input type='submit'  class=' btn btn-danger' value='Remove'> 
                                <input type='hidden' value=$iid name='id'></form>"; }}?></td>
                   
                    <?php if(mysqli_num_rows($s)!=0){?>
                            <tr><td></td><td></td><td></td><td><b>Total=</b></td>
                                
                             <td>   <?php echo $sum; ?> </td>
                            <td><?php echo "<form onsubmit='return confir()' action='success.php'>
                            <input type='submit'class='btn btn-primary name='sub' value='Confirm Order'></form>";}else{
                            echo"<span style='color:red;'><h2>Add items to cart first !</h2></span>";}?></td>
                                
                            </tr>
                        </tbody>
                    </table><br>
                <h4><a href="products.php">Click here !</a> to Add Item. </h4>
                </div>
        </div></body>
        
            <?php
include("footer.php");
    ?>
    <script>
    function cnf(){
        return confirm('Are u sure to remove?');
    }
        
    function confir(){
        return confirm('Are u sure to confirm ?');
    }
    </script>
    </body>
</html>