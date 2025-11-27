class Circulo {
    constructor(x, y, raio, cor, direcao, ctx, velocidade) {
        this.x = x;
        this.y = y;
        this.raio = raio;
        this.cor = cor;
        this.direcao = direcao;
        this.ctx = ctx;
        this.velocidade = velocidade; 
    }

    desenhar() {
        this.ctx.beginPath();
        this.ctx.fillStyle = this.cor;
        this.ctx.arc(this.x, this.y, this.raio, 0, 2 * Math.PI, false);
        this.ctx.fill();
    }

    update(canvas) {
        if (this.direcao == 1) {
            if ((this.x + this.raio) < canvas.width) {
                this.x += this.velocidade; 
            } else {
                this.direcao = 2; 
            }
        }
        else if (this.direcao == 2) {
            if ((this.x - this.raio) > 0) {
                this.x -= this.velocidade; 
            } else {
                this.direcao = 1; // Mudar a direção para a direita
            }
        }
    }
}

class Rectangulo {
    constructor(x, y, largura, altura, cor, direcao, velocidade, ctx) {
        this.x = x;
        this.y = y;
        this.largura = largura;
        this.altura = altura;
        this.cor = cor;
        this.direcao = direcao;
        this.velocidade = velocidade;
        this.ctx = ctx;
    }

    desenhar() {
        this.ctx.fillStyle = this.cor;
        this.ctx.fillRect(this.x, this.y, this.largura, this.altura);
    }

    update(canvas) {
        if (this.direcao == 1) {
            if ((this.x + this.largura) < canvas.width) {
                this.x += this.velocidade;
            } else {
                this.direcao = 2;
            }
        }
        else if (this.direcao == 2) {
            if (this.x > 0) {
                this.x -= this.velocidade;
            } else {
                this.direcao = 1;
            }
        }
    }
}