<?php

$a = 0;
$b = 0;
$i = 0;

// for ($i = 0; $i <= 5; $i++) {
//    $a += 10;
//    $b += 5;
//    echo "Значение a = $a Значение b = $b\n";
// }

do{
    $a += 10;
    $b += 5;
    echo "Значение a = $a Значение b = $b\n";
    $i++;
}while($i <= 5);

echo "End of the loop: a = $a, b = $b";