<?php
$a = array("a" => "maçã", "b" => "banana");
$b = array("a" => "kiwi", "b" => "ananás", "c" => "morango");

$uniao1 = array_merge($a, $b);
print_r($uniao1);
echo "<br>";

$uniao2 = array_merge($b, $a);
print_r($uniao2);
?>
