<canvas id="estacionar" width="240" height="160"></canvas>
<script>
 const e = document.getElementById("estacionar").getContext("2d");
    e.translate(120, 80);
    e.beginPath();
    e.arc(0, 0, 60, 0, 2 * Math.PI);
    e.fillStyle = "red";
    e.fill();
    e.beginPath();
    e.arc(0, 0, 45, 0, 2 * Math.PI);
    e.fillStyle = "#1C2E4A";
    e.fill();
    e.save();
    e.rotate(-Math.PI / 4);
    e.fillStyle = "red";
    e.fillRect(-10, -50, 20, 100);
    e.restore();
</script>
