<?php 
session_start();


include_once("conn.php");

    $sql = "SELECT post.postID, post.title, post.content, post.post_date, post.post_img, SUM(post.post_like) AS likes, 
            user.userID, user.fname, user.lname, user.icon FROM post 
            INNER JOIN user 
            ON post.userID = user.userID 
            GROUP BY post.postID 
            ORDER BY post.post_date DESC";
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
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,300&family=Shizuru&family=Syne+Tactile&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="mainpage.css">
    <title>AgriComm</title>
</head>
<body>
    <?php include("mpheader.php") ?> 
    <br>

    <div class="wraper">
        <div class="sidebar">
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="#" onclick="openform()">Posts</a></li>
                <li><a href="mpcrop.php">Crop</a></li>
            </ul>
        </div>
            
        <div class="post_content">
            <?php include("postcreate.php") ?>

            <?php foreach($posts as $post){ ?>
                <?php if(!empty($post["title"] && !empty($post["content"]) )){ ?>
                    <div class="post-container mt-0 mb-5 w-100  ">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-md-9">
                                <div class="card" style="background-color:rgba(250, 235, 215, 0.301);">
                                    <div class="d-flex justify-content-between p-2 px-3">
                                        <div class="d-flex flex-row align-items-center"><img src="profile/<?php echo $post["icon"] ?> " alt="picture" width="50" height="50" class="rounded-circle mr-3">
                                            <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">&nbsp;<?php echo  $post["fname"]. " ". $post["lname"] ?></span></div>
                                        </div>
                                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $post["post_date"] ?></small> 
                                            <?php if($_SESSION['userID']===$post['userID']){ ?>
                                            <div class="dots">
                                                <div class="menu-nav">
                                                    <div class="dropdown-container" tabindex="-1">
                                                        <div class="three-dots"></div>
                                                            <div class="dropdown">
                                                                <ul>
                                                                    <li><a href="edit_post.php?postID=<?php echo $post["postID"]?>"><small>Edit</small></a></li>
                                                                    <li><a href="delete_post.php?type=post&id=<?php echo $post["postID"]?>"   onclick="return confirm
                                                                ('Warning!\nAre you sure you want to delete this post?\nPress OK if you wish to proceed.')"><div><small>Delete</small></div></a></li>
                                                                </ul>                                                                
                                                            </div>
                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <div class="imgcontainer mx-auto" style="width: 75%;" >
                                        <?php  if(!empty($post['post_img'])){ ?>
                                            <img src="postimg/<?php echo $post["post_img"]?>" alt="picture" width="100%; text-algin:center;">
                                        <?php } ?>
                                    </div>

                                    <div class="p-2">
                                        <p class="text-justify"><?php echo $post['title'] . "<br>". "<br>" . $post["content"] ?></p>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row icons d-flex align-items-center"><small><a href='like.php?type=post&id=<?php echo $post["postID"] ?>'><?php echo $post["likes"] ?> Like</a>
                                            &nbsp; <a href="comment.php?type=post&id=<?php echo $post["postID"] ?>" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Comment</a> </small></div>
                                        </div>
                                        <hr>  
                
                                    </div>
 
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
            <button
                type="button"
                class="btn btn-danger btn-floating btn-lg"
                id="btn-back-to-top"
                >
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>


    <?php include("footer.php") ?>
    <?php mysqli_close($conn) ?>
    <script>
        let button = document.getElementById("btn-back-to-top");

    
        window.onscroll = function () {
        scroll();
        };
    // When the user scrolls down 20px from the top of the document, show the button
        function scroll() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
        }
    // When the user clicks on the button, scroll to the top of the document
        button.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>