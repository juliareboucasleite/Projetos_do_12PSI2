<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML Canvas</title>
</head>
<body>
<canvas id="canvas" width="300" height="300" style="border: 1px solid #000">
</canvas>
<script>
let canvas;
let ctx;
let x;
let y;
let raio;
let cor;

// Direção do movimento: 1 = expandir, 2 = contrair
let direcao;
let R, G, B;

window.onload = inicio;

function inicio() {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    window.requestAnimationFrame(ciclo);
    cor = 0;
    x = canvas.width / 2;
    y = canvas.height / 2;
    raio = 1;
    direcao = 1;

    gerarCor();
}

function ciclo() {
    atualiza();
    desenha();
    ctx.font = "12px Arial";
    ctx.fillStyle = "#000000";
    ctx.fillText(cor, 5, 15);
    if (cor == 3) {
        ctx.font = "12px Arial";
        ctx.fillStyle = "#000000";
        ctx.fillText(cor, 5, 15);
        window.cancelAnimationFrame();
    }
    window.requestAnimationFrame(ciclo);
}

function atualiza() {
    if (direcao == 1) {
        if ((x + raio) < canvas.width) {
            raio++;
        } else {
            cor++;
            gerarCor();
            direcao = 2;
        }
    } else if (direcao == 2) {
        if (raio > 1) {
            raio--;
        } else {
            gerarCor();
            direcao = 1;
        }
    }
}

function desenha() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    ctx.fillStyle = `rgb(${R}, ${G}, ${B})`;
    ctx.arc(x, y, raio, 0, 2 * Math.PI, false);
    ctx.fill();
}

function gerarCor() {
    R = Math.floor(Math.random() * 255);
    G = Math.floor(Math.random() * 255);
    B = Math.floor(Math.random() * 255);
}
</script>
</body>
</html>
