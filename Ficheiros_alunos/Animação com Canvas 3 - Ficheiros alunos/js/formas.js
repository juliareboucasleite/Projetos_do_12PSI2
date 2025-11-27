class Imagem {
    constructor(x, y, ficheiro, direcao, velocidade, bounce, ctx, largura, altura) {
        this.x = x;
        this.y = y;
        this.direcao = direcao;
        this.velocidade = velocidade;
        this.bounce = bounce;
        this.ctx = ctx;
        this.largura = largura;
        this.altura = altura;

        this.imagem = new Image();
        this.imagem.src = ficheiro;
    }

    desenhar() {
        if (this.largura && this.altura) {
            ctx.drawImage(this.imagem, this.x, this.y, this.largura, this.altura);
        } else {
            ctx.drawImage(this.imagem, this.x, this.y);
        }
    }

    update(canvas) {
        let larguraAtual = this.largura || this.imagem.width;
        
        if (this.direcao == 1)
        {
            if (this.bounce)
            {

                if ((this.x + larguraAtual) < canvas.width)
                {
                    this.x += this.velocidade;
                }
                else
                {
                    this.direcao = 2;
                }
            }
            else
            {

                if ((this.x + larguraAtual) < (canvas.width + larguraAtual))
                {
                    this.x += this.velocidade;
                }
                else
                {
                    this.x = -larguraAtual;
                }
            }
        }
        else if (this.direcao == 2)
        {
            if (this.bounce)
            {

                if  (this.x > 0)
                {
                    this.x -= this.velocidade;
                }
                else
                {
                    this.direcao = 1;                    
                }
            }
            else
            {

                if ((this.x + larguraAtual) > 0)
                {
                    this.x -= this.velocidade;
                }
                else
                {
                    this.x = canvas.width + larguraAtual;
                }
            }
        }
    }
}

class Passaro extends Imagem {
    constructor(x, y, ficheiro, direcao, velocidade, bounce, ctx) {
        super(x, y, ficheiro, direcao, velocidade, bounce, ctx);
        this.morto = false;
    }

    desenhar() {
        if (!this.morto) {
            ctx.drawImage(this.imagem, this.x, this.y);
        }
    }

    collisionDetection(mouseX, mouseY) {
        if (((mouseX >= this.x) && (mouseX <= (this.x + this.imagem.width))) &&
        ((mouseY >= this.y) && (mouseY <= (this.y + this.imagem.height))))
        {
            return true;
        }
        
        return false;
    }
}

class Bomba {
    constructor(x, y, ficheiro, ctx) {
        this.x = x;
        this.y = y;
        this.ctx = ctx;
        this.tempoVida = 60;
        
        this.imagem = new Image();
        this.imagem.src = ficheiro;
    }
    
    desenhar() {
        if (this.imagem.complete) {
            this.ctx.drawImage(this.imagem, this.x, this.y, 50, 50);
        }
    }
    
    update() {
        this.tempoVida--;
    }
}