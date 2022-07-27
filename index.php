<?php
session_start();
setcookie('name','manao');

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добро пожаловать ! </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
<div class="container mt-4">
    <h1>Логин</h1>
    <form name="loginForm" id="loginForm" method="post" enctype="multipart/form-data" >
        <div class="row">
        <input type="text" class="form-control" name="login"
               id="login" placeholder="Введите логин" >
            <label for="login" id="errorMesLog"></label>
        </div><br>
        <div class="row">
        <input type="password" class="form-control" name="password"
               id="password" placeholder="Введите пароль"><br>
            <label for="password" id="errorMesPas"></label>
        </div><br>
        <p>Впеврые у нас ? </p> <a class='register' href='registerPage.php'>Регистрируйтесь!</a><br>
        <br><button class="btn btn-success" id="login_btn">Вход</button><br>
        <div id="logError"></div><br>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
<noscript><p>Пожалуйста включите JavaScript</p></noscript>
</body>
</html>
