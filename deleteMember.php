<?php
    session_start();
    include_once("conn.php");

    //by default GET
    $userID = $_GET['userID'];
    // If no record then go back to previous page
    if($userID == null){
        header('Location: memberList.php');
    }else{
        if(isset($_POST['btnDelete'])){
            $delete_query="DELETE FROM `user` WHERE userID='$userID'";
             //execute
             if(mysqli_query($conn,$delete_query)){
                 echo "<script>alert('The member record has been successfully deleted!');</script>";
                 header("Location: memberList.php");
             }else{
                 echo "<script>alert('Error in deleting the record');</script>";
             }
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
        <div class="post_content" id="deleteMember">
            <h2>Delete Member Record</h2>
            <hr>
            <form action="#" method="post" name="frmUpdate">
            <?php
            // 1st step - retrieve the data using $id
                $query = "SELECT * FROM user WHERE userID='$userID'";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
            ?>  
                <table style="margin-left: 30%;">
                    <tr>
                        <th colspan="2" style="height: 130px;">
                            <p style="text-align: center;">
                                <?php echo '<img src="profile/'.$row["icon"]. '" alt="picture" width="150" height="150">'; ?>
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td> : <input type="text" value='<?php echo $row["fname"]; ?>'disabled><br></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td> : <input type="text" value='<?php echo $row["lname"]; ?>'disabled><br></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td> : <input type="email" value='<?php echo $row["email"]; ?>'disabled><br></td>
                    </tr>
                    <tr>
                    <td>

                    </td>
                    <td>
                        <br> &nbsp;
                        <button name="btnDelete" onclick="return confirm
                        ('Warning!\nAre you sure you want to delete this member record?\nPress OK if you wish to proceed.')"> Delete Member </button>
                        <button><a href="memberList.php" style="color: black;"> Cancel </a></button>
                    </td>
                </tr>
                </table>

            <?php } 
            mysqli_close($conn);
            ?>       
            </form>
        </div>
            
    <?php include("footer.php") ?>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>