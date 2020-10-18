<?php

namespace app\Controllers;
use app\Config\DB;
use app\Models\Proizvodi;


class FunkcionalnostiController extends Controller
{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function showSort($sort = null)
    {
        $model2 = new Proizvodi(DB::instance());
        $sortiranje = $model2->funkcionalnosti($sort);
        $this->json($sortiranje);

    }
}