<?php

namespace App\Controllers;
use App\Models\Proizvodi;

class InsertProizvodController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertProizvod(){
        if(isset($_POST['insertI'])){

            $naziv=$_POST['nazivI'];
            $cena=$_POST['cenaI'];
            $opis=$_POST['opisI'];

            $errors=[];

            $reNaziv="/^[A-Z]{1}[a-z]{2,25}$/";
            $reCena="/^(0,9)/";
            $reOpis="/^[a-z]{2,255}$/";

            if(!preg_match($reNaziv, $naziv)||empty($naziv)) {
                $errors[] = "Product name is not valid";
            }
            if(!preg_match($reCena, $cena)||empty($cena)) {
                $errors[] = "Price is not valid";
            }

            if(!preg_match($reOpis, $opis)||empty($opis)) {
                $errors[] = "Description is not valid";
            }

            if(count($errors) == 0) {

                try {
                    $model = new Proizvodi($this->db);
                    $model->insertProizvod($naziv, $cena ,$opis);
                    http_response_code(201);

                    $this->redirect("index.php?page=flavours");
                }
                catch (\PDOException $ex) {
                    echo json_encode(['message'=> $ex->getMessage()]);
                    http_response_code(500);

                }

            }

        }
    }

}
