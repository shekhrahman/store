<?php
     include("header.php");
     include("dbcon.php");
$user_id=$_SESSION['email1'];
$pro=mysqli_query($con,"select * from users where email='$user_id'");
$p=mysqli_fetch_assoc($pro);
$n=$p['name'];
$c=$p['contact'];
$cy=$p['city'];
$a=$p['address'];
?>

<body>
<div class="container ">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h1><center>Edit Profile</center></h1></div>
        <div class="panel-body">
            
                <form  action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php echo "$n";?>" name="fname"  required pattern="[a-zA-Z0-9. ]{1,}" title="Name should be less than 30  charector or not numeric" >
                            </div>
                          
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="<?php echo "$c";?>"  name="contact" maxlength="10" required pattern="[6-9][0-9]{9}"
                                title="Please enter valid phone no.">
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="<?php echo "$cy";?>" name="city" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="<?php echo "$a";?>" name="address" required>
                            </div>
                      <div class="form-group">
                                <input type="password"   class="form-control" placeholder="Enter current password"  name="password" maxlength="8" required >
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Edit">
                        </form>
            
            <p> To change password ? <a href="settings.php">Click Here !</a></p>
        </div>
</div>
</div>
</div>
</div>
<?php
include('footer.php');
if(isset($_POST['submit'])){
 
    $name=$_POST['fname'];
    $pwd=$_POST['password'];
    $contact=$_POST['contact'];
    $city=$_POST['city'];
    $add=$_POST['address']; 
    $pr=mysqli_query($con,"select * from users where email='$user_id'");
    $p=mysqli_fetch_assoc($pr);
    $po=$p['password'];
    if($pwd!=$po){
        echo"<script>alert('enter correct password'); </script>";
    }else{
        $u=mysqli_query($con,"update users set name='$name',contact=$contact,city='$city',address='$add' where email='$user_id'");
        echo "<script>alert('Profile edit sucssesfully !');
        window.open('profile.php','_self');</script>";
    }
   $_SESSION['email']=$name; 
}

?>
