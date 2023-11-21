<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "./cuaca.php";
$menu = $_GET['menu'];
$wilayah = $_GET['wilayah'];

if (isset($menu)) {
    if ($menu == "cuaca") {
        if (isset($wilayah)) {
            $wil = strtolower($wilayah);
            if ($wil != "") {
                $cuacaJson = cuaca($wil);
                print($cuacaJson);
            }
        }
    } else {
        $err = json_encode(array("error" => "wrong parameter!"));
        print($err);
        die();
    }
}
?>
