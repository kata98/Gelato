<?php

namespace App\Controllers;
use App\Models\Korisnik;

class LoginController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {

        $errors = [];

        if(isset($_POST['login'])){
            if(!isset($_POST["emailLog"])) {
                array_push($errors, "Email is required.");
            }

            if(!isset($_POST["lozinkaLog"])) {
                array_push($errors, "Password is required.");
            }
            if(count($errors)) {
                $this->view('login', [
                    "errors" => $errors
                ]);
                exit;
            }

            try {
                $model = new Korisnik($this->db);
                $user = $model->findByEmailAndPassword($_POST["emailLog"],$_POST["lozinkaLog"]);

                if($user != null) {
                    $_SESSION["user"] = $user;
                    $_SESSION["uloga"] = $user->id_uloga;
                    if($_SESSION['uloga']==1) {
                        $this->redirect("index.php?page=admin");
                    }else{
                        $this->redirect("index.php?page=flavours");
                    }
                }else{
                    $this->redirect("index.php?page=sign%20up");
//                    echo "<script type='text/javascript'>alert('You are not registered');</script>";
                }

            }catch(\PDOException $ex) {
                echo "<script type='text/javascript'>alert('You are not registered');</script>";
//                $this->redirect("index.php?page=sign%20up");

            }

        }
    }
    public function logout() {
        $_SESSION["user"] = null;
        $_SESSION["uloga"]=null;
        $this->redirect("index.php?page=home");
    }

}
