<?php
    /* we need to check for Entery Fields
    1) name is required
    2) Email is Required , validate email with FILTER_VALIDATE_EMAIL
    3) Password is required and the length must not be less than 8 and must have at least
        one letter .
    4) Password should be secure to prevent attacker from accessing the database and see all passwords
        we'll use password_hash() with the password_Default Algorithm (string(60))
    */

    if (empty($_POST['name']))
    {
        die("Name is Required");
    }

    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        die("valid Email is Required");
    }

    if(empty($_POST['password']))
    {
        die("Enter a valid Password");
    }


    if(!preg_match("/[a-z]/i",$_POST['password']))
    {
        die("password must contain at least one letter");
    }
    if(!preg_match("/[0-9]/i",$_POST['password']))
    {
        die("password must contain at least one number");
    }
    if(strlen($_POST['password'])<8)
    {
        die("password must be at least 8 characters");
    }
    // if(empty($_POST['conf_password']))
    // {
    //     die("please Confirm your password");
    // }
    if($_POST['conf_password']!==$_POST['password'])
    {
        die("passwords do not match");
    }

    $password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
    // print_r($_POST);
    // var_dump($password_hash);



    // Let's require the database script directory file
    // DIR
    $mysqli = require __DIR__."/database.php";
    

    // We should avoid SQL INJECTION by attackers using prepared statement or parametrized queried
    // prepare function to pass the parameters and bind_param to pass parameters to placeholders

    $query="INSERT INTO user(name, email, password_hash) VALUES(?,?,?)";
    // we should initialize the a new prepared statement
    $stmt= $mysqli->stmt_init();
    // we should check for sql connection table
    // if the condition is true then it is connected to sql successfully
    if(!$stmt->prepare($query)){
        die("SQL error : ".$mysqli->error);
    }
    // pass the parameters to the placeholders => ?,?,?
    // bind_param()
    $stmt->bind_param("sss",$_POST['name'],$_POST["email"],$password_hash);
    if($stmt->execute()){
        header("Location: \Divo Project\Home\Home.php"); // Direct me to the The successful sign up page 
        exit;
    }
    else{
        if($mysqli->errno == 1062){ // Duplicate entry error no in the database.
            die("Email is already taken");
        }
        else{
        die($mysqli->error." ".$mysqli->errno);  // Display The Error and the error no 
        }
    }
?>

<?php 
// My team members are so dummy that they forgot to complete my id
// In the about us page
?>