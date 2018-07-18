<!DOCTYPE html>
<?php
include("dbcon.php");
include("header.php");
?>
<html lang="en">

   

    <body>
      
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-3 col-md-offset-4">
                        
                           
                        <h3>LOGIN<h5>Don't have an account? <a href="signup.php">Register !</a></h5></h3>
                            
                            
                                <form role="form" action="" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="e-mail" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button><br><br>
                                    <h4></h4>
                                </form><br/>
                            
                            
                            
                        
                    </div>
                </div>
            </div>
        </div>
       
    </body>
     <?php
include("footer.php");
    if(isset($_POST['submit'])){
       
    $email_id=$_POST['e-mail'];
    $pass=$_POST['password'];
    $s=mysqli_query($con,"select * from users where email='$email_id' and password = '$pass'");
        if(mysqli_num_rows($s)!=0){
            $r=mysqli_fetch_assoc($s);
            $name=$r['name'];
            $_SESSION['email']=$name;
            $_SESSION['email1']=$r['email'];
            $_SESSION['id']=$r['id'];
            echo " <script>
            window.open('products.php','_self');
            </script>"; 
        }else{
            echo "<script>alert('invalid');</script>";
        }
    }
    ?>
</html>