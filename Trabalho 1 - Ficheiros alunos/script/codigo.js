const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

const grad = ctx.createLinearGradient(0, 0, 0, canvas.height);
grad.addColorStop(0, "green");
grad.addColorStop(1, "yellow");
ctx.fillStyle = grad;
ctx.fillRect(0, 0, canvas.width, canvas.height);

function desenhaImagem(caminho, y = null) {
    const img = new Image();
    img.onload = () => {
        const x = (canvas.width - img.width) / 2;
        const posY = y ?? (canvas.height - img.height) / 2;
        ctx.drawImage(img, x, posY);
    };
    img.src = caminho;
}

desenhaImagem("img/logo-sumol.png", 1);
desenhaImagem("img/sumol.png");

