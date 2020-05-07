<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once 'connection.php';

    $state1 = 'STOPPED';
    $state2 = 'RUNNING';

    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $status = $_REQUEST['status'];

    if (!isset($id)) {
        include_once "404.php";
        exit();
    }

    if ($state2 == $status) {

        $_SESSION['actionErr'] = "Cannot DELETE machine that is RUNNING";
        header("Location: home.php");
        exit();

    } elseif ($state1 == $status) {

        $stmt = $pdo->prepare("DELETE FROM machine WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $_SESSION['actionErr'] = "Deleted virtual machine $name";
        header("Location: home.php");
        exit();
    }

}