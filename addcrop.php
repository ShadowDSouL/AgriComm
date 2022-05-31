<?php
    session_start();
    include_once("conn.php");
    if(isset($_FILES["cropimg"]["name"])){
        $name = $_POST['txtname'];
        $desc = $_POST['txtdesc'];
  
        $imageName = $_FILES["cropimg"]["name"];
        $imageSize = $_FILES["cropimg"]["size"];
        $tmpName = $_FILES["cropimg"]["tmp_name"];
  
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
  
          if ($imageSize > 1200000){
            echo
            "
            <script>
              alert('Image Size Is Too Large');
              document.location.href = 'admincrop.php';
            </script>
            ";
          }
          elseif(empty($name || $desc)){
            echo
            "
            <script>
              alert('Please fill out the field.');
              document.location.href = 'admincrop.php';
            </script>
            ";
          }else{
  
            $sql = "INSERT INTO `crop`(`crop_name`, `image`, `body`) VALUES  ('$name',  '$imageName','$desc')";
            mysqli_query($conn, $sql);
            move_uploaded_file($tmpName, 'assimg/' . $imageName);
            echo
            "
            <script>
            document.location.href = 'admincrop.php';
            </script>
            ";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link rel="stylesheet" href="mainpage.css">
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
          <h2 style="text-align: center;">Add Crop Information</h2>
          <hr>
          <form action="" method="POST" name="frminsert" enctype="multipart/form-data">
            <table style="margin-left: 30%;">
              <tr>
                  <td ><label>Crop Name</label></td>
                  <td> : <input type="text" name="txtname" style="width:402px"></td>
              </tr>
              <tr>
                  <td><label>Description&nbsp; : </label><br></td>
                  <td>&nbsp; <textarea name="txtdesc" cols="40" rows="5"></textarea></td>
              </tr>
              <tr>
                  <td><label>Image</label></td>
                  <td> : <input type="file" name="cropimg" id="cropimg"></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <br> &nbsp;
                    <input type="submit" value="Add">
                    <button><a href="admincrop.php" style="color: black;"> Cancel </a></button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>

    <script type="text/javascript">
      document.getElementById("cropimg").onchange = function(){
        document.getElementById("frminsert").submit();
      };
  </script>
  <?php include("footer.php") ?>
</body>
</html>

