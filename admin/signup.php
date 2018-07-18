<?php
include("dbcon.php");
include("header.php");
?>
<html lang="en">   
    <body>
       
        <div class="container-fluid decor_bg " id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>SIGN UP</h2>
                        <form  action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="fname"  required pattern="[a-zA-Z0-9. ]{1,}" title="Name should be less than 30  charector or not numeric" >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Email"  name="email" required pattern="[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" title="Enter valid email address">
                            </div>
                            <div class="form-group">
                                <input type="password"   class="form-control" placeholder="Password"  name="password" maxlength="8" required >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact"  name="contact" maxlength="10" required pattern="[6-9][0-9]{9}"
                                title="Please enter valid phone no.">
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
     </body>
     <?php
include("footer.php");
 if(isset($_POST['submit'])) {  
 $n=$_POST['fname'];
    $e=$_POST['email'];
    $p=$_POST['password'];
    $c=$_POST['contact'];
    $cy=$_POST['city'];
    $a=$_POST['address']; 
     
     $s=mysqli_query($con,"select * from users where email='$e'");
     if(mysqli_num_rows($s)<1){
    $user_reg= mysqli_query($con, "insert into users(name, email, password, contact, city, address)values('$n','$e','$p','$c','$cy','$a')");
 echo "<script> 
 window.open('login.php','_self');
 </script>";
         
     }else{

echo"<script>alert ('email id already exist');</script>";
     }
 }
?>
    
</html>