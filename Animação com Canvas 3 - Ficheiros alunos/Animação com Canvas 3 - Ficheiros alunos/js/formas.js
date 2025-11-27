class Imagem {
    constructor(x, y, ficheiro, direcao, velocidade, bounce, ctx) {
        this.x = x;
        this.y = y;
        // Direção: 1 = direita, 2 = esquerda
        this.direcao = direcao;
        this.velocidade = velocidade;
        // Bounce: true = muda de direção quando toca no limite do canvas
        this.bounce = bounce;
        this.ctx = ctx;

        this.imagem = new Image();
        this.imagem.src = ficheiro;
    }

    desenhar() {
        ctx.drawImage(this.imagem, this.x, this.y); 
    }

    update(canvas) {
        if (this.direcao == 1) // Direção: para a direita
        {
            if (this.bounce)
            {
                // O objeto faz bounce

                if ((this.x + this.imagem.width) < canvas.width)
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
                // O objeto não faz bounce

                if ((this.x + this.imagem.width) < (canvas.width + this.imagem.width))
                {
                    this.x += this.velocidade;
                }
                else
                {
                    this.x = -this.imagem.width;
                }
            }
        }
        else if (this.direcao == 2) // Direção: para a esquerda
        {
            if (this.bounce)
            {
                // O objeto faz bounce

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
                // O objeto não faz bounce

                if ((this.x + this.imagem.width) > 0)
                {
                    this.x -= this.velocidade;
                }
                else
                {
                    this.x = canvas.width + this.imagem.width;
                }
            }
        }
    }
}

class Passaro extends Imagem {
    constructor(x, y, ficheiro, direcao, velocidade, bounce, ctx) {
        super(x, y, ficheiro, direcao, velocidade, bounce, ctx);
    }

    /* Este método verifica se ocorreu uma colisão do ponteiro do rato com este objeto
    
        Paramêtros:
            mouseX: coordenada X do ponteiro do rato
            mouseY: coordenada Y do ponteiro do rato
    */
    collisionDetection(mouseX, mouseY) {
        if (((mouseX >= this.x) && (mouseX <= (this.x + this.imagem.width))) &&
        ((mouseY >= this.y) && (mouseY <= (this.y + this.imagem.height))))
        {
            return true;
        }
        
        return false;
    }
}