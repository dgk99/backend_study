<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 작성</title>
</head>
<body>
    <h1>글 작성</h1>

    <?php
    if (isset($_SESSION['blank'])) {
        echo $_SESSION['blank'];
        unset($_SESSION['blank']);
    }
    ?>

    <fieldset>
        <form action="write_process.php" method="post">
            <label for="title">제목: </label>
            <input type="text" name="title" id="title" size="50"><br>

            <label for="user_name">작성자: </label>
            <input type="text" name="user_name" id="user_name">
            <label for="content_pw">비밀번호: </label>
            <input type="password" name="content_pw" id="content_pw"><br>

            <label for="content">내용: </label>
            <input type="text" name="content" id="content" size="80"><br>
            
            <input type="submit" value="작성 완료">
    </form>
    </fieldset>

</body>
</html>