<?php
define('DB_HOST', 'localhost');  
define('DB_USER', 'root');       
define('DB_PASS', '');            
define('DB_NAME', 'emprego_php'); 

function conectarBD() {
    $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$conexao) {
        die("Erro na ligação à base de dados: " . mysqli_connect_error());
    }
    
    mysqli_set_charset($conexao, "utf8mb4");
    
    return $conexao;
}

function fecharBD($conexao) {
    if ($conexao) {
        mysqli_close($conexao);
    }
}
?>

