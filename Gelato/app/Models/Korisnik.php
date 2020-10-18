<?php

namespace App\Models;
use App\Config\DB;

class Korisnik {
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }

    public function AddUser($firstname, $lastname, $email, $password) {

        $params = [$firstname, $lastname, $email, $password];

        $query = "INSERT INTO registracija values(NULL, ?, ?, ?, ?, 2)";

        $this->db->executeInsert($query, $params);
    }

    public function findByEmailAndPassword($email, $password)
    {
        $data = $this->db->executeQuery("select * from registracija where email = '" . $email . "'" . " AND lozinka = '" . md5($password) . "'");;

        if (!count($data)) {
            return null;
        }

        return $data[0];
    }
}
