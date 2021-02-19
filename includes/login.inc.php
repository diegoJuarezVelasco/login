<?php
if (isset($_POST['submit'])) {
    $usernameOrEmail = $_POST['email-user'];
    $password = $_POST['password'];

    require_once "db.inc.php";
    require_once "functions.inc.php";
    
    if(emptyInputLogin($usernameOrEmail, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit(); /*stops the script for running*/
    }
    loginUser($conn, $usernameOrEmail, $password);

} else {
    header("location: ../login.php");
    exit();
}
