<?php

namespace app\Models;
use App\Config\DB;

class Menu {

    private $database;

    public function __construct(DB $database) {
        $this->database = $database;
    }

    public function getAllItems() {
        return $this->database->executeQuery("select * from meni");
    }


}
