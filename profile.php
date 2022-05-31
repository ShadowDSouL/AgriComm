<?php
session_start();
include_once("conn.php");

    if(isset($_SESSION['userID'])){
        $id = $_SESSION['userID'];
        $sql = "SELECT COUNT(post.postID) AS postnum, user.fname, user.lname, user.dob, user.gender, user.email, user.icon, user.userID  FROM user 
                INNER JOIN post
                ON user.userID = post.userID
                WHERE user.userID = '$_SESSION[userID]' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }
    if(isset($_SESSION['userID'])){
        $id = $_SESSION['userID'];
        $posts="SELECT post.postID, post.title, post.content, post.post_date, post.post_img, SUM(post.post_like) AS likes, user.userID, user.fname, user.lname, user.icon FROM post 
                RIGHT JOIN user 
                ON post.userID = user.userID 
                WHERE user.userID = '$_SESSION[userID]'
                GROUP BY post.postID 
                ORDER BY post.post_date DESC";
        $post_result = mysqli_query($conn,$posts);
         while($post = mysqli_fetch_assoc($post_result)){
             $details[]=$post;
         }
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



  <section class="h-100 gradient-custom-2" style="width: 90%; margin:auto;">
    <div class="profile_container py-5 h-100 ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-7">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: rgba(250, 235, 215, 0.401); height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="profile/<?php echo ($row['icon'])?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                
                <a href="editprofile.php?id=<?php echo $row['userID'] ?>" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">Edit profile</a>
                
              </div>
              <div class="ms-3" style="margin-top: 130px; color:black;">
                <h5><?php echo $row['fname'] . " " .$row['lname'] ?></h5>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <?php if(isset($row['postnum'])){
                    echo '<p class="mb-1 h5">' . $row['postnum']. '</p>';
                  }else{
                    echo '<p class="mb-1 h5">0</p>';
                  }?>
                  <p class="small text-muted mb-0">Posts</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">Date of Birth: <?php echo $row["dob"]; ?></p>
                  <p class="font-italic mb-1">Email: <?php echo $row["email"]; ?></p>
                  <p class="font-italic mb-0">Gender: <?php echo $row["gender"]; ?></p>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Recent Post</p>
              </div>
              <?php if(isset($details)){ ?>
                <?php foreach($details as $post){ ?>
                        <?php if(!empty($post["title"] || !empty($post["content"]) )){ ?>
                            <div class="post-container mt-5 mb-5 w-100  ">
                                <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-9">
                                        <div class="card" style="background-color:rgba(250, 235, 215, 0.301);">
                                            <div class="d-flex justify-content-between p-2 px-3">
                                                <div class="d-flex flex-row align-items-center"> <?php echo '<img src="profile/'.$post['icon'].'" alt="picture" width="50" height="50" class="rounded-circle mr-3">'?>
                                                    <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">&nbsp;<?php echo  $post["fname"]. " ". $post["lname"] ?></span></div>
                                                </div>
                                                <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $post["post_date"] ?></small>
                                                    <div class="postsetting">
                                                        <div class="menu-nav">
                                                            <div class="dropdown-container" tabindex="-1">
                                                                <div class="three-dots"></div>
                                                                    <div class="dropdown">
                                                                        <a href="edit_post.php?postID=<?php echo $post['postID']; ?>"><small>Edit</small></a>
                                                                        <a href="delete_post.php?type=post&id=<?php echo $post['postID']; ?>" onclick="return confirm('Warning!\nAre you sure you want to delete this post?\nPress OK if you wish to proceed.')"><div><small>Delete</small> </div></a>
                                                                    </div>
                                                                </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="imgcontainer mx-auto" style="width: 75%;" >
                                                <?php  if(!empty($post['post_img'])){
                                                    echo '<img src="postimg/'. $post['post_img'] . '" alt="picture" width="100%; text-algin:center;"';
                                                }
                                                ?>
                                                
                                            </div>

                                            <div class="p-2">
                                                <p class="text-justify"><?php echo $post["title"] ."<br>".$post["content"] ?></p>
                                                <hr>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex flex-row icons d-flex align-items-center"><small><a href='like.php?type=post&id=<?php echo $post["postID"] ?>'><?php echo $post["likes"] ?> Like</a>
                                                    &nbsp; <a href="comment.php?type=post&id=<?php echo $post["postID"] ?>" >Comment</a> </small></div>
                                                </div>
                                                <hr>  
                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                  <?php }?>
              <?php }?>
 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






<?php mysqli_close($conn) ?>



  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
  <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>