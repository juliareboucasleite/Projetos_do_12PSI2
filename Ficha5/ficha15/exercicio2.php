<canvas id="noruega" width="240" height="160"></canvas>
<script>
const no = document.getElementById("noruega").getContext("2d");

// Fundo vermelho
no.fillStyle = "#EF2B2D";
no.fillRect(0, 0, 240, 160);

// Cruz branca (largura 30 px)
no.fillStyle = "#FFFFFF";
no.fillRect(0, 65, 240, 30);
no.fillRect(65, 0, 30, 160);

// Cruz azul (largura 15 px)
no.fillStyle = "#00205B";
no.fillRect(0, 72.5, 240, 15);
no.fillRect(72.5, 0, 15, 160);
</script>
