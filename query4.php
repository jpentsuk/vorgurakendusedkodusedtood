<?php

include ("uhendus.php");
$uuendamine = "UPDATE loomad SET vanus=vanus+1";
mysql_query($uuendamine)or die(mysql_error());