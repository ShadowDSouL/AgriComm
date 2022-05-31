<?php
    session_start();
    include_once('conn.php');

    if(isset($_GET['type'],$_GET['id'])){
        $type = $_GET['type'];
        $id = (int)$_GET['id'];
    
        $sql_delete = "DELETE FROM post WHERE `postID`='$id'";
        if(mysqli_query($conn,$sql_delete)){
            echo "<script>alert('The post has been successfully deleted!');</script>";
            header("Location: mainpage.php");
        }else{
            echo "<script>alert('Error in deleting the post');</script>";
        }           
    }
    mysqli_close($conn);
?>