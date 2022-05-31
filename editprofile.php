<?php
    session_start();
    include_once("conn.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE userID = '$id' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link rel="stylesheet" href="editprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>AgriComm</title>
</head>
<body>
    <?php include("mpheader.php") ?>
    <div class="profileedit">
        <form action="" method="POST" name="frmprofile" id="frmprofile" enctype="multipart/form-data">
            <?php if($count == 1){ ?>
            <img src="profile/<?php echo ($row['icon'])?>" alt="image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1"><br>
            <div class="round">
     
                <input type="file" name="profile" id ="profile" accept=".jpg, .jpeg, .png">
                <i class = "fa fa-camera" style = "color: #fff;"></i>
            </div><br>
            <h1>Personal Details</h1>
            <label>First Name: </label>
            <input type="text" class="name" name="fname" value="<?php echo $row['fname'] ?>"><br>
            <label> Last Name: </label>
            <input type="text" class="name" name="lname" value="<?php echo $row['lname']?>"><br>
            <label>Date of Birth: </label>
            <input type="date" class="dob" name="dob" value="<?php echo $row['dob']?>"><br>
            <input type="submit" value="Update" name="profileUpdate" id="profileUpdate">
            <button name="btnCancel" style="border-radius: 10px;"><a href="mainpage.php" style="color:black;">Cancel</a></button>
            <?php } ?>
        </form>
        <?php } ?>
    </div>
    <?php include("footer.php") ?>

    <?php
    if(isset($_FILES["profile"]["name"])){
      $id = $_GET["id"];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $dob = $_POST['dob'];
      $imgname = $_FILES["profile"]["name"];
      $imgsize = $_FILES["profile"]["size"];
      $tmpname = $_FILES["profile"]["tmp_name"];


        if(empty($imgname)){
            $query1 = "UPDATE user SET fname = '$fname', lname = '$lname',dob = '$dob' WHERE userID = $id";
            mysqli_query($conn, $query1);
            echo "<script>
            document.location.href = 'mainpage.php'
            </script>";

        }else{
            $query2 = "UPDATE user SET fname = '$fname', lname = '$lname',dob = '$dob', icon = '$imgname '  WHERE userID = $id";
        mysqli_query($conn, $query2);
        move_uploaded_file($tmpname, 'profile/' . $imgname);
            echo "<script>
            document.location.href = 'mainpage.php'
            </script>";
        }
        
 
    
    }
    ?>    

</body>
</html>