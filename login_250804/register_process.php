<?php
session_start();
require_once("db_conf.php");

// DB와 연결
$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

// DB 연결 체크
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// 입력한 내용 유효성 검사
// 공백 제거
$user_id = trim($_POST['user_id']);
$user_pw = trim($_POST['user_pw']);
$user_name = trim($_POST['user_name']);

// 모든 값 입력 유무 확인 - 입력하지 않은 값이 존재할 경우, 에러 메시지 출력 및 register.php로 reload
if ($user_id === '' || $user_pw === '' || $user_name === '') {
    $_SESSION['error'] = "입력하지 않은 값이 존재합니다. 모든 값을 입력해 주세요.";
    header("Location: register.php");
    exit();
}

// 아이디 중복 확인
$sql = "SELECT * FROM users WHERE username = '$user_id'";
$result = $conn->query($sql);
$id_duplicated = mysqli_fetch_assoc($result);
if ($id_duplicated) {
    $_SESSION['error'] = "이미 존재하는 아이디입니다.";
    header("Location: register.php");
    exit();
}

// 비밀번호 해시화
$hashed_pw = password_hash("$user_pw", PASSWORD_DEFAULT);

// 정보 DB에 저장
$sql = "INSERT INTO users (username, password, name) VALUES ('$user_id', '$hashed_pw', '$user_name')";

// 로그인 페이지로 이동
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "회원가입에 성공하셨습니다!";
    header("Location: login.php");
    exit();
}
