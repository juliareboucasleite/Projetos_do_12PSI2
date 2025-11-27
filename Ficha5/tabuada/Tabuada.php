<?php
echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr>";
for ($numero = 1; $numero <= 10; $numero++) {
    echo "<td>";
    echo "<b>Tabuada do $numero</b><br>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }
    echo "</td>";
}
echo "</tr>";
echo "</table>";
?>
