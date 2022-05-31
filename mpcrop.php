<?php
    session_start();
    include_once("conn.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>AgriComm</title>
</head>
<body>
    <?php include("mpheader.php") ?>
    <div class="wraper" style="padding-top: 25px;">
        <div class="sidebar" >
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="mpcrop.php">Crop</a></li>
            </ul>
        </div>

        <?php 
            $query = "SELECT * FROM crop";
            $result = mysqli_query($conn, $query);?>
        <div class="plant-wraper" style="background-color: rgba(250, 235, 215, 0.401); width:70%; margin:auto; border-radius:25px; ">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="plants" style="width: 900px; margin:auto; padding:20px">
                    <p>
                        <img src="assimg/<?php echo ($row['image'])?>" alt="pic" width="200px" height="180px">
                        <b><?php echo $row["crop_name"];?><br></b>
                        <?php echo $row["body"];?><br>
                    </p>
                </div>

            <?php } ?>
        </div>
    </div>
            <button
                type="button"
                class="btn btn-danger btn-floating btn-lg"
                id="btn-back-to-top"
            >
                <i class="fas fa-arrow-up"></i>
            </button> 
            

   <?php include("footer.php") ?>
    <?php mysqli_close($conn) ?>

   
    <script>
        let button = document.getElementById("btn-back-to-top");

    
        window.onscroll = function () {
        scroll();
        };

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
 
        button.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>