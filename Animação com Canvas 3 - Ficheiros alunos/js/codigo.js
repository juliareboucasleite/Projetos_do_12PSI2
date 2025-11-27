let canvas;
let ctx;
let camiaoAmarelo;
let camiaoAzul;
let nuvem;
let aranha;
let passaros = []; // Array para múltiplos pássaros
let bombas = [];
let passarosMortos = 0;
let velocidadeBase = 2;

window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    camiaoAmarelo = new Imagem(-235, canvas.height - 150 - 8, "img/carro1.png", 1, 2, false, ctx);
    camiaoAzul = new Imagem(canvas.width, canvas.height - 150 - 8, "img/carro2.png", 2, 3, false, ctx);
    nuvem = new  Imagem(0, 20, "img/nuvem.png", 1, 2, true, ctx);
    aranha = new Imagem(100, canvas.height - 190, "img/aranha.jpg", 1, 1, true, ctx, 50, 50);
    
    criarPassaros(3);
    canvas.addEventListener('click', function(e) {
        let pos = getMousePos(canvas, e);
        for (let i = 0; i < passaros.length; i++) {
            let passaro = passaros[i];
            if (!passaro.morto && passaro.collisionDetection(pos.x, pos.y))
            {
                console.log(`Tiro na coordenada (${pos.x}, ${pos.y}) `);
                passaro.morto = true;
                let bomba = new Bomba(pos.x - 25, pos.y - 25, "img/pngwing.com.png", ctx);
                bombas.push(bomba);
                passarosMortos++;
                velocidadeBase += 0.3;
                criarPassaros(1);
                break;
            }
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
    camiaoAzul.update(canvas);
    nuvem.update(canvas);
    aranha.update(canvas);
    
    for (let passaro of passaros) {
        passaro.update(canvas);
    }
    
    for (let i = passaros.length - 1; i >= 0; i--) {
        if (passaros[i].morto && (passaros[i].x + passaros[i].imagem.width < 0 || passaros[i].x > canvas.width)) {
            passaros.splice(i, 1);
        }
    }
    
    let passarosVivos = passaros.filter(p => !p.morto).length;
    
    if (passarosVivos < 3) {
        criarPassaros(3 - passarosVivos);
    }
    
    for (let i = bombas.length - 1; i >= 0; i--) {
        bombas[i].update();
        if (bombas[i].tempoVida <= 0) {
            bombas.splice(i, 1);
        }
    }
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    camiaoAzul.desenhar();
    camiaoAmarelo.desenhar();
    
    nuvem.desenhar();
    aranha.desenhar();
    
    for (let passaro of passaros) {
        passaro.desenhar();
    }
    
    for (let bomba of bombas) {
        bomba.desenhar();
    }
    
    ctx.fillStyle = "#FFFFFF";
    ctx.font = "bold 24px Arial";
    ctx.fillText(` ${passarosMortos}`, 10, 30);
}

function criarPassaros(quantidade) {
    for (let i = 0; i < quantidade; i++) {  
        let yAleatorio = 30 + Math.random() * 120;
        let velocidadeAleatoria = velocidadeBase + Math.random() * 1;
        let xInicial = Math.random() > 0.5 ? canvas.width : -50;
        let direcao = xInicial > 0 ? 2 : 1;
        
        let novoPassaro = new Passaro(xInicial, yAleatorio, "img/passaro.png", direcao, velocidadeAleatoria, false, ctx);
        passaros.push(novoPassaro);
    }
}

function getMousePos(canvas, evt) {
    let rect = canvas.getBoundingClientRect();
    return {
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    };
}        