<?php
$yhendus=mysql_connect("localhost","carlroth_jan","Alexander1103")
//Võtame ühendust serveriga
or die("Ei saa yhendust");
//Kui ei õnnestus, siis väljastab veateate
mysql_select_db ("carlroth_kool",$yhendus);
//valib välja andmebaasi
?>

