let canvas;
let ctx;
let c1;
let c2;
let c3;
let c4;

// Executar assim que a página e todos os recursos associados são carregados
window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    c1 = new Circulo(50, 50, 40, "#4ba3dd", 1, ctx);
    c2 = new Circulo(canvas.width - 30, 118, 20, "#ff0000", 2, ctx);
    c3 = new Circulo(120, 200, 28, "#e3d644", 1, ctx);
    c4 = new Circulo(70, 15, 10, "pink", 1, ctx);
    
    window.requestAnimationFrame(gameLoop);
});

function gameLoop() {
    update();
    draw();

    window.requestAnimationFrame(gameLoop);
}

function update() {
    c1.update(canvas);
    c2.update(canvas);
    c3.update(canvas);
    c4.update(canvas);
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    c1.desenhar();
    c2.desenhar();
    c3.desenhar();
    c4.desenhar();
}