let canvas;
let ctx;

let camiaoAmarelo;
let nuvem;
let passaro;

// Executar assim que a página e todos os recursos associados são carregados
window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    camiaoAmarelo = new Imagem(-235, canvas.height - 150 - 8, "img/carro1.png", 1, 2, false, ctx);
    nuvem = new  Imagem(0, 20, "img/nuvem.png", 1, 2, true, ctx);
    passaro = new Passaro(canvas.width, 40, "img/passaro.png", 2, 3, false, ctx);

    /*  Event listener para clique do botão esquerdo do rato:
        sempre que o utilizador clica com o botão direito do rato é efetuada deteção de colisão.
    */
    canvas.addEventListener('click', function(e) {
        let pos = getMousePos(canvas, e);

        // Testar se o ponteiro do rato interceta o pássaro
        if (passaro.collisionDetection(pos.x, pos.y))
        {
            console.log(`Tiro na coordenada (${pos.x}, ${pos.y}) `);
        }
    });

    window.requestAnimationFrame(gameLoop);
});

function gameLoop() {
    update();
    draw();

    window.requestAnimationFrame(gameLoop);
}

function update() {
    camiaoAmarelo.update(canvas);
    nuvem.update(canvas);
    passaro.update(canvas);
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    camiaoAmarelo.desenhar();
    nuvem.desenhar();
    passaro.desenhar();
}

// Obter as coordenadas do ponteiro do rato relativamente à posição do elemento <canvas>
function getMousePos(canvas, evt) {
    let rect = canvas.getBoundingClientRect();
    return {
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    };
}        