<?php 
session_start();
require_once("db_conf.php");

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}
$content_id = $_SESSION['content_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>
</head>
<body>
    <h1>글 수정</h1>

    <?php
    $sql = "SELECT * FROM bulletin WHERE id=$content_id";
    $result = $conn->query($sql);
    $have = mysqli_fetch_assoc($result);

    if (isset($_SESSION['wrong_pw'])) {
        echo $_SESSION['wrong_pw'];
        unset($_SESSION['wrong_pw']);
    }

    ?>

    <fieldset>
        <form action="edit_process.php" method="post">
            <label for="title">제목: </label>
            <input type="text" name="title" id="title" size="50" value="<?= $have['title'] ?>"><br>

            <label for="user_name">작성자: </label>
            <input type="text" name="user_name" id="user_name" value="<?= $have['user_name'] ?>"><br>
            <label for="content_pw">비밀번호(글 작성 시 사용했던 비밀번호를 입력해 주세요.): </label>
            <input type="password" name="content_pw" id="content_pw"><br>

            <label for="content">내용: </label>
            <input type="text" name="content" id="content" size="80" value="<?= $have['content'] ?>"><br>
            
            <input type="submit" value="수정 완료">
    </form>
    </fieldset>

</body>
</html>