<?php


function connect_db(){
    global $connection;
    $host="localhost";
    $user="carlroth_jan";
    $pass="Alexander1103";
    $db="carlroth_kool";
    $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}


function kuva_puurid(){
    // siia on vaja funktsionaalsust
    global $connection;
    if(!empty($_SESSION["user"])){
        $abi=mysqli_query($connection, "select distinct(puur) as puur from loomad order by puur asc");
        $puurid=array();
        while ($rida=mysqli_fetch_assoc($abi)){
            $abi1=mysqli_query($connection, "SELECT * FROM loomad WHERE puur=".mysqli_real_escape_string($connection, $rida['puur']));
            while ($row=mysqli_fetch_assoc($abi1)){
                $puurid[$rida['puur']][]=$row;
            }
        }
    } else {
        header("Location: ?page=login");
    }
    include_once('views/puurid.html');

}

function logi(){
    // siia on vaja funktsionaalsust (13. nädalal)
    global $connection;
    if(!empty($_SESSION["user"])){
        header("Location: ?page=loomad");
    } else {
        $errors = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST["user"] != "" && $_POST["pass"] != "") {
                $username = mysqli_real_escape_string($connection, $_POST["user"]);
                $password = mysqli_real_escape_string($connection, $_POST["pass"]);
                $paring = "SELECT id FROM kylastajad WHERE username = '$username' AND passw = SHA1('$password')";
                $result=mysqli_query($connection, $paring);
                if(mysqli_num_rows($result)){
                    $_SESSION["user"] = $_POST["user"];
                    header("Location: ?page=loomad");
                } else {
                    $errors[]= "Parool või kasutajanimi on vale!";
                }
            } else {
                $errors[]="Puudub parool või kasutaja!";
            }
        }
    }
    include_once('views/login.html');
}

function logout(){
    $_SESSION=array();
    session_destroy();
    header("Location: ?");
}

function lisa(){
    // siia on vaja funktsionaalsust (13. nädalal)

    global $connection;
    if(empty($_SESSION["user"])){
        header("Location: ?page=login");
    } else {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST["nimi"] == "" || $_POST["puur"] == ""){
                $errors[]="Nimi või puur on tühjad!";
            } elseif (upload("liik") == ""){
                $errors[] = "Ei suudetud faili lisada!";
            }else {
                $nimi = mysqli_real_escape_string($connection, $_POST["nimi"]);
                $puur = mysqli_real_escape_string($connection, $_POST["puur"]);
                $liik = mysqli_real_escape_string($connection, $_POST["liik"]);
                $sql = "INSERT INTO loomad(nimi, puur, liik) VALUES ('$nimi', '$puur', '$liik')";
                $result = mysqli_query($connection, $sql);
                if(mysqli_insert_id($connection)){
                    header("Location: ?page=loomad");
                } else {
                    header("Location: ?page=loomavorm");
                }
            }
        }
    }

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
            if (file_exists("loomad/" . $_FILES[$name]["name"])) {
                // fail olemas ära uuesti lae, tagasta failinimi
                $_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
                return "loomad/" .$_FILES[$name]["name"];
            } else {
                // kõik ok, aseta pilt
                move_uploaded_file($_FILES[$name]["tmp_name"], "loomad/" . $_FILES[$name]["name"]);
                return "loomad/" .$_FILES[$name]["name"];
            }
        }
    } else {
        return "";
    }
}

?>