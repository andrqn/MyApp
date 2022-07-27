<?php
session_start();

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
    <title>Регистрация на сайте </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">

</head>

<body>
    <div class="container mt-4">

        <h1>Форма регистрации</h1>

        <form id = "formReg" method="post">
            <div class="row">
                <input type="text" class="form-control" name="login"
                       id="login" placeholder="Введите логин">
                <label for="login" id="errorMesLog"></label>
            </div><br>
            <div class="row">
                <input type="text" class="form-control" name="name"
                       id="name" placeholder="Введите имя"  >
                <label for="name" id="errorMesName"></label>
            </div><br>
            <div class="row">
                <input type="email" class="form-control" name="email"
                       id="email" placeholder="Введите email" >
                <label for="email" id="errorMesEmail"></label>
            </div><br>
            <div class="row">
                <input type="password" class="form-control" name="password"
                       id="password" placeholder="Введите пароль"  >
                <label for="password" id="errorMesPass"></label>
            </div><br>
            <div class="row">
                <input type="password" class="form-control" name="password_conf"
                       id="password_conf" placeholder="Повторите введенный пароль пароль" >
                <label for="password_conf" id="errorMesConf"></label>
            </div><br>
            <button id="reg_btn" class="btn btn-success">Регистрация</button>
            <div id="regError"></div>

            <a  id='a' class='text' href='index.php'>Войдите,если уже зарегистрированны!</a><br>
        </form>



    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <noscript><p>Пожалуйста включите JavaScript</p></noscript>

</body>
</html>