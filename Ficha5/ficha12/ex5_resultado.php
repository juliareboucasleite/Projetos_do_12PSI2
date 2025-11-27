<?php
function mostrarIdade($idade) {
    echo "Você escolheu a faixa etária: $idade";
}

$idade = $_POST["idade"];
mostrarIdade($idade);
?>
