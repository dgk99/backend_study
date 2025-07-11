<?php

function http_response_error($msg){
    http_response_code(400);
    echo $msg."<br>";
    exit;
};

// POST or GET 입력 값 사용 전, 반드시 입력 값에 대한 검증이 필요하다.
// 1. 입력 값의 존재 여부

if(!isset($_POST["id"]) || !isset($_POST["pw"])){
    http_response_error("입력 값을 확인하세요");
};

// 공백도 하나의 글자이므로, 문자열 전처리 작업이 꼭 필요하다.
// 2. 문자열 전처리
$id = trim($_POST["id"]);
$pw = trim($_POST["pw"]);

// 3. option : 각 필드별 특성 처리
if(!is_numeric($pw)){
    http_response_error("패스워드는 숫자로 구성됩니다.");
};
// key값은 있지만, value값이 없는 경우가 있을 수 있으니 관리
if($id == ''){
    http_response_error("id를 입력하세요");

}

echo "입력값 검증 완료<br>";


?>