<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 삭제</title>
</head>
<body>
    <h1>글을 삭제하시려면, 해당 글의 비밀번호를 입력해 주세요.</h1>

    <?php 
        if (isset($_SESSION['wrong_pw'])) {
            echo $_SESSION['wrong_pw'];
            unset($_SESSION['wrong_pw']);
        }
    ?>

    <form action="delete_process.php" method="post">
        <label for="content_pw">비밀번호: </label>
        <input type="password" name="content_pw" id="content_pw"><br>
        <input type="submit" value="삭제하기">
    </form>
</body>
</html>