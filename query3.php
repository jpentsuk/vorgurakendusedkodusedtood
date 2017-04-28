<?php
include ("uhendus.php");

$puur="select count(nimi) as loomadearv, puur from loomad where puur='1'";

$result = mysql_query($puur);

echo "<table border='1' align='center'>
<tr>
<td>Puuri number</td>
<td>Loomi puuris</td>
</tr>";

while($row = mysql_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>" . $row['puur'] . "</td>";
    echo "<td>" . $row['loomadearv'] . "</td>";

    echo "</tr>";
}
echo "</table>";