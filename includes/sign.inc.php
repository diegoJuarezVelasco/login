<?php
    
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password-repeat'];
        require_once "db.inc.php";
        require_once "functions.inc.php";    
        
        /*Validating user's inpur*/
        if(emptyInputSignup($username,$email, $password, $passwordRepeat) !== false) {
            header("location: ../sign.php?error=emptyinput");
            exit(); /*stops the script for running*/
        
        }
        if(invalidUid($username) !== false) {
            header("location: ../sign.php?error=invalidUid");
            exit(); /*stops the script for running*/
        }
        if(invalidEmail($email) !== false) {
            header("location: ../sign.php?error=invalidEmail");
            exit(); /*stops the script for running*/
        }
        if(passwordMatch($password, $passwordRepeat) !== false) {
            header("location: ../sign.php?error=passwordsdontmatch");
            exit(); /*stops the script for running*/
        }
        if(uidExists($conn, $username, $email) !== false) {
            header("location: ../sign.php?error=usernamealreadytaken");
            exit(); 
        }
        createUser($conn, $username, $email, $password);
        
    } else {
        header("location: ../sign.php");
        exit();
        
    }
