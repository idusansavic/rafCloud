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

    if ($state2 == $status) {

        $_SESSION['actionErr'] = "Cannot start machine that is already RUNNING";
        header("Location: home.php");
        exit();

    } elseif ($state1 == $status) {

        $stmt = $pdo->prepare("UPDATE machine SET status='RUNNING' WHERE id = :id");
        $stmt->execute(['id' => $id]);
        sleep(2);
        header("Location: home.php");
        exit();
    }

}
