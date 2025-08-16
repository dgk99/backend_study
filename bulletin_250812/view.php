<?php
session_start(); 
require_once("db_conf.php");

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}
// 사용자가 제목 클릭
// 클릭한 제목에 해당하는 id 값
// Id값을 이용해 mysql에서 해당 행 가져오기
// 가져온 행 화면에 출력
$id = $_GET['id'];
$_SESSION['content_id'] = $id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM bulletin";
    $result = $conn->query($sql);
    while ($have = mysqli_fetch_assoc($result)) {
        if ($id == $have['id']){
    ?>
    <fieldset>
        <label>제목: </label>
        <?= $have['title']; ?><br>
        <label>작성자: </label>
        <?= $have['user_name']; ?>
        <label">작성 날짜: </label>
        <?= $have['created_at']; ?>
        <br><br>

        <label>내용: </label><br>
        <?= $have['content']; ?>

        <?php }?>
        <?php }?>
    </fieldset>

    <form action="edit.php">
        <input type="submit" value="글 수정">
    </form>
    <form action="delete.php">
        <input type="submit" value="글 삭제">
    </form>
</body>
</html>
