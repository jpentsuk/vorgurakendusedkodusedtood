<?php

require_once('headkontrolleriga.html');
$dirname = "pildid/";
$images = glob($dirname."*.jpg");

$mode = "";

$mode = $_GET['mode'];

switch ($mode){
    case "pealeht":
        include("pealehtkontrolleriga.php");
        break;
    case "galerii":
        include("galeriikontrolleriga.php");
        break;
    case "vote":
        include("votekontrolleriga.php");
        break;
}
require_once ('foot.html');


