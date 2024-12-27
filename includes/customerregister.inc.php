<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["submit"])){
    $name = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $pwd = trim($_POST["password"]);
    $pwdRepeat = trim($_POST["confirm_password"]);

    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Password: $pwd <br>";
    echo "Confirm Password: $pwdRepeat <br>";

    require_once'dbh.inc.php';
    require_once'functions.inc.php';


    $emptyInput = emptyInputSignup($name, $email, $pwd, $pwdRepeat);
    $invalidEmail= invalidEmail($email);
    $pwdMatch =pwdMatch($pwd,$pwdRepeat);
    $nameExists = nameExists($conn,$name, $email);
    $nameValid =nameValid($name);
     
    if($emptyInput){
        header("Location:../customerregister.php?error=emptyinput");
        exit();
    }
    if($invalidEmail){
        header("Location:../customerregister.php?error=invalidEmail");
        exit();
    }
    if($pwdMatch){
        header("Location:../customerregister.php?error=passwordsdontmatch");
        exit();
    }
    if($nameExists){
        header("Location:../customerregister.php?error=usrnametaken");
        
        exit();
    }
    if($nameValid){
        header("Location:../customerregister.php?error=usrnamenotvalid");
        exit();
    }

    createUser($conn, $name, $email, $pwd);



    header('Location: ../customerlogin.php?Registration=success');
    exit();
} else {
    header("Location: ../customerregister.php");
    exit();
}
