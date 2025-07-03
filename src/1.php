<?php

// 변수 선언 -> 동적 타이핑
// $변수명 = 값; // 자바처럼 ;을 이용하여 구분

// $bar = 1;
// $foo = 2.0;
// $kin = true;
// $pos = "hello";

// var_dump($bar, $foo, $kin, $pos);


// 변수 자료형
// function bar($arg) 
// {
//     foreach ($arg as $key => $value) {
//         echo "{key}: {$value}<br>";
//     }
// }

// $foo = [1, 2, 3];

// bar($foo);
// var_dump($foo);

// 접근 범위 & 생명주기
// 출생 - 소멸
// 선언 - ??

// 자바 -> 블록 기반
// 파이썬 -> 함수 기반
// php -> 함수 기반

// function foo()
// {`
//     $bar = "hello";
//     print $bar
// }

// foo();

// constant

// define('NAME', "kim");

const NAME = "gyu";

echo NAME;

?>
