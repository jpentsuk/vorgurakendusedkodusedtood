<?php

ini_set("session.cookie_lifetime",30*60);
session_start();
if (!isset($_SESSION["numbrid"]))
{
    $_SESSION["numbrid"]=array();
}
$dirname = "pildid/";
$images = glob($dirname."*.jpg");

if (isset($_GET['pilt']) && $_GET['pilt']!="") {


    if(isset($_SESSION["numbrid"]) && !empty($_SESSION["numbrid"]))
    {
        if(in_array($_GET['pilt'],$_SESSION["numbrid"] ))
        {
            echo "Selle pildi poolt olete juba hääletanud";
        }
        else
        {
            $_SESSION["numbrid"]=$_GET['pilt'];
            $nr =  $_GET['pilt']-1;
            echo "Valisite selle pildi";
            echo "<br>";
            echo '<img src="'.$images[$nr].'">';
            echo $_SESSION["numbrid"];
        }

    }
}
else{
    echo "te ei valinud midagi";
}