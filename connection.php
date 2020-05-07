<?php

$host ="localhost";
$user = "root";
$pass = "root";
$database = 'rafCloud';

$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
