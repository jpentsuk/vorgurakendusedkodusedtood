<?php

include ("uhendus.php");
$loomad="select nimi, puur from loomad where puur='1'";
$result = mysql_query($loomad) or die(mysql_error());

echo "<table border='1' align='center'>
<tr>
<td>Loom</td>
<td>Puuri nr.</td>
</tr>";

while($row = mysql_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>" . $row['nimi'] . "</td>";
    echo "<td>" . $row['puur'] . "</td>";
    echo "</tr>";


}
echo "</table>";