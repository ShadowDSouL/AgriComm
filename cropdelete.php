<?php
    include_once("conn.php");

    $id = $_GET["id"];
    if($id == null){
        header("Location: admicrop.php");

    }else{
        if(isset($_POST["btndelete"])){

            $deletesql = "DELETE FROM `crop` WHERE crop_ID='$id' ";
            if(mysqli_query($conn,$deletesql)){
                echo "<script>alert('Record has been deleted') </script>";
                header("Location: admincrop.php");
            }else{
                echo "<script>alert('Error in deleting the record');</script>";
            }
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <title>AgriComm</title>
</head>
<body>
    <?php include("apheader.php") ?>  
    <br>

    <div class="wraper">
        <div class="sidebar">
            <ul>
                <li><a href="admin.php">Posts</a></li>
                <li><a href="admincrop.php">Crop List</a></li>
                <li><a href="memberList.php">Member list</a></li>
                
            </ul>
        </div>
        <div class="post_content">
            <h2 style="text-align: center;">Delete Crop Information</h2>
            <hr>
            <form action="" method="POST" name="frmdelete">
            <?php 
                // 1st 
                $sql = "SELECT * FROM crop WHERE crop_ID = '$id' ";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
            ?>  
            <table style="margin-left: 30%;">
                <tr>
                    <td><label>Crop Name : </label></td>
                    <td><input type="text" name="txtcname" style="width:492px" value="<?php echo $row["crop_name"] ?>" id="txtcname" disabled></td>
                </tr>
                <tr>
                    <td><label>Description : </label></td>
                    <td><textarea name="txtbody" id="txtbody" cols="50" rows="10" disabled><?php echo $row["body"] ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br> &nbsp;
                        <button name="btndelete" onclick="return confirm
                        ('Warning!\nAre you sure you want to delete this record?\nPress OK if you wish to proceed.')"> Delete Record </button>
                        <button><a href="admincrop.php" style="color: black;"> Cancel </a></button>
                    </td>
                </tr>
            </table>
                
            <?php   } ?>
        
            </form>
        </div>
    </div>           
    <?php mysqli_close($conn) ?>
    <?php include("footer.php") ?>
</body>
</html>
