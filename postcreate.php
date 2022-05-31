<?php
  include_once("conn.php");
    if(isset($_FILES["img"]["name"])){
      $title = $_POST["txttitle"];
      $body = $_POST["txtbody"];
      $date = date("Y-m-d");

      $imgName = $_FILES["img"]["name"];
      $imgSize = $_FILES["img"]["size"];
      $tmpName = $_FILES["img"]["tmp_name"];

      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imgName);
      $imageExtension = strtolower(end($imageExtension));
      if(!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'mainpage.php';
        </script>
        ";
      }

      elseif ($imgSize > 1200000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
            document.location.href = 'mainpage.php';
          </script>
          ";
        }
        elseif(empty($title && $body)){
          echo
          "
          <script>
          alert('Please fill out the field.');
            document.location.href = 'mainpage.php';
          </script>
          ";
        }else{


          $sql = "INSERT INTO `post`(`title`, `content`, `post_date`, `post_img`, `userID`) VALUES ('$title', '$body', '$date', '$imgName', '$_SESSION[userID]')";
          mysqli_query($conn, $sql);
          move_uploaded_file($tmpName, 'postimg/' . $imgName);
          echo
          "
          <script>
          document.location.href = 'mainpage.php';
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
  <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="post.css">
  <title>AgriComm</title>
</head>
<body>

    <form action="" enctype="multipart/form-data" method="POST" name="frmpost" id="frmpost" >
      <h2>Create post</h2>
      <div class="createpost">
        <label for="title"><b>Title</b></label>
        <input type="text" name="txttitle" id="txttitle" placeholder="Title......">
        <label for="body"><b>Body</b></label>
        <input type="text" name="txtbody" id="txtbody" placeholder="What's on your mind ?">
        <input type="file" name="img" id="imgupload">
        <button type="submit" name="btnpost">Post</button>
        <button name="close" id="close" onclick="closeform()">Cancel</button>  
      </div>        
    </form>


  <script>
    function openform(){
      document.getElementById("frmpost").style.display="block";
    }
    function closeform(){
      document.getElementById("close").style.display = "none";
    }
  </script>

</body>
</html>