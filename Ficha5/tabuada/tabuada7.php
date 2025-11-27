<?php
$numero = 7; 

echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr><td>";
echo "<b>Tabuada do $numero</b><br>";

for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "<br>";
}

echo "</td></tr>";
echo "</table>";
?>
