let canvas;
let ctx;
let x;
let y;
let raio;
let direcao;

window.addEventListener("load", (event) =>{
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    window.requestAnimationFrame(gameLoop);
    x = 50;
    y = canvas.height / 2;
    raio = 40;
    direcao = 1;

    function gameLoop() {
        update();
        draw();
        window.requestAnimationFrame(gameLoop);
    }
    function update() {
        if (direcao == 1) {
            if ((x + raio) < canvas.width) {
                x += 1;
            } else {
                direcao = 2; // Mudar de direção: ir para a esquerda quando o círculo atinge a largura do <canvas>
            }
        } else if (direcao == 2) {
            if ((x - raio) > 0) {
                x -= 1;
            } else {
                direcao = 1; // Mudar de direção: ir para a direita quando o círculo atinge o início do <canvas>
            }
        }
    }

    function draw() {
        ct.clearRect(0, 0, canvas.width, canvas.height);
        ctx.beginPath();
        ctx.fillStyle = "#4ba3dd";
        ctx.arc(x, y, raio, 0, 2 * Math.PI);
        ctx.arc(x,y, raio, 0, 2 * Math.PI);
        ctx.fill();
    }


});