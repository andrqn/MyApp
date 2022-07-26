<?php
session_start();

require '../Classes/db.php';
require "../Classes/LoginCheck.php";

const salt ='manao';

$login = $_POST['login'];
$password = $_POST['password'];
$pwdhash= md5($password.salt);


$loginuser=new LoginCheck();

if(!empty($loginuser->checkUser($login))){
    $response=$loginuser->checkUser($login);
    echo json_encode($response);
}
elseif (!empty($loginuser->checkHash($login,$password,$pwdhash))){
    $response2=$loginuser->checkHash($login,$password,$pwdhash);
    echo json_encode($response2);
}
else{
    $_SESSION['name']=$loginuser->getSessionName($login,$password);
    echo json_encode( $response = [
        'status'=>true
    ]);

}




