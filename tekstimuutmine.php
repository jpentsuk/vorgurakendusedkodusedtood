<?php
$taust = "#fff";
$tekst = "";
$varvus = "#000000";
$laius = 1;
if (isset($_GET['saada']))
{
    if (isset($_GET['tekst']) && $_GET['tekst']!="") {
        $tekst=htmlspecialchars($_GET['tekst']);
    }

    if ($_GET['taust']=="Sinine")
    {
        $taust = "#000080";
    }
    else if ($_GET['taust']=="Punane")
    {
        $taust = "#ff0000";
    }
    else if ($_GET['taust']=="Roheline")
    {
        $taust = "#32cd32";
    }

    if ($_GET['varvus']=="Sinine")
    {
        $varvus = "#000080";
    }
    else if ($_GET['varvus']=="Punane")
    {
        $varvus = "#ff0000";
    }
    else if ($_GET['varvus']=="Roheline")
    {
        $varvus = "#32cd32";
    }

    if ($_GET['laius']==2)
    {
        $laius = 2;
    }
    else if ($_GET['laius']==4)
    {
        $laius =4;
    }
    else if ($_GET['laius']==6)
    {
        $laius =6;
    }
}
?>

<html>
<head>
    <title>Teksti muutmine</title>
    <style>
        textarea {background: <?php echo $taust; ?>;color: <?php echo $varvus; ?>; border-width: <?php echo $laius; ?>;}
    </style>
</head>
<body>

<textarea rows="4" cols="50">
<?php echo $tekst; ?>
</textarea>

<br>

<form action="tekstimuutmine.php" method="get">
    Tekst ise
    <br>
    <input type="text" name="tekst">
    <br>
    Taustavärvus
    <select name="taust">
        <option>Sinine</option>
        <option>Punane</option>
        <option>Roheline</option>
    </select>
    <br>
    Tekstivärvus
    <select name="varvus">
        <option>Sinine</option>
        <option>Punane</option>
        <option>Roheline</option>
    </select>
    <br>
    Piirjoone laius
    <select name="laius">
        <option>2</option>
        <option>4</option>
        <option>6</option>
    </select>
    <br>
    <input type="submit" name="saada" value="Saada">
</form>
</body>

</html>


