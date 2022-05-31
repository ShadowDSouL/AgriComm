<?php 
include_once("conn.php");
    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="category.css">
    <title>Agri Comm</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ebeab0;">
        <div class="container-fluid ">
            <a class="navbar-brand " href="homepage.php"><span style="font-weight: 900; color:#452c04;">AGRICOMM</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="homepage.php#about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Categories</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="login.php" >Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <div class="searchbar">
         <form action="" name="search" id="search"  method="POST">
            <input type="text" name="txtsearch" id="txtsearch" placeholder="Search......" size="50">
            <input type="submit" value="Search" name="btnsearch" id="btnsearch" class="btnsearch">
        </form>
    </div>

    <?php 
    if(isset($_POST["btnsearch"])){
        $search = $_POST["txtsearch"];
        $query = "SELECT * FROM crop WHERE crop_name LIKE '%{$search}%'";
        $result = mysqli_query($conn, $query);?>
        <div class="plant-wraper" style="background-color: rgba(250, 235, 215, 0.401); width:95%; margin:auto; border-radius:25px;">
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
    <?php }else{ echo "<p style='height:500px;'>" ?>
    <?php } ?>
   
    <?php mysqli_close($conn);?>
    <?php include("footer.php") ?>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>