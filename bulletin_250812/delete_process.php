<?php

session_start();
require_once("db_conf.php");

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}

$content_id = $_SESSION['content_id'];
// 사용자에게 입력받은 비밀번호
$content_pw = $_POST['content_pw'];

// 그 비밀번호가 이 글을 작성할 때 사용했던 비밀번호와 일치하면
// 이 글 DB에서 삭제하고 list.php로 reload
// 일치하지 않는다면, 경고문 출력 후 delete.php로 reload

$sql = "SELECT * FROM bulletin";
$result = $conn->query($sql);

while ($have = mysqli_fetch_array($result)) {
    $duplicate = password_verify($content_pw, $have['content_pw']);

    if ($duplicate == FALSE && $content_id == $have['id']) {
        $_SESSION['wrong_pw'] = "비밀번호가 틀렸습니다.";
        header("Location: delete.php");
        exit();
    }

    if ($duplicate == TRUE && $content_id == $have['id']) {
        $sql = "DELETE FROM bulletin WHERE id=$content_id";
        $result = $conn->query($sql);
    
        $_SESSION['delete'] = "해당 글을 삭제 완료 했습니다.";
        unset($_SESSION['content_id']);
        header("Location: list.php");
        exit();
        break;
    } 
}