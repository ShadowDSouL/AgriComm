<?php 
    include_once("conn.php");
    $sql = "SELECT post.postID, post.title, post.content, post.post_date, post.post_img, SUM(post.post_like) AS likes, user.userID, user.fname, user.lname, user.icon FROM post 
            INNER JOIN user 
            ON post.userID = user.userID 
            WHERE user.fname = '$name' OR user.lname = '$name'
            GROUP BY post.postID ORDER BY post.post_date DESC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $profiles[] =$row;
    }
    if(isset($profiles)){
    foreach($profiles as $profile){   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <title>AgriComm</title>
</head>
<body>
<?php if(!empty($profile["title"] || !empty($profile["content"]) )){ ?>
    <div class="post-container mt-0 mb-5 w-100  ">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-9">
                <div class="card" style="background-color:rgba(250, 235, 215, 0.301);">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center"><img src="profile/<?php echo $profile["icon"] ?> " alt="picture" width="50" height="50" class="rounded-circle mr-3">
                            <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">&nbsp;<?php echo  $profile["fname"]. " ". $profile["lname"] ?></span></div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $profile["post_date"] ?></small> 
                        <?php if($_SESSION['userID']===$profile['userID']){ ?> 
                            <div class="dots">
                                <div class="menu-nav">
                                    <div class="dropdown-container" tabindex="-1">
                                        <div class="three-dots">
                                            <div class="dropdown"></div>
                                                <ul>
                                                    <li><a href="edit_post.php?postID=<?php echo $profile["postID"]?>"><small>Edit</small></a></li>
                                                    <li><a href="delete_post.php?type=post&id=<?php echo $profile["postID"]?>"><div><small>Delete</small></div></a></li>
                                                </ul>                                                                
                                            
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        <?php } ?>
                        </div>
                    </div> 
                    <div class="imgcontainer mx-auto" style="width: 75%;" >
                    <?php  if(!empty($profile['post_img'])){ ?>
                        <img src="postimg/<?php echo $profile["post_img"]?>" alt="picture" width="100%; text-algin:center;">
                    <?php } ?>
                    </div>

                    <div class="p-2">
                        <p class="text-justify"><?php echo $profile['title'] . "<br>". "<br>" . $profile["content"] ?></p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center"><small><a href='like.php?type=post&id=<?php echo $profile["postID"] ?>'><?php echo $profile["likes"] ?> Like</a>
                                &nbsp; <a href="comment.php?type=post&id=<?php echo $profile["postID"] ?>" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Comment</a> </small>
                            </div>
                        </div>
                        <hr>  
            
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php }?>
<?php } ?>
<?php } ?>
</body>
</html>