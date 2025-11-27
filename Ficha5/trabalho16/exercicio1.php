<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML Canvas</title>
</head>
<body>
<canvas id="canvas" width="250" height="200" style="border: 1px solid #000000"></canvas>
<script>
let canvas;
let ctx;
let x;
let y;
let tamanho;
// Direção do movimento: 1 = para baixo, 2 = para cima
let direcao;

window.onload = inicio;

function inicio() {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
    
    window.requestAnimationFrame(ciclo);
    tamanho = 50;
    x = (canvas.width / 2) - (tamanho / 2);
    y = (canvas.height / 2) - (tamanho / 2);
    direcao = 1;
}

function ciclo() {
    atualiza();
    desenha();
    window.requestAnimationFrame(ciclo);
}

function atualiza() {
    if (direcao == 1) {
        if ((y + tamanho) < canvas.height) {
            y += 1;
        } else {
            direcao = 2;
        }
    } else if (direcao == 2) {
        if (y > 0) {
            y -= 1;
        } else {
            direcao = 1;
        }
    }
}

function desenha() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "#3306fa";
    ctx.fillRect(x, y, tamanho, tamanho);
}
</script>
</body>
</html>
