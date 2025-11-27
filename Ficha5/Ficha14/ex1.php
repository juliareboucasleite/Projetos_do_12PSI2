<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Exercício 1 - Retângulo Centralizado</title>
    <style>
        body { text-align: center; margin-top: 40px; }
        canvas { border: 1px solid #888; }
    </style>
</head>
<body>
    <h2>Retângulo centralizado</h2>
    <canvas id="canvas" width="300" height="300"></canvas>
    <script>
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "green";
        ctx.fillRect(70, 70, 160, 160);
    </script>
</body>
</html>
