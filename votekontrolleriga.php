<?php

require_once('headkontrolleriga.html');
$dirname = "pildid/";
$images = glob($dirname."*.jpg");
echo '<h3>Vali oma lemmik :)</h3>';

echo '<form action="tulemuskontrolleriga.php" method="POST">';
$nr = 1;

foreach($images as $image) {

    echo '<label for="p'.$nr.'">';
    echo '<img src="'.$image.'" height="100">';
    echo '</label>';
    echo '<input type="radio" value="'.$nr.'" id="p'.$nr.'" name="pilt"/>';
    $nr++;
}
echo '<input type="submit" value="Valin!"/>';


echo '</form>';
require_once('foot.html');