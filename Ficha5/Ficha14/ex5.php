<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8" />
    <title>Exercício 5 - Retângulos Simples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        canvas {
            border: 1px solid #d3d3d3;
            margin: 20px 0;
        }
        .code-example {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 5 - Retângulos Simples</h1>
        <p>Exemplo fácil usando <strong>fillRect()</strong> e <strong>for</strong></p>
        
        <canvas id="canvas" width="418" height="150"></canvas>
        
        <div class="code-example">
            <strong>Código fácil:</strong><br>
            var x = 20;<br>
            var y = 20;<br>
            var largura = 20;<br>
            var altura = 20;<br><br>
            for (var i = 1; i &lt;= 5; i++) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;ctx.fillRect(x, y, largura, altura);<br>
            &nbsp;&nbsp;&nbsp;&nbsp;x = x + largura + 10;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;largura = largura + 20;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;altura = altura + 20;<br>
            }
        </div>
    </div>

    <script>
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");

        ctx.fillStyle = "gold"; // cor amarela simples

        var x = 20;
        var y = 20;
        var largura = 20;
        var altura = 20;

        // Desenha 5 retângulos, cada um maior que o anterior
        for (var i = 1; i <= 5; i++) {
            ctx.fillRect(x, y, largura, altura);
            x = x + largura + 10; // soma largura atual + espaço
            largura = largura + 20; // deixa mais largo
            altura = altura + 20; // deixa mais alto
        }
    </script>
</body>
</html>
