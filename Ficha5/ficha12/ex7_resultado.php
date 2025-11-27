<?php
function mostrarEstrelas($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo "<img src='estrela.png' width='40'>";
    }
}

$num = $_POST["num"];
mostrarEstrelas($num);
?>
