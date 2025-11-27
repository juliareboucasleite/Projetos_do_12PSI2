<canvas id="portugal" width="240" height="160"></canvas>
<script>
const pt = document.getElementById("portugal").getContext("2d");

// Verde (lado esquerdo)
pt.fillStyle = "#006600";
pt.fillRect(0, 0, 240 * 2/5, 160);

// Vermelho (lado direito)
pt.fillStyle = "#FF0000";
pt.fillRect(240 * 2/5, 0, 240 * 3/5, 160);

// Círculo amarelo (escudo simplificado)
pt.beginPath();
pt.arc(240 * 2/5, 80, 25, 0, 2 * Math.PI);
pt.fillStyle = "#FFFF00";
pt.fill();
</script>
