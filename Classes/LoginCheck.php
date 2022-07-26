<?php
require "User.php";
class LoginCheck {

    public function checkUser($login):array{
        $data = file_get_contents('../db/db.json');
        $json = json_decode($data, true);
        $errorlogin=0;
        for ($i = 0; $i < count($json); $i++) {

            if (($json[$i]['login']) == $login) {
                $errorlogin += 1;
                break;
            }
        }
        if ($errorlogin > 0) {
            $responseLogin = [
            ];
        }
        else{
            $responseLogin =[
                'status'=>false,
                'error'=>1,
            ];
        }

        return $responseLogin;


    }
    public static function checkHash($login,$password,$pwdhash){
        $data = file_get_contents('../db/db.json');
        $json = json_decode($data, true);
        $error=0;

        for ($i = 0; $i < count($json); $i++) {
            $error+=1;

            if ((($json[$i]['login']) == $login) && (($json[$i]['password']) == $password)) {
                $_SESSION['user'] = $json[$error-1]['name'];
                break;
            }

        }
        if($error>0){
            $hash=json_encode($json[$error-1]['hash']);
            if($hash!=(json_encode($pwdhash))){
                $response=[
                    'status'=>false,
                    'error'=>2,
                ];
            }
            else {
                $response=[
                    'status'=>true
                ];
            }
            return $response;


        }




    }


    public static function getSessionName($login,$password){
        $data = file_get_contents('../db/db.json');
        $json = json_decode($data, true);
        $errorlogin=0;
        for ($i = 0; $i < count($json); $i++) {

            $errorlogin+=1;

            if ((($json[$i]['login']) == $login) && (($json[$i]['password']) == $password)) {

                break;
            }
        }

        return $json[$errorlogin-1]['name'];




    }
}
