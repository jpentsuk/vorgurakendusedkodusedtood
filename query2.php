<?php

include ("uhendus.php");
$vanim="select nimi, vanus from loomad order by vanus desc limit 1";
$noorim="select nimi, vanus from loomad order by vanus asc limit 1";

$max=mysql_query($vanim);
$min=mysql_query($noorim);

$maks=mysql_fetch_array($max);
$miin=mysql_fetch_array($min);


echo "vanim on " . $maks[nimi] . " kes on " . $maks[vanus] . " aastane";
echo "<br>";
echo "noorim on " . $miin[nimi] . " kes on " . $miin[vanus] . " aastane";


