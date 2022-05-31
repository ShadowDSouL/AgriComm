<?php
  session_start();
    include_once("conn.php");

    //by default GET
    $postID = $_GET['postID'];
    if($postID == null){
        // header('Location: mainpage.php');
    }else{
        if(isset($_POST['btnUpdate'])){
            $title = $_POST["txttitle"];
            $body = $_POST["txtbody"];
            
            $update_query ="UPDATE `post` SET `title`='$title',
                `content`='$body'
                WHERE postID='$postID'";
                //execute
                if(mysqli_query($conn,$update_query)){
                    echo "Your post has been successfully updated!";
                    header("Location: mainpage.php");
                }else{
                    echo "Error in updating your post";
                }
            }       
        }
?> 

<style>
html,body{
  width: 100%;
  margin: auto;
}


h2{
  text-align: center;
}

.editpost{
  border: 3px solid #f1f1f1;
  width: 50%;
  margin: auto;
  padding: 20px;
}
input[type=text], input[type=textarea]{
  width: 100%;
  padding: 15px 20px;
  margin: 10px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[name=txtbody]{
  height:25%;
}
input[name=btnUpdate], button[name=btnCancel]{
  background-color:blanchedalmond;
  color: black;
  padding: 14px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
input[name=btnUpdate]:hover, button[name=btnCancel]:hover{
  opacity: 0.5;
}
.post-wraper{
  padding-top: 20px;
}


</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriComm</title>
</head>
<body>
      <?php include("mpheader.php") ?>
      
        <hr>

        <form action="#" method="post" name="editpost" id="editpost">
            <h2>Edit Post</h2>
            <div class="editpost">
            <?php
            // 1st step - retrieve the data using $id
                $sql_query = "SELECT * FROM post WHERE postID='$postID'";
                $result = mysqli_query($conn,$sql_query);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <label for="title"><b>Title</b></label>
            <input type="text" name="txttitle" id="txttitle" value='<?php echo $row["title"]; ?>' class="form-control"><br>
            <label for="body"><b>Body</b></label>
            <input type="textarea" name="txtbody" id="txtbody" value='<?php echo $row["content"]; ?>'class="form-control"><br>           
            <input type="submit" value="Save Changes" name="btnUpdate">
            <button name="btnCancel"><a href="mainpage.php" style="color: black;" >Cancel</a></button>

         <?php } 
         mysqli_close($conn);
         ?>
            
        </form>
    </div>
    <?php include ('footer.php');?>

</body>
</html>
    