<canvas id="proibido" width="240" height="160"></canvas>
<script>
  const p = document.getElementById("proibido").getContext("2d");
    p.translate(120, 80);
    p.beginPath();
    p.arc(0, 0, 60, 0, 2 * Math.PI);
    p.fillStyle = "red";
    p.fill();
    p.fillStyle = "white";
    p.fillRect(-30, -10, 60, 20);
</script>
