<?php
    session_start();
    include_once("conn.php");

    if(isset($_POST["txtUsername"])){
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];

        
        $sql_query1 = "SELECT * FROM admin WHERE admin_name='$username' AND admin_password='$password'";
        $result_admin = mysqli_query($conn, $sql_query1);
        $row_admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
        // This is the admin login session
        if($username==="admin" & $password==="admin123"){
            echo "Welcome back, Admin!";
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $row_admin['adminID'];
            $_SESSION['fullname'] = $row_admin['admin_name'];
            $_SESSION['photo'] = $row_admin['admin_icon'];
            header("Location: admin.php");
        }else{
            $sql_query2 = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result_user = mysqli_query($conn, $sql_query2);
            $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
            // This is the user login session
            // If user exists, then the result will get 1, else get 0
            $count_user = mysqli_num_rows($result_user);
            if($count_user==1){
                echo "Login successfully";
                $_SESSION['loggedin'] = true;
                $_SESSION['userID'] = $row_user['userID'];
                $_SESSION['fullname'] = $row_user['first_name'] . " " . $row_user['last_name'];
                $_SESSION['photo'] = $row_user['icon'];
                header("Location: mainpage.php");
            }else{
                echo "<script>alert('Please check again your username and password')</script>";
            }
        }      
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
    <link rel = "icon" href ="img/agronomy.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,300&family=Shizuru&family=Syne+Tactile&display=swap" rel="stylesheet">
    <!-- This bootstrap website influence my code, so I edited it and put it in external css file -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bs.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <script src="https://kit.fontawesome.com/16a1688951.js" crossorigin="anonymous"></script>   
</head>
<body>   
    <?php include("header.php")?>
    
    <div class="content">
        <form class="box1" id ="form" method="POST" action="#">           
            <h1>Login</h1> 
            <div class="form-control1">
                <label>
                    <input type="text" name="txtUsername" placeholder="Username" id="username">
                </label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control1">
                <label>
                    <input type="password" name="txtPassword" placeholder="Password" id="password">
                </label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <label><input type="submit" name="login" value="Login"></label>
            <div class="signup-link">
                Not a member? <a href="register20.php">SignUp now</a>
            </div>
        </form>
    </div>
    <?php include("footer.php")?>
    
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="login.js"></script>
</body>
</html>