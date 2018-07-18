<?php
include('header.php');
include('dbcon.php');
?>
<body>
   <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price(Rs)</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Cancle Order </th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id=$_SESSION['id'];
                            $s=mysqli_query($con,"select * from user_item where user_id='$user_id' and status='Confirm'");
                        if(mysqli_num_rows($s)==0){
                        echo "<h1 style='color:red;'>Please confirm order first !</h1>";
                        }else{  
                            while($row=mysqli_fetch_assoc($s)){
                                $item_id=$row['item_id'];
                                $qty=$row['qty'];
                                $_SESSION['item_id']=$item_id;
                                $t=mysqli_query($con,"select * from item where id='$item_id'");
                                $r=mysqli_fetch_assoc($t);?>
                               <tr> <?php $item_name=$r['name'];
                                $item_price=$r['price'];?>
                                <td><?php echo $item_id; ?></td>
                                <td><?php echo $item_name; ?></td>
                                <td><?php echo $item_price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $item_price * $qty; ?></td>
                                <td><?php  echo "<form onsubmit='return confir()' action='cancel.php'>
                            <input type='submit'class='btn btn-danger name='sub' value='Cancel Order'></form>";}?></td>
                                   <?php } 
                            
                             ?></tr>
                        </tbody>
                    </table>
       </div></div>
<script>
    
        
    function confir(){
        return confirm('Are u sure to Cancel order?');
    }
    </script>