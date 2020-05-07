<?php
session_start();

$uid = uniqid();
$name = $_REQUEST['name'];
$ram = $_REQUEST['ram'];
$fee = $_REQUEST['fee'];

$errors = false;

$name = validateName($name);
$ram = validateRam($ram);
$fee = validateFee($fee);

if ($errors) {

   if ( !isset( $_SESSION['nameErr'] )) {
       $_SESSION['nameOld'] = $name;
   }
    if ( !isset( $_SESSION['ramErr'] )) {
        $_SESSION['ramOld'] = $ram;
    }
    if ( !isset( $_SESSION['feeErr'] )) {
        $_SESSION['feeOld'] = $fee;
    }

    header("Location: home.php");
    exit();
}

require_once 'connection.php';

$stmt = $pdo->prepare("INSERT INTO machine(uid, name, ram,fee) VALUES (:uid, :name, :ram, :fee)");

$stmt->execute([
    'uid' => $uid,
    'name' => $name,
    'ram' => $ram,
    'fee' => $fee
]);

header("Location: home.php");

function validateName($name){
    if (empty($name)){
       $_SESSION ['nameErr'] = "Name cannot be empty";
       unset($_SESSION['nameOld']);
       $GLOBALS ['errors'] = true;

    }elseif (strlen($name) < 3) {
        $_SESSION ['nameErr'] = "Name too short";
        unset($_SESSION['nameOld']);
        $GLOBALS ['errors'] = true;

    }else if (strlen($name) > 25){
        $_SESSION ['nameErr'] = "Name too long";
        unset($_SESSION['nameOld']);
        $GLOBALS ['errors'] = true;
    }

    return trim($name);
}

function validateRam($ram){
    if (empty($ram)) {
        $_SESSION['ramErr'] = "RAM cannot be empty";
        unset($_SESSION['ramOld']);
        $GLOBALS['errors'] = true;

    } elseif (! filter_var($ram, FILTER_VALIDATE_INT)) {
        $_SESSION['ramErr'] = "RAM must be number";
        unset($_SESSION['ramOld']);
        $GLOBALS['errors'] = true;

    } else {
        $ram = (int) $ram;
        if ($ram < 1 OR $ram > 64 ) {
            $_SESSION['ramErr'] = "RAM must be between 1-64GB";
            unset($_SESSION['ramOld']);
            $GLOBALS['errors'] = true;
        }
    }
    return $ram;
}

function validateFee($fee){
    if ($fee == ""){
        $fee = 0;

    } elseif (! filter_var($fee, FILTER_VALIDATE_INT)) {
        $_SESSION['feeErr'] = "Fee must be number";
        unset($_SESSION['feeOld']);
        $GLOBALS['errors'] = true;

    }else {
        $fee = (int) $fee;
        if ($fee < 1 ) {
            $_SESSION['feeErr'] = "Fee must be at least 1$";
            unset($_SESSION['feeOld']);
            $GLOBALS['errors'] = true;
        }
    }
    return $fee;
}