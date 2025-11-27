// Variáveis globais
let canvas, ctx;
let imgFundo, imgPeixe1, imgCavaloMarinho, imgCardume1, imgCardume2, imgMergulhador, imgMira, imgAncora, imgLixo;
let imagensCarregadas = 0;
let totalImagens = 9;
let mouseX = 0;
let mouseY = 0;
let pontuacao = 0; // Pontuação do jogo
let lixos = []; // Array de lixos no oceano
// Posições e estados das animações
let peixe1X = -100; // Começa fora da tela à esquerda
let cavaloMarinhoY = 150;
let cavaloMarinhoDirecao = 1; // 1 = descendo, -1 = subindo
let cardumeX = 2;
let cardumeDirecao = 1; // 1 = direita, -1 = esquerda
let usarCardume1 = true; // true = cardume1, false = cardume2
let mergulhadorX = 1100; // Começa fora da tela à direita
let mergulhadorCompletou = false;
let ancoraY = -100; // Começa acima da tela
let ancoraParou = false; // Controla se a âncora já parou na areia

window.addEventListener("load", (event) => {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");

    // Rastrear posição do mouse
    canvas.addEventListener("mousemove", (e) => {
        const rect = canvas.getBoundingClientRect();
        mouseX = e.clientX - rect.left;
        mouseY = e.clientY - rect.top;
    });
    
    // Evento de clique para coletar lixos
    canvas.addEventListener("click", (e) => {
        const rect = canvas.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const clickY = e.clientY - rect.top;
        
        // Verificar colisão com lixos
        for (let i = lixos.length - 1; i >= 0; i--) {
            const lixo = lixos[i];
            const lixoCenterX = lixo.x + lixo.largura / 2;
            const lixoCenterY = lixo.y + lixo.altura / 2;
            const distancia = Math.sqrt(
                Math.pow(clickX - lixoCenterX, 2) + 
                Math.pow(clickY - lixoCenterY, 2)
            );
            
            // Se clicou no lixo
            if (distancia < lixo.largura / 2) {
                lixos.splice(i, 1);
                pontuacao++;
                break; // Só coleta um lixo por clique
            }
        }
    });

    // Carregar todas as imagens
    carregarImagens();
    
    // Carregar a imagem lixo.png no canvas2 (primeiro quadrado)
    const canvas2 = document.getElementById("canvas2");
    const ctx2 = canvas2.getContext("2d");
    
    const imgLixoMini = new Image();
    imgLixoMini.src = "img/lixo.png";
    
    imgLixoMini.onload = function() {
        ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
        ctx2.drawImage(imgLixoMini, 0, 0, canvas2.width, canvas2.height);
    };
    
    // Evento de clique no canvas2 para adicionar lixo
    canvas2.addEventListener("click", function() {
        adicionarLixo();
    });

    const canvas3 = document.getElementById("canvas3");
    const ctx3 = canvas3.getContext("2d");

    const imgLixoMini2 = new Image();
    imgLixoMini2.src = "img/lixo2.png";
    imgLixoMini2.onload = function() {
        ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
        ctx3.drawImage(imgLixoMini2, 0, 0, canvas3.width, canvas3.height);
    };

    const canvas4 = document.getElementById("canvas4");
    const ctx4 = canvas4.getContext("2d");
    
    const imgLixoMini3 = new Image();
    imgLixoMini3.src = "img/lixo3.png";
    imgLixoMini3.onload = function() {
        ctx4.clearRect(0, 0, canvas4.width, canvas4.height);
        ctx4.drawImage(imgLixoMini3, 0, 0, canvas4.width, canvas4.height);
    };
});

