
<?php

$sona = $_GET['word'];

$pikkus = strlen($sona);

// kuna massiivi alustatakse 0-dast elemendist, seetõttu peame lahutama ühe.
//tsüklis prindib meile välja nt 3-tähe pikkuse sõna puhul kõigepealt $pikkus[2], siis 1 ja siis 0.

for($i=$pikkus-1;$i >=0;$i--){
    echo $sona[$i];
}



?>






