<?php

//function

// Hoisting 기능
// echo sum(1, 2);

// function sum($a, $b)
// {
//     return $a + $b;
// }

// function bar($a)
// {
//     $a = 900;
// }

// $foo = 10;

// bar($foo);

// var_dump($foo);

// First-class citizen -> lambda function
//  -> closure funciton

// $foo = 2;

// $bar = function () use (&$foo) {
//     echo "ㅇㅇㅇ<br>".$foo;
// };

// $foo = 10;
// $bar();

function sum($a, $b) {
    echo $a + $b;
}

$test = "sum";

$test(2, 3)

?>