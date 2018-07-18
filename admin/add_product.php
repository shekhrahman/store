<?php
include('header.php');
include('dbcon.php');
?>
<html>  
    <body>
        

     <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <tr>
                            <form action="" method="post" enctype="multipart/form-data">
                            <td ><input class="form-control" type="text" name="p_name" placeholder="Enter product name" required>
                            </td>
                            <td><input class="form-control" type="text" name="p_price" placeholder="Enter product price" requiredpattern="[0-9]">
                            </td>
                            <td class="form-group"><input class="form-control" type='file' name='pic' id='regPic' accept="image/jpg" >  
                            </td>
                             <td > <input class="btn btn-primary" type="submit" name="submit" value="Add">
                            </td>
                            </form>         
                    </tr>
                    </table>
                </div>
            </div>
    </body>
    <?php
    $target_der="../img/";
    $target_file=$target_der.basename($_FILES['pic']['name']);
    $uploadok=1;
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST['submit'])){
        $check=getimagesize($_FILES["pic"]["tmp_name"]);
        if($check!=false){
        $uploadok=1;   
        $p_name=$_POST['p_name'];
        $p_price=$_POST['p_price'];
    $in=mysqli_query($con,"insert into item(name , price)values('$p_name' , '$p_price')");
    echo "<script>alert('Item added successesfully');</script>";
        }else{
             echo "<script>alert('File is not an image.');</script>";
             $uploadOk = 0;
        } 
        
    }
    ?>
    
    
</html>