function carregarImagens() {
    // Imagem de fundo
    imgFundo = new Image();
    imgFundo.src = "img/fundo.png";
    imgFundo.onload = verificarCarregamento;
    
    // Peixe 1 (espada)
    imgPeixe1 = new Image();
    imgPeixe1.src = "img/peixe1.png";
    imgPeixe1.onload = verificarCarregamento;
    
    // Cavalo marinho
    imgCavaloMarinho = new Image();
    imgCavaloMarinho.src = "img/cavalo-marinho.png";
    imgCavaloMarinho.onload = verificarCarregamento;
    
    // Cardume 1
    imgCardume1 = new Image();
    imgCardume1.src = "img/cardume1.png";
    imgCardume1.onload = verificarCarregamento;
    
    // Cardume 2
    imgCardume2 = new Image();
    imgCardume2.src = "img/cardume2.png";
    imgCardume2.onload = verificarCarregamento;
    
    // Mergulhador
    imgMergulhador = new Image();
    imgMergulhador.src = "img/mergulhador.png";
    imgMergulhador.onload = verificarCarregamento;
    
    // Mira
    imgMira = new Image();
    imgMira.src = "img/mira.png";
    imgMira.onload = verificarCarregamento;
    
    // Ancora
    imgAncora = new Image();
    imgAncora.src = "img/ancora.png";
    imgAncora.onload = verificarCarregamento;
    
    // Lixo
    imgLixo = new Image();
    imgLixo.src = "img/lixo.png";
    imgLixo.onload = verificarCarregamento;

    //lixo 2
    imgLixo2 = new Image();
    imgLixo2.src = "img/lixo2.png";
    imgLixo2.onload = verificarCarregamento;

    //lixo 3
    imgLixo3 = new Image();
    imgLixo3.src = "img/lixo3.png";
    imgLixo3.onload = verificarCarregamento;
}

function verificarCarregamento() {
    imagensCarregadas++;
    if (imagensCarregadas === totalImagens) {
        // Todas as imagens carregadas, iniciar animação
        gameLoop();
    }
}

function adicionarLixo() {
    // Adiciona um novo lixo em posição aleatória no topo
    const x = Math.random() * (canvas.width - 100) + 50; // Posição X aleatória
    lixos.push({
        x: x,
        y: -50, // Começa acima da tela
        largura: 100,
        altura: 100,
        noLimite: false, // Indica se o lixo está no limite (areia)
        tempoNoLimite: 0 // Contador de frames no limite
    });
}

