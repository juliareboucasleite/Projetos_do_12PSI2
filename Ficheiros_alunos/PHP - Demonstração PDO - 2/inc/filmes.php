<?php
declare(strict_types=1);
 function getFilmes() {
        $dados = null;
        try {
            // Efetuar ligação à base de dados
            $db = Database::getConnection();
    
            // Executar uma consulta SQL e obter os registos da tabela filmes
            $stmt = $db->query('SELECT * FROM filmes');
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
    } finally {
        $db = null;
    }
    return $dados;
}