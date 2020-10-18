<?php

namespace App\Controllers;
use App\Models\Korisnik;

class RegisterController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser(){
        if(isset($_POST['register'])){

            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $password=$_POST['lozinka'];

            $errors=[];

            $reFirstLast="/^[A-Z]{1}[a-z]{2,25}$/";
            $rePassword="/^(?=.*\d).{6,}$/";

            if(!preg_match($reFirstLast, $firstname)||empty($firstname)) {
                $errors[] = "First name is not valid";
            }
            if(!preg_match($reFirstLast, $lastname)||empty($lastname)) {
                $errors[] = "Last name is not valid";
            }

            if(!preg_match($rePassword, $password)||empty($password)) {
                $errors[] = "Password is not valid";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)||empty($email)) {
                $errors[] = "Email is not valid";
            }

            if(count($errors) == 0) {

                try {
                    $model = new Korisnik($this->db);
                    $password = md5($password);
                    $model->AddUser($firstname, $lastname ,$email, $password);
                    http_response_code(201);
                }
                catch (\PDOException $ex) {
                    echo json_encode(['message'=> $ex->getMessage()]);
                    http_response_code(500);

                }

            }

        }
    }

}