function gameLoop() {
    // Limpar o canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Desenhar fundo
    ctx.drawImage(imgFundo, 0, 0, canvas.width, canvas.height);
    
    // Desenhar título e identificação
    ctx.font = "bold 36px Arial";
    ctx.fillStyle = "white";
    ctx.fillText("Proteger os Oceanos", 20, 40);
    ctx.font = "18px Arial";
    ctx.fillStyle = "white";
    ctx.fillText("Autor: Julia Rebouças Leite, nº 10", 20, 70);
    
    // Desenhar pontuação
    ctx.font = "bold 24px Arial";
    ctx.fillStyle = "yellow";
    ctx.fillText(`Pontos: ${pontuacao}`, 20, 100);
    
    // Animar e desenhar lixos
    const areiaY = 550; // Posição Y onde a areia começa
    const tempoLimiteFrames = 120; // 2 segundos (60 fps * 2)
    
    for (let i = lixos.length - 1; i >= 0; i--) {
        const lixo = lixos[i];
        
        // Verificar se o lixo chegou no limite (areia)
        if (!lixo.noLimite && lixo.y + lixo.altura >= areiaY) {
            // Parar o lixo no limite
            lixo.y = areiaY - lixo.altura;
            lixo.noLimite = true;
            lixo.tempoNoLimite = 0;
        }
        
        // Se o lixo não está no limite, continuar descendo
        if (!lixo.noLimite) {
            lixo.y += 1.5; // Velocidade de descida
        } else {
            // Lixo está no limite, incrementar contador
            lixo.tempoNoLimite++;
            
            // Se passou 2 segundos (120 frames)
            if (lixo.tempoNoLimite >= tempoLimiteFrames) {
                // Remover 2 pontos se o usuário tiver pontos suficientes
                if (pontuacao >= 2) {
                    pontuacao -= 2;
                } else if (pontuacao > 0) {
                    pontuacao = 0; // Não pode ficar negativo
                }
                
                // Remover o lixo
                lixos.splice(i, 1);
                continue;
            }
        }
        
        // Remover lixo se sair da tela (caso não tenha chegado no limite)
        if (lixo.y > canvas.height) {
            lixos.splice(i, 1);
            continue;
        }
        
        // Desenhar o lixo
        if (imgLixo && imgLixo.complete) {
            ctx.drawImage(imgLixo, lixo.x, lixo.y, lixo.largura, lixo.altura);
            
            // Desenhar indicador visual se está no limite (opcional - contador)
            if (lixo.noLimite) {
                const tempoRestante = Math.ceil((tempoLimiteFrames - lixo.tempoNoLimite) / 60);
                ctx.font = "bold 16px Arial";
                ctx.fillStyle = "red";
                ctx.fillText(`${tempoRestante}s`, lixo.x + lixo.largura / 2 - 10, lixo.y - 5);
            }
        }
    }
    
    // Animar Peixe 1 (→ direita, infinito, velocidade 2)
    peixe1X += 2;
    if (peixe1X > canvas.width) {
        peixe1X = -100; // Reinicia quando sai da tela
    }
    ctx.drawImage(imgPeixe1, peixe1X, 100, 150, 80);
    
    // Animar Cavalo Marinho (↑↓ cima/baixo, infinito, velocidade 1)
    cavaloMarinhoY += 1 * cavaloMarinhoDirecao;
    if (cavaloMarinhoY >= 400 || cavaloMarinhoY <= 100) {
        cavaloMarinhoDirecao *= -1; // Inverte direção
    }
    ctx.drawImage(imgCavaloMarinho, 800, cavaloMarinhoY, 80, 100);
    // Animar Cardume (← → esquerda/direita, infinito, velocidade 2)
    cardumeX += 2 * cardumeDirecao;
    if (cardumeX >= canvas.width - 150 || cardumeX <= 0) {
        cardumeDirecao *= -1; // Inverte direção
        usarCardume1 = !usarCardume1; // Alterna entre cardume1 e cardume2 quando bate na parede
    }
    // Usar cardume1 ou cardume2 baseado na variável
    const imgCardumeAtual = usarCardume1 ? imgCardume1 : imgCardume2;
    ctx.drawImage(imgCardumeAtual, cardumeX, 400, 150, 100);
    
    // Animar Mergulhador (← esquerda, 1 repetição, velocidade 3)
    if (!mergulhadorCompletou) {
        mergulhadorX -= 3;
        if (mergulhadorX < -150) {
            mergulhadorCompletou = true; // Para quando completa uma vez
        } else {
            ctx.drawImage(imgMergulhador, mergulhadorX, 450 , 300, 90);
        }
    }
    // Animar Ancora (descendo devagar no meio)
    const ancoraX = canvas.width / 2 - 40; // Posição central (ajustar conforme tamanho da imagem)
    const ancoraAltura = 100; // Altura da âncora
    // areiaY já está declarada acima na seção de lixos
    
    // Só move se ainda não parou na areia
    if (!ancoraParou) {
        ancoraY += 0.5; // Velocidade lenta
        
        // Verificar se a âncora chegou na areia (base da âncora toca a areia)
        if (ancoraY + ancoraAltura >= areiaY) {
            ancoraY = areiaY - ancoraAltura; // Posiciona exatamente na areia
            ancoraParou = true; // Para a animação
        }
    }
    // Desenhar a corrente e âncora se estiver visível
    if (ancoraY > -ancoraAltura && ancoraY < canvas.height) {
        // Desenhar a corrente
        const correnteInicioY = 0; // Começa no topo do canvas
        const correnteFimY = ancoraY; // Termina no topo da âncora
        const correnteX = canvas.width / 2; // Centralizada
        
        ctx.strokeStyle = "#4a4a4a"; // Cor cinza escuro para a corrente
        ctx.lineWidth = 3;
        
        // Desenhar a linha principal da corrente
        ctx.beginPath();
        ctx.moveTo(correnteX, correnteInicioY);
        ctx.lineTo(correnteX, correnteFimY);
        ctx.stroke();
        
        // Desenhar elos de corrente (pequenos retângulos ao longo da linha)
        const eloSize = 8;
        const espacamento = 12;
        for (let y = correnteInicioY + 5; y < correnteFimY; y += espacamento) {
            ctx.fillStyle = "#3a3a3a";
            ctx.fillRect(correnteX - eloSize / 2, y, eloSize, eloSize);
            ctx.strokeStyle = "#2a2a2a";
            ctx.lineWidth = 1;
            ctx.strokeRect(correnteX - eloSize / 2, y, eloSize, eloSize);
        }
        
        // Desenhar a âncora
        ctx.drawImage(imgAncora, ancoraX, ancoraY, 80, ancoraAltura);
    }
    
    // Desenhar a mira na posição do mouse
    if (imgMira && imgMira.complete) {  
        const TamanhoMira = 130; 
        ctx.drawImage(imgMira, mouseX - TamanhoMira / 2, mouseY - TamanhoMira / 2, TamanhoMira, TamanhoMira);
    }
    window.requestAnimationFrame(gameLoop);
}
