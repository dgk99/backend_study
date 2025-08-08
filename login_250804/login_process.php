<?php

session_start();
require_once("db_conf.php");

// DB와 연결
$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

// DB 연결 체크
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}


// 사용자가 입력한 내용 유효성 검사

// 공백 제거
$user_id = trim($_POST['user_id'], '');
$user_pw = trim($_POST['user_pw'], '');

// 빈칸 검사
if ($user_id == '' || $user_pw == '') {
    $_SESSION['error'] = "입력하지 않은 값이 존재합니다. 모든 값을 입력해 주세요.";
    header("Location: login.php");
    exit();
}

$sql_id = "SELECT * FROM users WHERE username = '$user_id'";
$result_id = $conn->query($sql_id);
$duplicated = mysqli_fetch_assoc($result_id);

// 아이디 존재하지 않을 시, 경고 문구 출력 후 login.php로 reload
if ($duplicated == null) {
    $_SESSION['noid'] = "존재하지 않는 ID입니다.";
    header("Location: login.php");
    exit();
}

$unhashed = password_verify($user_pw, $duplicated['password']);

// 해시화 된, 회원가입 시 입력한 비밀번호 !== 로그인을 위해 사용자가 입력한 비밀번호
// 비밀번호 일치하지 않을 시, 경고 문구 출력 후 login.php로 reload
if ($unhashed === FALSE) {
    $_SESSION['nopw'] = "비밀번호가 틀렸습니다. 다시 입력해주세요.";
    header("Location: login.php");
    exit();
}

// 세션 시작 후, welcome 홈페이지로 이동
$_SESSION['welcome'] = "환영합니다. " . $duplicated['name'];
header("Location: welcome.php");
exit();
?>