<canvas id="velocidade" width="240" height="160"></canvas>
<script>
const v = document.getElementById("velocidade").getContext("2d");

v.translate(120, 80); // Centro

// Círculo vermelho exterior
v.beginPath();
v.arc(0, 0, 60, 0, 2 * Math.PI);
v.strokeStyle = "red";
v.lineWidth = 10;
v.stroke();

// Número 80
v.fillStyle = "black";
v.font = "bold 55px Arial";
v.textAlign = "center";
v.textBaseline = "middle";
v.fillText("80", 0, 0);

</script>
