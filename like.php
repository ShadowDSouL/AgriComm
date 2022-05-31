<?php 

session_start();


include_once("conn.php");

if(isset($_GET['type'],$_GET['id'])){
    $type = $_GET['type'];
    $id = (int)$_GET['id'];

    switch($type){
        case 'post';
        
            $likeinsert_sql = "UPDATE `post` SET `post_like` = post_like + 1  WHERE `postID`='$id' LIMIT 1";
            
            $result=mysqli_query($conn,$likeinsert_sql);
        break;
    }
}
header("Location: mainpage.php");


mysqli_close($conn)
?>