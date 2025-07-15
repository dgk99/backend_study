<?php
// session_start();

if(session_id() !== '') {
    echo '세션 시작 중';
}

if(session_status() == PHP_SESSION_ACTIVE){
    echo "<br>세션 활동 중";
};

// Create, Update
$_SESSION ['std_info'] = [
    "id" => 2423005, "name" => "김민규"
];

if (isset($_SESSION['std_info'])){
    print_r($_SESSION['std_info']);
} else {
    echo "학생 정보 없음";
}

echo $_SESSION['name'] = "kmg";