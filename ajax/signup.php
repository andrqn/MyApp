<?php
session_start();
require '../Classes/db.php';
require '../Classes/User.php';


const salt='manao';



#если сервер нам отправляет данные,и так как они уже валидированы можно сразу принимать в бд .

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_conf'];

    if ($password == $password_confirm) {
        $hash = (md5($password.salt));
    }

    #формируем массив пользователя

    $arr = array(
        'login' => $login,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'hash' => $hash
    );

    #проверяем юзера
    $user=new User($login,$name,$email,$password,$password_confirm);

    if(!empty($user->checkUserlogin($login))){
        $response=$user->checkUserlogin($login);
        echo json_encode($response);
    }
    elseif (!empty($user->checkUserEmail($email))){
        $response2=$user->checkUserEmail($email);
        echo json_encode($response2);
    }
    else{
        $user->CreateUser($arr);
    }
}


