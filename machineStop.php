<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once 'connection.php';

    $state1 = "STOPPED";
    $state2 = "RUNNING";

    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if (!isset($id)) {
        include_once "404.php";
        exit();
    }

    if ($state1 == $status) {

        $_SESSION['actionErr'] = "Cannot stop machine that is already STOPPED";
        header("Location: home.php");
        exit();

    } elseif ($state2 == $status) {

        $stmt = $pdo->prepare("UPDATE machine SET status='STOPPED' WHERE id = :id");
        $stmt->execute(['id'=>$id]);
        sleep(2);
        header("Location: home.php");
        exit();
    }

}