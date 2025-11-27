<?php
function getNumeroMusicas() : int {
    $n = 0;
    $dados = null;

    try {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=musicas;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Executar a consulta SQL
        $resultado = $db->query('SELECT COUNT(*) AS numero FROM musicas');

        $dados = $resultado->fetch();
        $n = (int)$dados['numero'];
    } catch (PDOException $e) {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
    } finally {
        $db = null;
    }

    return $n;
}

// função para obter as musicas
function getMusicas() {
    $dados = null;
    try {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=musicas;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Executar uma consulta SQL e obter os registos da tabela musicas
        $stmt = $db->query('SELECT musicas.id, titulo, ano_lancamento, duracao_segundos, musicos.nome FROM musicas, musicos WHERE musicas.musico_id = musicos.id');
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
    } finally {
        $db = null;
    }
    return $dados;
}

// função para eliminar uma musica
function eliminarMusica(int $id) : bool {
    // Resultado da operação DELETE (inicialmente com o valor false)
    $resultado = false;

    try {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=musicas;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Esta consulta tem um named parameter (:id)
        $stmt = $db->prepare('DELETE FROM musicas WHERE id = :id');

        // Atribuir dados aos parâmetros
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // Executar a consulta e verificar se foi bem sucedida
        $stmt->execute();

        // Obter o número de registos afetados pela operação DELETE
        // Ou seja, se for afetado exatamente um registo, significa que a operação foi bem sucedida.
        if ($stmt->rowCount() == 1) {
            $resultado = true;
        } else {
            $resultado = false;
        }

    } catch (PDOException $e) {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
    } finally {
        $db = null;
    }

    return $resultado;
}
?>