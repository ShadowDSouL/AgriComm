<?php 
    session_start();


    include_once("conn.php");
    // Display all posts exist in the database
    $sql = "SELECT post.postID, post.title, post.content, post.post_date, post.post_img, SUM(post.post_like) AS likes, user.userID, user.fname, user.lname, user.icon FROM post 
            INNER JOIN user ON post.userID = user.userID GROUP BY post.postID ORDER BY post.post_date DESC";
    $result = mysqli_query($conn, $sql);

    //fetch_object only can call with name
    while($post_row = mysqli_fetch_assoc($result)){
        $posts[] = $post_row;
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
    <link rel="stylesheet" href="mainpage.css"> 
    <title>Admin Page</title>  

</head>
<body>
    <?php include("apheader.php") ?> 
    <br>
    
    <div class="wraper">
        <div class="sidebar">
            <ul>
                <li><a href="#post_content">Posts</a></li>
                <li><a href="admincrop.php">Crop List</a></li>
                <li><a href="memberList.php">Member list</a></li>
                
            </ul>
        </div>
            
        <div class="post_content" id="post_content">

            <?php foreach($posts as $post){ ?>
                <?php if(!empty($post["title"] || !empty($post["content"]) )){ ?>
                    <div class="post-container mt-5 mb-5 w-100  ">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-md-9">
                                <div class="card" style="background-color:rgba(250, 235, 215, 0.301);">
                                    <div class="d-flex justify-content-between p-2 px-3">
                                    <div class="d-flex flex-row align-items-center"><img src="profile/<?php echo $post["icon"] ?> " alt="picture" width="50" height="50" class="rounded-circle mr-3">
                                            <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">&nbsp;<?php echo  $post["fname"]. " ". $post["lname"] ?></span></div>
                                        </div>
                                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $post["post_date"] ?></small> 
                                            <div class="postsetting">
                                                <div class="dots">
                                                <div class="menu-nav">
                                                    <div class="dropdown-container" tabindex="-1">
                                                        <div class="three-dots"></div>
                                                            <div class="dropdown">
                                                                <a href="admin_delete_post.php?type=post&id=<?php echo $post['postID']; ?>" 
                                                                onclick="return confirm
                                                                ('Warning!\nAre you sure you want to delete this post?\nPress OK if you wish to proceed.')"><div><small>Delete</small> </div></a>
                                                            </div>
                                                    </div>
                                                </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="imgcontainer mx-auto" style="width: 75%;" >
                                        <?php  if(!empty($post['post_img'])){ ?>
                                            <img src="postimg/<?php echo $post["post_img"]?>" alt="picture" width="100%; text-align:center;">
                                        <?php } ?>
                                        
                                    </div>

                                    <div class="p-2">
                                        <p class="text-justify"><?php echo $post["content"] ?></p>
                                        <hr>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
            
        </div>

    </div>
    <?php include("footer.php") ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>