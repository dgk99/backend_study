<?php
session_start();
require_once('db_conf.php');

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}

$content_id = $_SESSION['content_id'];
// 사용자에게 입력받은 비밀번호
$content_pw = $_POST['content_pw'];

$title = $_POST['title'];
$user_name = $_POST['user_name'];
$content = $_POST['content'];

// echo $content_id, $content_pw, $title, $user_name, $content;

$sql = "SELECT * FROM bulletin";
$result = $conn->query($sql);

while ($have = mysqli_fetch_array($result)) {
    $duplicate = password_verify($content_pw, $have['content_pw']);

    if ($duplicate == FALSE && $content_id == $have['id']) {
        $_SESSION['wrong_pw'] = "비밀번호가 틀렸습니다.";
        header("Location: edit.php");
        exit();
    }

    if ($duplicate == TRUE && $content_id == $have['id']) {
        $sql = "UPDATE bulletin SET user_name='$user_name', title='$title', content='$content' WHERE id=$content_id";
        $result = $conn->query($sql);
    
        $_SESSION['edit'] = "해당 글을 수정 완료 했습니다.";
        unset($_SESSION['content_id']);
        header("Location: list.php");
        exit();
        break;
    } 

}
?>