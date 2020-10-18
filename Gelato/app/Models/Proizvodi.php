<?php

namespace App\Models;
use App\Config\DB;

class Proizvodi{

    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }

        public function updateItem($id_proizvod, $naziv, $cena, $opis)
        {
            $params = [$naziv, $cena, $opis, $id_proizvod];

            $query = "UPDATE meni SET naziv=?, cena=?, opis=? WHERE id_proizvod=?";

            $this->db->executeInsert($query, $params);
        }

        public function deleteItem($id_proizvod){

            $query = "DELETE FROM meni WHERE id_proizvod=?";

            $this->db->executeInsert($query, [$id_proizvod]);
        }

        public function insertProizvod($naziv, $cena ,$opis){

            $params = [$naziv, $cena ,$opis];

            $query = "INSERT INTO meni values(NULL, ?, ?, ?)";

            $this->db->executeInsert($query, $params);
        }

        public function funkcionalnosti($sort){
            $upit="select * from meni";
            switch($sort){
                case 0:
                    return $this->db->executeQuery($upit);
                    break;
                case 1:
                    return $this->db->executeQuery($upit." ORDER BY naziv ASC");
                    break;
                case 2:
                    return $this->db->executeQuery($upit." ORDER BY naziv DESC");
                    break;
                case 3:
                    return $this->db->executeQuery($upit." ORDER BY cena ASC");
                    break;
                case 4:
                    return $this->db->executeQuery($upit." ORDER BY cena DESC");
                    break;
                default:
                    return $this->db->executeQuery($upit);
                    break;

            }

        }

        public function filter($naziv){
            $upitF="select * from meni WHERE LOWER(naziv) LIKE ?";

            $params=[$naziv];

            return $this->db->executeAll($upitF, $params);
        }
}