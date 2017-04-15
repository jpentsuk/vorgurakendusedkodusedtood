<?php
if (isset($_POST['pilt']) && $_POST['pilt']!="") {
    echo $_POST['pilt'];
}
else{
    echo "te ei valinud midagi";
}