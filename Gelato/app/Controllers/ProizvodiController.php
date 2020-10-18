<?php

namespace App\Controllers;
use App\Models\Proizvodi;
use App\Config\DB;

class ProizvodiController extends Controller
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateProizvod(){
        $model=new Proizvodi (DB::instance());

        $id_proizvod=$_POST['id_proizvod'];
        $naziv=$_POST['naziv'];
        $cena=$_POST['cena'];
        $opis=$_POST['opis'];

        $items = $model->updateItem($id_proizvod, $naziv, $cena, $opis);
        $this->data["item"]=$items;

        $this->redirect("index.php?page=flavours");
    }

    public function deleteProizvod(){
        $del=new Proizvodi (DB::instance());

        $id_proizvod=$_GET['id'];
        $it = $del->deleteItem ($id_proizvod);
        $this->data["stavka"]=$it;

        $this->redirect("index.php?page=flavours");
    }

}

