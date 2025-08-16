<?php

session_start();
require_once("db_conf.php");

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}

// 공백 제거
$title = trim($_POST['title']);
$user_name = trim($_POST['user_name']);
$content_pw = trim($_POST['content_pw']);
$content = trim($_POST['content']);

// 내용 빠짐 없이 작성했나 확인
// 빠진 내용이 있을 경우, 경고문 출력 후 write.php로 reload
if ($title === '' || $user_name === '' || $content_pw === '' || $content === '') {
    $_SESSION['blank'] = "빈칸없이 모든 내용을 작성해 주세요.";
    header("Location: write.php");
    exit();
}

// 입력한 비밀번호 해시화
$hashed_pw = password_hash($content_pw, PASSWORD_DEFAULT);

// 제대로 작성했다면, 내용 DB에 저장하고 list.php로 reload
$sql = "INSERT INTO bulletin (title, user_name, content_pw, content) VALUES ('$title', '$user_name', '$hashed_pw', '$content')";
$result = $conn->query($sql);
if ($result === TRUE) {
    header("Location: list.php");
    exit();
}

