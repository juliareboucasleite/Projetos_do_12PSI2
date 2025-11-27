class Circulo {
    constructor(x, y, raio, cor, direcao, velocidade, ctx) {
        this.x = x;
        this.y = y;
        this.raio = raio;
        this.cor = cor;
        this.direcao = direcao;
        this.velocidade = velocidade;
        this.ctx = ctx;
    }

    desenhar() {
        ctx.beginPath();
        ctx.fillStyle = this.cor;
        ctx.arc(this.x, this.y, this.raio, 0, 2 * Math.PI, false);
        ctx.fill();
    }

    update(canvas) {
        if (this.direcao == 1)
        {
            if ((this.x + this.raio) < canvas.width)
            {
                this.x += this.velocidade;
            }
            else
            {
                this.direcao = 2;
            }
        }
        else if (this.direcao == 2)
        {
            if ((this.x - this.raio) > 0)
            {
                this.x -= this.velocidade;
            }
            else
            {
                this.direcao = 1;
            }
        }
    }
}