<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RAF Cloud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>

<body>
<div class='container'>
    <div class='row'>
        <div class='col-sm-4' ></div>
        <div class='col-sm-4' >
            <div class="page-header">
                    <img src='img/rafcloud.png' class="center-block" width=150 height=150 />
            </div>
            <div class='text-center'><h3>Login</h3></div><br>

            <form method="GET" action="userValidate.php">

                <input id="userName" name="userName" placeholder="Username" type="text" class="form-control" value="<?=$_SESSION['userNameOld']?>" >
                <?php if(isset($_SESSION['userNameErr'])): ?>
                    <span style="color: darkred"><?= $_SESSION['userNameErr']?></span>
                    <?php unset($_SESSION['userNameErr'])?>
                <?php endif; ?>
                <br>

                <input id="password" name="password" placeholder="Password" type="password" class="form-control"  >
                <?php if(isset($_SESSION['passwordErr'])): ?>
                    <span style="color: darkred"><?= $_SESSION['passwordErr']?></span>
                    <?php unset($_SESSION['passwordErr'])?>
                <?php endif; ?>
                <br>

                <div class='text-center'>
                    <input type="hidden">
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Login to RAF Cloud"><strong>Login</strong></button>
                </div>

            </form>
        </div>
        <div class='col-sm-4' ></div>
    </div>
</div>

<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
unset($_SESSION['userNameOld']);
?>
