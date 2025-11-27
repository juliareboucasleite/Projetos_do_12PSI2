<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8" />
    <title>Exercício 2 - Retângulos Concêntricos</title>
    <style>
        body { text-align: center; margin-top: 30px; font-family: Arial, sans-serif; background: #f5f5f5; }
        canvas { border: 1px solid #888; margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Exercício 2 - Retângulos Concêntricos</h2>
    <canvas id="canvas" width="300" height="300"></canvas>
    <script>
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");

        // Cores para cada retângulo
        var cores = ["#b30c15", "#a31295", "#1508a6", "#1093b0", "#11992e", "#9bc91a"];
        
        for (var i = 1; i <= 6; i++) {
            ctx.strokeStyle = cores[i-1];
            ctx.strokeRect(20, 20, 40*i, 40*i);
        }
    </script>
</body>
</html>
