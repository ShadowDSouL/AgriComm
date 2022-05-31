<?php 
    session_start();
    include_once("conn.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if($id == null){
            header("Location: admincrop.php");
    
        }else{
            if(isset($_POST["btnedit"])){
                $cropname = $_POST["txtcname"];
                $desc = $_POST["txtbody"];
    
                $updatequery = "UPDATE `crop` SET `crop_name` = '$cropname', `body` = '$desc' WHERE crop_ID = '$id' ";
                if(mysqli_query($conn,$updatequery)){
                    echo "<script>alert('Record has been updated') </script>";
                     header("Location: admincrop.php");
                }else{
                    echo "<script>alert('Error in updating the record');</script>";
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
            <h2 style="text-align: center;">Edit Crop Information</h2>
            <hr>
            <form action="" method="POST" name="frmedit">
            <?php  
                $sql = "SELECT * FROM crop WHERE crop_ID = '$id'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <table style="margin-left: 30%;">
                <tr>
                    <td><label>Crop Name : </label></td>
                    <td><input type="text" name="txtcname" style="width:492px" value="<?php echo $row["crop_name"] ?>" id="txtcname"></td>
                </tr>
                <tr>
                    <td><label>Description : </label></td>
                    <td><textarea name="txtbody" id="txtbody" cols="50" rows="10"><?php echo $row["body"] ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br> &nbsp;
                        <button name="btnedit" name="btnDelete"> Update </button>
                        <button><a href="admincrop.php" style="color: black;"> Cancel </a></button>
                    </td>
                </tr>
            </table>
                            
                
            <?php } ?>
            </form>
            <?php mysqli_close($conn) ?>
            <?php } ?>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>
</html>