<?php

namespace app\Models;
use App\Config\DB;

class Slike {

    private $database;

    public function __construct(DB $database) {
        $this->database = $database;
    }

    public function getHomePhotos() {
        return $this->database->executeQuery("select * from slikehome");
    }

    public function getActivePhotos() {
        return $this->database->executeQuery("select * from aktivne");
    }

    public function getHiidenPhotos() {
        return $this->database->executeQuery("select * from sakrivene");
    }

    public function getFlavourPhotos() {
        return $this->database->executeQuery("select * from slikeflavours");
    }

}
