<?php
function autenticar($n, $s) {
    if ($n == "julia" && $s == "12345") {
        return true;
    } else {
        return false;
    }
}

$nome = $_POST["nome"];
$senha = $_POST["senha"];

if (autenticar($nome, $senha)) {
    echo "Autenticação realizada com sucesso";
} else {
    echo "Não tem permissão de visualizar esta página";
}
?>
