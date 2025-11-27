<?php
function mostrarEsportes($lista) {
    echo "Os desportos escolhidos foram:<br>";
    foreach ($lista as $e) {
        echo "$e<br>";
    }
}

$esportes = $_POST["esportes"];
mostrarEsportes($esportes);
?>
