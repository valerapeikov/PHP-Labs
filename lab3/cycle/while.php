<?php

$a = 0;
$b = 0;
$i = 0;

// for ($i = 0; $i <= 5; $i++) {
//    $a += 10;
//    $b += 5;
//    echo "Значение a = $a Значение b = $b\n";
// }

while ($i <= 5) {
    $a += 10;
    $b += 5;
    echo "Значение a = $a Значение b = $b\n";
    $i++;
}

echo "End of the loop: a = $a, b = $b";