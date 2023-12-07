<?php
session_start();
require './database.php';

if (isset($_COOKIE['id'])) {

    $statement = $pdo->prepare("SELECT * FROM $table  WHERE id = :id ");
    
    $statement->execute(['id' => $_COOKIE['id']]);
    
    $user_id = $statement->fetch();
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <img width="150" src="https://cdn.worldvectorlogo.com/logos/the-ibox-1.svg" alt="picsum">
        <nav>
            <ul>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./register.php">Sing-up</a></li>
                <li><a href="./settings.php">profile-settings</a></li>
                <li><a href="./profile.php">profile</a></li>
            </ul>
            <h1 style="margin-left: 50px;"><?= $user_id['firstname'] ?? 'user' ?></h1>
        </nav>
    </header>