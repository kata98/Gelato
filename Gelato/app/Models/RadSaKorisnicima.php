<?php

namespace app\Models;
use App\Config\DB;

class RadSaKorisnicima {

    private $database;

    public function __construct(DB $database) {
        $this->database = $database;
    }

    public function getUser() {
        return $this->database->executeQuery("select * from registracija");
    }

}
