<?php
    session_start();
    include_once("conn.php");
    $sql = "SELECT * FROM crop";
    $result = mysqli_query($conn, $sql);

?>
<style>
    a{
        color: black;
        text-decoration: none;
    }
    a:hover{
        color: blue;
    }

    .crop{
        width: 100%;
        margin: auto;
    }
    .addcrop{
        float: right;
        border: 1px solid;
        padding: 5px;
        border-radius: 10px;
        margin-right: 150px;
        margin-top: 10px;
    }
    .addcrop a{
        padding: 10px;
    }
    .crop h2{
        padding-left: 200px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link rel="stylesheet" href="mainpage.css">
    <title>AgriComm</title>  
</head>
<body>

    <?php include("apheader.php") ?> 

    <div class="sidebar" style="height: auto; margin-top:25px; margin-left:50px;">
        <ul>
            <li><a href="admin.php">Posts</a></li>
            <li><a href="admincrop.php">Crop List</a></li>
            <li><a href="memberList.php">Member list</a></li>
        </ul>
    </div>
    <div class="crop">
        <h2>Crop List</h2>
        <table border=3px solid #f1f1f1 style="width: 80%; margin:auto;">
        <tr>
            <th style="width: 60px;">Crop ID <hr></th>
            <th style=" width:150px; text-align: center;">Image <hr></th>
            <th style="width: 130px; text-align: center;">Crop Name <hr></th>
            <th style="text-align: center;">Description <hr></th>
        </tr>
        <?php
            while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td align="center"><?php echo $row["crop_ID"] ?></td>
                    <td align="center"><img src="assimg/<?php echo $row["image"]?>" alt="img" width="100px"></td>
                    <td align="center"><?php echo $row["crop_name"]?></td>
                    <td><?php echo $row["body"]?><hr></td>
                    <td style="width: 110px;"><a href="cropedit.php?id=<?php echo $row["crop_ID"] ?>">&nbsp;&nbsp; Edit |</a>                                 
                        <a href="cropdelete.php?id=<?php echo $row["crop_ID"] ?>"> Delete</a> 
                    </td>
                </tr>
                
        <?php    }
        ?>

        
        </table>
        <div class="addcrop">
            <a href="addcrop.php">Add</a>
        </div>
    </div>

<?php mysqli_close($conn) ?>
<?php include("footer.php") ?>
</body>
</html>