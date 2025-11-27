<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Exercício 3 - Retângulos Simples</title>
    <style>
        body { text-align: center; margin: 30px; font-family: Arial, sans-serif; background: #f5f5f5; }
        canvas { border: 1px solid #888; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Exercício 3 - Retângulos Simples</h2>
    <canvas id="canvas" width="300" height="360"></canvas>
    <script>
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");

        // 4 quadrados amarelos na parte superior
        ctx.fillStyle = "yellow";
        ctx.fillRect(40, 40, 40, 40);
        ctx.fillRect(100, 40, 40, 40);
        ctx.fillRect(160, 40, 40, 40);
        ctx.fillRect(220, 40, 40, 40);

        // 1 retângulo roxo
        ctx.fillStyle = "purple";
        ctx.fillRect(40, 100, 220, 40);

        // 1 retângulo vermelho
        ctx.fillStyle = "red";
        ctx.fillRect(40, 160, 220, 80);

        // 2 retângulos verdes
        ctx.fillStyle = "green";
        ctx.fillRect(40, 260, 100, 80);
        ctx.fillRect(160, 260, 100, 80);
    </script>
</body>
</html>
