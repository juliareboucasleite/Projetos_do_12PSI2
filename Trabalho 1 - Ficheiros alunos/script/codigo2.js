const canvas2 = document.getElementById("canvas2");
const ctx2 = canvas2.getContext("2d");

const xTop = 180;
const xBottom = 60;

const grad1 = ctx2.createLinearGradient(0, 0, 0, canvas2.height);
grad1.addColorStop(0, "#025221");
grad1.addColorStop(1, "#04d956");

ctx2.moveTo(0, 0);
ctx2.lineTo(xTop, 0);
ctx2.lineTo(xBottom, canvas2.height);
ctx2.lineTo(0, canvas2.height);
ctx2.fillStyle = grad1;
ctx2.fill();

const grad2 = ctx2.createLinearGradient(canvas2.width, 0, canvas2.width, canvas2.height);
grad2.addColorStop(0, "#346305");
grad2.addColorStop(1, "#73de0b");
ctx2.save();
ctx2.beginPath();
ctx2.moveTo(xTop, 0);
ctx2.lineTo(canvas2.width, 0);
ctx2.lineTo(canvas2.width, canvas2.height);
ctx2.lineTo(xBottom, canvas2.height);
ctx2.fillStyle = grad2;
ctx2.fill();

const logoSumol2 = new Image();
const sumol2 = new Image();

logoSumol2.src = "img/logo-sumol.png";
sumol2.src = "img/sumol.png";

logoSumol2.onload = () => {
    const logoX = (canvas2.width - logoSumol2.width) / 2;
    ctx2.drawImage(logoSumol2, logoX, 0);

    sumol2.onload = () => {
        const sumolX = (canvas2.width - sumol2.width) / 2;
        const sumolY = (canvas2.height - sumol2.height) / 2;
        ctx2.drawImage(sumol2, sumolX, sumolY);

        ctx2.fillStyle = "black";
        ctx2.font = "40px Mistral";
        ctx2.textAlign = "center";
        ctx2.textBaseline = "bottom";
        ctx2.fillText("SABOR NATURAL!", canvas2.width / 2, canvas2.height - 10);
    };
};
