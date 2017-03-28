<?php

$kassid= array(
    array('nimi'=>'Miisu', 'vanus'=>2 , 'värvus'=>'kollane' , 'omanik'=>'Jan', 'kaal'=>4),
    array('nimi'=>'Tom', 'vanus'=>1, 'värvus'=>'valge' , 'omanik'=>'Mati', 'kaal'=>5),
    array('nimi'=>'Nurr', 'vanus'=>4, 'värvus'=>'must' , 'omanik'=>'Kati', 'kaal'=>7),
    array('nimi'=>'Preili', 'vanus'=>5, 'värvus'=>'kirju' , 'omanik'=>'Tom', 'kaal'=>5),
    array('nimi'=>'Lasse', 'vanus'=>1, 'värvus'=>'triibuline' , 'omanik'=>'Katrin', 'kaal'=>4),
    array('nimi'=>'Benseen', 'vanus'=>7, 'värvus'=>'punane' , 'omanik'=>'Killer', 'kaal'=>10),
);

foreach ($kassid as $kass)
{
    include 'kassid.html';
}