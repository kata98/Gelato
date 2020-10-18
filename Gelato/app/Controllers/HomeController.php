<?php

namespace app\Controllers;
use App\Config\DB;
use App\Models\Korisnik;
use app\Models\Menu;
use app\Models\Nav;
use app\Models\RadSaKorisnicima;
use app\Models\Proizvodi;
use http\Exception;


class HomeController extends Controller {

    public function homePage() {
        $model=new Nav(DB::instance());
        $items = $model->getNav();
        $this->data["navigacija"]=$items;

        $this->loadView("home", $this->data);
    }

    public function flavoursPage() {
        $model=new Nav(DB::instance());
        $items = $model->getNav();
        $this->data["navigacija"]=$items;

        $this->loadView("flavours", $this->data);
    }

    public function bookingPage() {
        $model=new Nav(DB::instance());
        $items = $model->getNav();
        $this->data["navigacija"]=$items;

        $this->loadView("booking", $this->data);
    }

    public function aboutPage() {
        $model=new Nav(DB::instance());
        $items = $model->getNav();
        $this->data["navigacija"]=$items;

        $this->loadView("about", $this->data);
    }

    public function adminPage() {
        if(!isset($_SESSION['uloga']) OR $_SESSION['uloga']==2){
            $this->redirect("index.php?page=home");
        }
        $model=new Nav(DB::instance());
        $items = $model->getNav();
        $this->data["navigacija"]=$items;

        $proizvod= new Menu(DB::instance());
        $proizvodi=$proizvod->getAllItems();
        $this->data["artikli"]=$proizvodi;

        $korisnik=new RadSaKorisnicima(DB::instance());
        $korisnici=$korisnik->getUser();
        $this->data["users"]=$korisnici;

        $this->loadView("admin", $this->data);

    }

    public function showMenu() {
        $model = new Menu(DB::instance());
        $items = $model->getAllItems();
        $this->json($items);

    }

    public function showSort(){
        if(isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }else{
            $sort=0;
        }
        $model2 = new Proizvodi(DB::instance());
        $sortiranje = $model2->funkcionalnosti($sort);
        $this->json($sortiranje);
    }

    public function showFilter(){
        try {
            $modelFilter = new Proizvodi(DB::instance());
            $naziv = "%".strtolower($_GET['naziv'])."%";
            $filtriranje = $modelFilter->filter($naziv);
            $this->json($filtriranje);
        }catch(PDOException $ex){
            $this->json($ex, 500);
        }
    }

}