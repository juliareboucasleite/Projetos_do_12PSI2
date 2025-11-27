<?php
function calcularArea($l, $a) {
    return $l * $a;
}

function calcularPerimetro($l, $a) {
    return 2 * ($l + $a);
}

$largura = $_POST["largura"];
$altura = $_POST["altura"];

$area = calcularArea($largura, $altura);
$perimetro = calcularPerimetro($largura, $altura);

echo "A área é: $area<br>";
echo "O perímetro é: $perimetro";
?>
