<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Exercício 4 Retângulos Simples</title>
    <style>
        body { text-align: center; background: #f5f5f5; margin-top: 30px; }
        canvas { border: 1px solid #888; margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Exercício 4 - Retângulos Verdes</h2>
    <canvas id="canvas" width="400" height="150"></canvas>
    <script>
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "#22b717";
        // Desenha 5 retângulos verdes, espaçados
        ctx.fillRect(12, 12, 60, 120);
        ctx.fillRect(88, 12, 60, 120);
        ctx.fillRect(164, 12, 60, 120);
        ctx.fillRect(240, 12, 60, 120);
        ctx.fillRect(316, 12, 60, 120);
    </script>
</body>
</html>
