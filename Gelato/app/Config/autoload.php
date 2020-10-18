<?php
session_start();
// AUTOLOAD
spl_autoload_register(function($putanja){
    $putanja = str_replace("\\", DIRECTORY_SEPARATOR, $putanja);
    $putanja[0] = strtolower($putanja[0]);
    $putanja .= ".php";
    require_once $putanja;
});
