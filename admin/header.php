<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Life Style Store</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    
    <style>
    #show{
        color: white;
        margin-left: 5px;
        margin-right: 10px;
        margin-top: 15px;
        font-size: 15px;
    }
       
     #nav_li{
            color: aliceblue;
        }
        #nav_lii{
            color: red;
            font-size: 20px;
        }
</style>
    </head>
 <body>
<?php session_start(); ?>
<div  class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header"> 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a style="color:white;" class="navbar-brand" href="index.php">AKOLA STORE</a>
               
                      <form class="container " style="max-width:500px;margin:10px 0px 0px 150px;">
                    <div class="input-group">
                        
                        <input  type="text" class="form-control" placeholder="Search for product">
                            <div class="input-group-btn">
                            <button class="btn btn-default btn-block" type="submit">
                                <i style="color:#337ab7;" class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                            </div>
                         </form> </div>
                    
                
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        
                     
                         <li class="active" ><a href="index.php" id="nav_li"><span  class="glyphicon glyphicon-home "></span> Home </a></li>
                        
                      <?php
                           if (!isset($_SESSION['email'])) { ?>
                       
                
                        <li ><a href="signup.php" id="nav_li"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li ><a href="login.php" id="nav_li"><span class="glyphicon glyphicon-log-in"></span> Login</a></li><?php }
                        else { ?>
                
                        <li ><a href = "add_product.php" id="nav_li">Add Product </a></li>
                        <li ><a href = "myorder.php" id="nav_li"><span class = "glyphicon glyphicon-user"></span>  My order</a></li>
                        <li  class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="nav_li"><span class = "glyphicon glyphicon-cog"> </span>Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu"> 
                            <li><a href="editprof.php">Edit Profile</a></li>
                        <li><a href="settings.php">Change Password</a></li>
                            </ul>
                        </li>
                        
                      <li id="show"> <?php
                       if (!isset($_SESSION['email'])){
                            echo "<p>Hello !</p>";
                        }else{
                        echo "<p>Hello <a href='profile.php'>".$_SESSION['email']." !</a></p>";
                        }?><li>
                    <li ><a href = "logout.php" id="nav_lii"><span class = "glyphicon glyphicon-off"></span></a></li>
                        <?php } ?>
                   </ul>
                </div>
            </div>
        </div>
</body>