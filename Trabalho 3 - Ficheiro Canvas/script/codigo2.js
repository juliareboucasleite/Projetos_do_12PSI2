let canvas;
let ctx;
let raio = 1;
let expandindo = true;
let velocidade = 2;
let cor = "darkorange";

window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
    gameLoop();
});

function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    let raioMaximo = Math.min(canvas.width, canvas.height) / 2;

    let centroX = canvas.width / 2;
    let centroY = canvas.height / 2;

    if (expandindo) {
        raio += velocidade;
        if (raio >= raioMaximo) {
            raio = raioMaximo;
            expandindo = false;
            cor = gerarCorAleatoria();
        }
    } else {
        raio -= velocidade;
        if (raio <= 1) {
            raio = 1;
            expandindo = true;
            cor = gerarCorAleatoria();
        }
    }

    ctx.fillStyle = cor;
    ctx.beginPath();
    ctx.arc(centroX, centroY, raio, 0, Math.PI * 2);
    ctx.fill();

    window.requestAnimationFrame(gameLoop);
}

function gerarCorAleatoria() {
    return "#" + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}
