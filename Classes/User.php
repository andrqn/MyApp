<?php

class User
{
    public $login;
    public $password;
    public $name;
    public $email;
    public $password_confrim;

    public function __construct($login,$name,$email,$password,$password_confrim)
    {
        $this->login=$login;
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->password_confrim=$password_confrim;

    }


    public static function checkUserlogin($login):array
    {
        $data = file_get_contents('../db/db.json');
        $json = json_decode($data, true);
        $errorlogin=0;
        for ($i = 0; $i < count($json); $i++) {

            if (($json[$i]['login']) == $login) {
                $errorlogin += 1;
                break;
            }
        }
        if ($errorlogin == 0) {
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
    public function checkUserEmail($email)
    {

        $data = file_get_contents('../db/db.json');
        $json = json_decode($data, true);
        $errorlogin=0;
        for ($i = 0; $i < count($json); $i++) {

            if (($json[$i]['email']) == $email) {
                $errorlogin += 1;
                break;
            }
        }
        if ($errorlogin == 0) {
            $responseEmail = [
            ];
        }
        else{
            $responseEmail =[
                'status'=>false,
                'error'=>2,
            ];
        }

        return $responseEmail;

    }
    public function CreateUser($arr){
        $db=new JsonDB('../db/');
        $db->insert("db", $arr, true);
        $response=[
            'status'=>true
        ];
        echo json_encode($response);

    }





}
