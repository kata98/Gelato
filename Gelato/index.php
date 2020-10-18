<?php

require_once "app/Config/autoload.php";
require_once "app/Config/database.php";

use app\controllers\HomeController as Home;
use app\controllers\RegisterController as Register;
use app\controllers\LoginController as Login;
use app\controllers\ProizvodiController as Proizvodi;
use app\controllers\InsertProizvodController as Insert;
use app\controllers\FunkcionalnostiController as Funkcionalnosti;
use app\Config\DB;

if(isset($_GET["page"])) {
    switch($_GET["page"]) {
        case "home" :
            $homeController = new Home();
            $homeController->homePage();
            break;
        case "flavours" :
            $homeController = new Home();
            $homeController->flavoursPage();
            exit;
            break;
        case "sign up":
            $homeController = new Home();
            $homeController->bookingPage();
            exit;
            break;
        case "login":
            $loginController = new Login(DB::instance());
            $loginController->login();
            exit;
            break;
        case "register":
            $registerController = new Register(DB::instance());
            $registerController->registerUser();
            exit;
            break;
        case "logout":
            $loginController = new Login(DB::instance());
            $loginController->logout();
            exit;
            break;
        case "about":
            $homeController = new Home();
            $homeController->aboutPage();
            exit;
            break;
        case "admin":
            $homeController = new Home();
            $homeController->adminPage();
            exit;
            break;
        case "flavoursGet":
            $homeController=new Home();
            $homeController->showSort();
            exit;
            break;
        case "flavoursFilter":
            $homeController=new Home();
            $homeController->showFilter();
            exit;
            break;
        case "updateProizvod":
            $proizvodiController=new Proizvodi(DB::instance());
            $proizvodiController->updateProizvod();
            exit;
            break;
        case "deleteProizvod":
            $proizvodiController=new Proizvodi(DB::instance());
            $proizvodiController->deleteProizvod();
            exit;
            break;
        case "insertProizvod":
            $insertController=new Insert(DB::instance());
            $insertController->insertProizvod();
            exit;
            break;
    }
}else{
    $homeController = new Home();
    $homeController->homePage();
}

$homeController = new Home();



