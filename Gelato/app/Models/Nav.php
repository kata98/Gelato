<?php

namespace app\Models;
use App\Config\DB;

class Nav {

    private $database;

    public function __construct(DB $database) {
        $this->database = $database;
    }

    public function getNav() {
        return $this->database->executeQuery("select * from navigacija");
    }

}
