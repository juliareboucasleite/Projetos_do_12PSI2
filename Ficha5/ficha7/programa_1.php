<html>
<body>
<?php
$n1 = 12;
$n2 = 8;
$n3 = 10;
$media = ($n1 + $n2 + $n3) / 3;
if ($media >= 9.5) {
    echo "O aluno está aprovado";
} elseif ($media >= 8 && $media < 9.5) {
    echo "O aluno vai à recuperação";
} else {
    echo "O aluno está reprovado";
}
?>
</body>
</html>
