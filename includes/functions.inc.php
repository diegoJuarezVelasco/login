 <?php
function emptyInputSignup($username,$email, $password, $passwordRepeat) {
    $result; 
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($username) {
    $result; 
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function passwordMatch($password, $passwordRepeat) {
    $result; 
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid =? OR usersEmail =?;";
    $stmt = mysqli_stmt_init($conn); /*Creating a prepared statement*/
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt); /*executes the statement*/

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt); /*closes the statement*/
} 

function createUser($conn, $username, $email, $password) {
    $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES(?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); /*Creating a prepared statement*/
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); /*Hashing the password*/


    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt); /*executes the statement*/
    mysqli_stmt_close($stmt); /*closes the statement*/
    header("location: ../sign.php?error=none");
    exit();
}
function emptyInputLogin($usernameOrEmail, $password) {
    $result; 
    if (empty($usernameOrEmail) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser ($conn, $usernameOrEmail, $password ) {
    $uidExists = uidExists($conn, $usernameOrEmail, $usernameOrEmail);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronguseroremail");
        exit();
    }
    $passwordHashed = $uidExists["usersPwd"]; /*Extracts the hashed password from the database */
    $checkPassword = password_verify($password,$passwordHashed); /* verify if the hashed password matches the user input */

    if($checkPassword === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($checkPassword === true) {
        header("location: ../main.php");
        session_start();   
        $_SESSION['userid'] = $uidExists["usersId"];
        $_SESSION['useruid'] = $uidExists["usersUid"];
        
        
    }

}