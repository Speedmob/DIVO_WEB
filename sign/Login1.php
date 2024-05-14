<?php
    // Declare a global variable to keep track of the email when the form is submitted
    $is_invalid=false;

    // check for the server information
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
            // CONNECT TO THE DATABASE
            $mysql = require __DIR__."/database.php";
            // retrieve the email from the database and format it with the real escape string 
            // To prevent sql injection attacks
            $sql= sprintf("SELECT * FROM user WHERE email='%s'",
                                $mysqli->real_escape_string($_POST["email"]));
            
            // Declare a variable result to store the query 
            $result=$mysqli->query($sql);
            // put the query in an associative array 
            $user=$result->fetch_assoc();

            // check if the record is found in the database 
            // then verify the passsword and match it to the encrypted password_hash
            if($user)
            {
                // verify passsword
                if(password_verify($_POST["password"],$user["password_hash"]))
                {
                    // if true and the passwords match then start a session and store the id of the user
                    //then direct the user to the Home page  
                    session_start();
                    $_SESSION["user_id"]=$user["id"];
                    header("Location: \Divo Project\Home\Home.php");
                    exit;
                }
            }
            // the form is submitted
            $is_invalid=true;
    }
?>

<!-- --------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIVO-Signin & Signout</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="icon" href="/Divo project/images/divo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function itworks() {
            document.getElementById('signup-Username').style.visibility = 'visible';
        }
    </script>
</head>

<body>
    <header class="header">
        <nav class="navbar">
        <a href="/DIVO project/Home/Home.php">Home</a>
            <a href="/DIVO project/Services/Services.html">Services</a>
            <a href="/DIVO project/Store_Updated/shopping cart/products.php">Stores</a>
            <a href="/DIVO project/About/About.html">About</a>
        </nav>
        <form action="#" class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
        <a class="user" href="/DIVO project/sign/login1.php"><img style="width: 40px;" src="/DIVO project/images/user.png"></i></a>
    </header>
    <div class="background"></div>
    <div class="container">
        <div class="content">
            <span style="text-align: center;"><h2 class="logo"><img style="width: 50px; position: relative; top: 5px;right: 20px;" src="/DIVO project/images/divo.png">Welcome to DIVO</h2></span>
            <div class="text-sci">
                <h2>"Fix Your PC Quick & Safe"</h2><br>
                <h2></h2>
                <p>By continuing, you agree are setting up a DIVO account and agree to our <a style="color: white;" href="/DIVO project/UserAgreement/UserAgreement.html">User Agreement</a> and <a style="color: white;" href="/DIVO project/PrivacyPolicy/PrivacyPolicy.html">Privacy Policy</a></p>
                
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-gmail'></i></a>
                </div>
            </div>
        </div>
        <div class="logreg-box">
            <div class="form-box login">
                <form method="POST">
                    <h2>Sign In </h2>
                    <!-- if the login is invalid(value = false) -->
                        <?php if($is_invalid):?>
                            <span style="color:red;">Invalid Login</span>
                        <?php endif; ?>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email"  name="email" id="email" value ="<?= htmlspecialchars($_POST["email"]??"")?>">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password"  name="password" id="password">
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Remember me</label>
                        <a href="/Divo project/continue-login/Reset Password.html">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn">Sign In</button>

                    <div class="login-register">
                        <p>Don't have an account?
                            <a href="#" class="register-link">Sign Up</a>
                        </p>
                    </div>

                </form>
            </div>
            <div class="form-box register">
                <form action="process_signup.php" method="POST">
                    <h2>Sign Up </h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" onfocus="itworks()" onblur="itworks()" name="name" id="name">
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" id="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password"  name="password" id="password" >
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="conf_password" id="confirm" >
                        <label>Confirm Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required>I agree to the terms & conditions</label>

                    </div>
                    <button type="submit" class="btn" >Sign Up</button>

                    <div class="login-register">
                        <p>Already have an account?
                            <a href="#" class="login-link">Sign In</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="Login.js"></script>
</body>

</html>