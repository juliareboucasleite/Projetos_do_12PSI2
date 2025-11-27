<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Exercício 1 - Calculadora</title>
</head>
<body>
    <h1>Exercício 1 - Calculadora</h1>
    
    <form action="1resultado.php" method="post">
        <p>Valor 1: <input type="number" name="valor1" required></p>
        <p>Valor 2: <input type="number" name="valor2" required></p>
        <p>Operação: 
            <select name="operacao">
                <option value="soma">Soma</option>
                <option value="subtracao">Subtração</option>
                <option value="multiplicacao">Multiplicação</option>
                <option value="divisao">Divisão</option>
            </select>
        </p>
        <p><input type="submit" value="Calcular"></p>
    </form>
    
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
