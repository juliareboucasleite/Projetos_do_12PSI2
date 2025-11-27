let canvas;
let ctx;
let Y;
let tamanho = 50;
let direcao = -1;
let velocidade = 2;

window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
    Y = canvas.height / 2 - tamanho / 2;
    gameLoop();
});

function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    let X = canvas.width / 2 - tamanho / 2;
    Y += velocidade * direcao;

    if (Y <= 0) {
        direcao = 1;
        Y = 0;
    } else if (Y >= canvas.height - tamanho) {
        direcao = -1;
        Y = canvas.height - tamanho;
    }

    ctx.fillStyle = "blue";
    ctx.fillRect(X, Y, tamanho, tamanho);
    window.requestAnimationFrame(gameLoop);
}