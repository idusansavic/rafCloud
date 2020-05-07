<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <title>RAF Cloud</title>
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-sm-3'>

            <?php include('navi.php'); ?>

            <?php include_once("machineCreate.php") ?>

        </div>
        <div class='col-sm-9'>
            <div class='page-header'><h1>Virtual Machines</h1></div>

            <?php include('machineSearch.php'); ?>

            <?php include('machineView.php'); ?>

        </div>
    </div>
</div>
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>