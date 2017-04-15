<?php


require_once('headkontrolleriga.html');

$dirname = "pildid/";
$images = glob($dirname."*.jpg");

echo '<h3>Fotod</h3>';
foreach($images as $image) {
    echo '<br>';
    echo '<img src="'.$image.'">';
}





require_once('foot.html');






