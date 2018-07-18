<?php
include("dbcon.php");
include("header.php");
$user_id=$_SESSION['email1'];
$pro=mysqli_query($con,"select * from users where email='$user_id'");
$p=mysqli_fetch_assoc($pro);
$n=$p['name'];
$c=$p['contact'];
$cy=$p['city'];
$a=$p['address'];
?>
<style>
    .panel-footer{
        background-color: #337ab7;
        color: white;}
    .panel-primary{font-size: 20px;} 
    #edit{
        padding-bottom: 50px;
    }
</style>
<body>
<div class="container con">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h1><center>My Profile</center></h1></div>
        <div class="panel-body">
            <span><center><p>NAME : <?php echo $n;?></p></center></span><hr>
            <span><center><p>CONTACT : <?php echo $c;?></p></center></span><hr>
            <span><center><p>CITY : <?php echo $cy;?></p></center></span><hr>
              <span><center><p>ADDRESS : <?php echo $a;?></p></center></span>
        </div>
                <div class="panel-footer"><center><p><?php echo $user_id; ?> </p></center></div>
                
            </div><center id="edit">To Edit profile ? <a href="editprof.php">click here !</a></center>
</div>
</div>
</div>
<?php
include('footer.php');
?>

