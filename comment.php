<?php 

session_start();
include_once("conn.php");
if(isset($_GET['type'],$_GET['id'])){
    $type = $_GET['type'];
    $id = (int)$_GET['id']; // know the who post this post 
                
    $comment_sql = "SELECT comment.commentID, comment.userID, comment.postID, comment.comment_date, comment.message, post.postID, user.userID, user.fname, user.lname, user.icon FROM comment
                    INNER JOIN user ON comment.userID = user.userID
                    INNER JOIN post ON comment.postID = post.postID
                    WHERE post.postID = '$id'
                    GROUP BY comment.commentID";
                
    $result1= mysqli_query($conn, $comment_sql);

    while($row = mysqli_fetch_assoc($result1)){
        $comments[]=$row; 
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,300&family=Shizuru&family=Syne+Tactile&display=swap" rel="stylesheet">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AgriComm</title>
</head>
<body>
<?php include("mpheader.php") ?>

    <div class="commentsection" style="background-color: rgba(250, 235, 215, 0.401); border-radius:25px; padding:15px;">
        <div class="container mt-5 mb-5">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="p-3">
                            <h6>Comments</h6>
                        </div>
                        <?php if(isset($comments)){?>
                            <?php foreach((array)$comments as $comment){ ?> 
                                <div class="container mt-3 mb-4">
                                    <div class="row height d-flex justify-content-center align-items-center">
                                        <div class="col-md-0">
                                            <div class="card">
                                                <div class="mt-2">
                                                    <div class="d-flex flex-row p-3"><img src="profile/<?php echo ($comment['icon']) ?>" width="40" height="40" class="rounded-circle mr-3">
                                                        <div class="w-100">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex flex-row align-items-center"><span class="mr-2"> <?php echo $comment["fname"]. " ". $comment["lname"] ?></span>  </div> <small><?php echo $comment["comment_date"] ?></small>
                                                            </div>
                                                            <p class="text-justify comment-text mb-0"><?php echo $comment["message"] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <form action="" method="POST" name="frmcomment" id="frmcomment" style="text-align: center;"> 
                            <input type="text" name="txtcmt" id="txtcmt" placeholder="Write here......" style="border-radius: 25px;"><input type="submit" value="Comment" name="btncomment" style="border-radius: 25px;">
                        </form>   
                        <br>      
                    </div>  
                </div>
            </div>
        </div>
    </div>


          
<?php } ?>

<?php   
    if(isset($_POST["btncomment"],$_GET['id'])){
        $message = $_POST["txtcmt"];
        $post_id = (int)$_GET['id'];
        if(!empty($message)){
            $comment_insert_sql = "INSERT INTO `comment`(`userID`, `postID`, `message`) VALUES ('$_SESSION[userID]', '$post_id', '$message')";
            $result = mysqli_query($conn, $comment_insert_sql);
        }else{
            echo "<script> alert('Please Fill in the messages') </script>";
        }
    }
?>

    <?php mysqli_close($conn); ?>

    <?php include("footer.php") ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
