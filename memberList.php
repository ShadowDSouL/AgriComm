<?php
    session_start();
    include_once('conn.php');
    $sql = "SELECT * FROM user ORDER BY userID DESC";
    $result = mysqli_query($conn, $sql);
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
    <title>Member List</title>
    
</head>
<body> 
    <?php include("apheader.php") ?>  
    <br>

    <div class="wraper">
        <div class="sidebar">
            <ul>
                <li><a href="admin.php">Posts</a></li>
                <li><a href="admincrop.php">Crop List</a></li>
                <li><a href="#memberList">Member list</a></li>
                
            </ul>
        </div>
        <div class="post_content" id="memberList">
            <h2>Member List</h2>
            <?php 
                if (mysqli_num_rows($result) > 0){
                    echo "There are record to display...";?>               
                    <table border=2 style="width: 950px;">
                        <tr>
                            <th>User ID</th>
                            <th>Icon</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Email</th>
                        </tr>
                        <?php while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?php echo $row["userID"]; ?></td>
                            <td><?php echo '<img src="profile/'.$row["icon"]. '" alt="picture" width="50" height="50">'; ?></td>
                            <td><?php echo $row["fname"]; ?></td>
                            <td><?php echo $row["lname"]; ?></td> 
                            <td><?php echo $row["dob"]; ?></td>        
                            <td><?php echo $row["gender"]; ?></td>  
                            <td><?php echo $row["email"]; ?></td>         
                            <td>
                                <!-- localhost/wddt/edit.php?id=2001 -->
                                <a href="deleteMember.php?userID=<?php echo $row["userID"]; ?>">Delete Account</a> 
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
            <?php 
                }else{
                    echo "No records to display...";
                }
                ?>  
        </div>
        
    </div>                 
    <?php mysqli_close($conn); ?>

    <?php include("footer.php") ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>