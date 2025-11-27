<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8" />
    <title>Exercício 6 - 10 Círculos Concêntricos</title>
    <style>
        body { text-align: center; margin-top: 40px; background: #f5f5f5; }
        canvas { border: 1px solid #888; margin-top: 15px; }
    </style>
</head>
<body>
    <h2>10 Círculos Concêntricos</h2>
    <canvas id="canvas" width="300" height="300"></canvas>
    <script>
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        for (var i = 1; i <= 10; i++) {
            ctx.beginPath();
            ctx.arc(150, 150, i * 20, 0, 2 * Math.PI);
            ctx.stroke();
        }
    </script>
</body>
</html>
