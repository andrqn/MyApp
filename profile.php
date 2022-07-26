<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>



    <form>
        <h1>Hello,<?=  $_SESSION['user'] ?></h1>
        <a href="logout.php">Выход</a>

    </form>

</body>
</html>