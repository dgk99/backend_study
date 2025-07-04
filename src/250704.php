<?php

// 연산자 Operator
/*
1) 기능
2) 우선순위
3) 이항 연산 시 묵시적 형변환 규칙
*/

/*
비교 연산자 : ==, !=, >, <, >=, <=
*/

// $bar = 1;
// $foo = 2;

// $my_array = [10, 1, 5, 90, 3];

// usort($my_array, function($a, $b) {
//     return $a <=> $b;

//     // if ($a == $b) { 
//     //     return 0;
//     // } else {
//     //     return $a < $b ? 1 : -1;
//     // }
// });

// var_dump($my_array);

/*
논리 : !, &&, ||, and, or
*/

// $bar = true && false;
// var_dump($bar);

// $bar = true and false;
// var_dump($bar);

// echo "1" . "222ff";

// $bar = "hello";
// $bar .= " world";

// echo $bar;

// 에러 제어 연산자
// @include 'adsfasfd.php';

// 실행 연산자 

// 배열 연산자

// Array -> 순서가 보장된 HashMap
// HashMap : key <-> value pair
// php에서 key 값을 주는 법 : key => value

// $bar = [3 => 1, "mynum" => 10, 5];
// $foo = array(1, 2, 3);
// var_dump($bar);



// $bar = [1, 2, 3];
// $foo = [1, 2 => 3, 1 => 2];

// if($bar === $foo)
//     echo "True";
// else
//     echo "False";

// echo "<br>";

// echo 1 + "1d4fdf"; // <- 바꿀 수 있는 1까지만 숫자로 바꾸고 나머지는 놔둠
// // int + string
// //       int(string)

echo 2 > 4 ? "hello" : "world";

?>