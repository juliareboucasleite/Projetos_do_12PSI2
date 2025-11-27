<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questao</title>
</head>
<body>
    <h1>Questao 2 </h1>
    <form method="post">
        <label for="cor">selecione uma cor:</label>
        <select name="cor" id="cor">
            <option value="verde">verde</option>
            <option value="amarelo">amarelo</option>
            <option value="vermelho">vermelho</option>
        </select>
        <input type="submit" value="enviar">
    </form>
    <?php
        function semaforo($cor) {
            if ($cor == "verde") {
                return "pode passar";
            } else if ($cor == "amarelo") {
                return "passar com cuidado";
            } else if ($cor == "vermelho") {
                return "parar";
         }
        }
        if (isset($_POST["cor"])) {
            $mensagem = semaforo($_POST["cor"]);
            echo "<p>$mensagem</p>";
        }
    ?>
</body>
</html>