<?php
if (isset($_GET['pilt']) && $_GET['pilt']!="") {
    echo $_GET['pilt'];
}
else{
    echo "te ei valinud midagi";
}