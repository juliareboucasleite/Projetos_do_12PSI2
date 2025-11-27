<?php
function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);
    return $imc;
}

$peso = $_POST["peso"];
$altura = $_POST["altura"];

$imc = calcularIMC($peso, $altura);

echo "Seu IMC é: $imc<br>";

if ($imc > 25) {
    echo "Está acima do peso";
} else {
    echo "Está saudável";
}
?>
