<?php

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
    include ("uhendus.php");

    /*$cages="select puur from loomad GROUP BY puur";
    $res = mysql_query($cages) or die(mysql_error());

    while($row = mysql_fetch_assoc($res))
    {
        echo $row['puur'];
    }
    */
    echo "<br><br>";
    $abi ="SELECT puur FROM loomad GROUP BY puur";
    $result = mysql_query($abi) or die(mysql_error);
    $puurid = array();
    $nr = 1;

    while ($rida = mysqli_fetch_assoc($result))
    {
        $abi1 = "SELECT nimi FROM loomad WHERE puur=$nr";

        while ($row=mysql_fetch_assoc($abi1)) {
            $puurid[$rida['puur']][]=$row;
            echo $row['nimi'];
        }

        $nr++;
    }


}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>