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
                    header("Location: Home.html");
                    exit;
                }
            }
            // the form is submitted
            $is_invalid=true;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <div class="box">
            <h1>Login</h1>
            
            <!-- if the login is invalid(value = false) -->
            <?php if($is_invalid):?>
                <em>Invalid Login</em>
            <?php endif; ?>    




            <form method="POST">
                <div>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email"
                    value ="<?= htmlspecialchars($_POST["email"]??"")?>">
                </div>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password">
                </div>
                    <input type="submit" value="Register">
            </form>
</body>
</html>