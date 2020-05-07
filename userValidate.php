<?php
session_start();

$userName = $_REQUEST['userName'];
$passwordPlain = $_REQUEST['password'];

$errors = false;

$userName = validateUserName($userName);
$passwordPlain = validatePasswordPlain($passwordPlain);

if ($errors) {

    if ( !isset( $_SESSION['userNameErr'] )) {
        $_SESSION['userNameOld'] = $userName;
    }

    header("Location: index.php");
    exit();
}

require_once 'connection.php';

$stmt = $pdo->prepare("SELECT userName, password FROM user WHERE userName LIKE :userName");
$stmt->bindParam(":userName", $userName, PDO::PARAM_STR);

if ($stmt->execute()){

    if ($stmt->rowCount() == 1){
        if ($user = $stmt->fetch()){
            $userName = $user['userName'];
            $passwordHash = $user['password'];

            if (password_verify($passwordPlain, $passwordHash)){
                header("Location: home.php");

            } else {

                $_SESSION['passwordErr'] = "Wrong password!";
                $_SESSION['userNameOld'] = $userName;
                header("Location: index.php");
                exit();
            }
        }
    } else {

        $_SESSION ['userNameErr'] = "Wrong username!";
        unset($_SESSION['userNameOld']);
        header("Location: index.php");
        exit();
    }

} else { header("Location: 404.php");
}

unset($stmt);
unset($pdo);

function validateUserName($userName){
    if (empty($userName)){

        $_SESSION ['userNameErr'] = "You must enter Username";
        unset($_SESSION['userNameOld']);
        $GLOBALS ['errors'] = true;

    }
    return trim($userName);
}

function validatePasswordPlain($passwordPlain){
    if (empty($passwordPlain)) {

        $_SESSION['passwordErr'] = "You must enter password";
        $GLOBALS['errors'] = true;

    }
    return $passwordPlain;
}
