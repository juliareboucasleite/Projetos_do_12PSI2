let canvas;
let ctx;

let x;
let y;
let raio;

// Direção do movimento: 1 = direita, 2 = esquerda
let direcao;

// Executar assim que a página e todos os recursos associados são carregados
window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    window.requestAnimationFrame(gameLoop);

    x = 50;
    y = canvas.height / 2;
    raio = 80;
    direcao = 1;
});

// Função principal: executada periodicamente, chama por sua vez as restantes funções que implementam a animação
function gameLoop() {
    update();
    draw();

    window.requestAnimationFrame(gameLoop);
}

// Responsável por atualizar os elementos da animação
function update() {
    if (direcao == 1)
    {
        if ((x + raio) < canvas.width)
        {
            x += 1;
        }
        else
        {
            direcao = 2;
        }
    }
    else if (direcao == 2)
    {
        if ((x - raio) > 0)
        {
            x -= 1;
        }
        else
        {
            direcao = 1;
        }
    }
}

// Responsável por limpar a área do elemento <canvas> e desenhar as formas
function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.beginPath();
    ctx.fillStyle = "#4ba3dd";
    ctx.arc(x, y, raio, 0, 2 * Math.PI, false);
    ctx.fill();
}