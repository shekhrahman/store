<!DOCTYPE html>
<?php
include('dbcon.php');
include("header.php");

?>
<html lang="en">
   
    <body>
       
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Current Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1"  placeholder="Re-type New Password" required>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Change">
                    </form>
                </div>
            </div>
        </div>
      <?php
        
         if(isset($_POST['submit'])){
             
         $opass=$_POST['old-password'];
         $pass=$_POST['password'];
         $rpass=$_POST['password1'];
        $user_mail=$_SESSION['email1'];
             $sel=mysqli_query($con,"select * from users where email='$user_mail'");
             $r=mysqli_fetch_assoc($sel);
             $c=$r['password'];
             if($opass!=$c){
                 echo "<script>alert('current password is invalid');
                 </script>";
             }elseif($pass==$rpass){
                 $p=mysqli_query($con,"update users set password='$pass' where email='$user_mail' ");
                 echo "<script>alert('Password Update Sucssesfully!');
                 window.open('profile.php','_self');
                 </script>";
             }else{
                 echo "<script>alert('Password does not match!');
                 </script>";
             }
         }
        ?>
    </body>
     <?php
include("footer.php");
    ?>
</html>