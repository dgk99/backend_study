<?php 
// 세션 시작
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>회원가입</h1>
    
    <?php // 세션에 'error'키에 메시지가 존재하면, 화면에 출력
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        };
    ?>
    
    <fieldset>
    <!-- 사용자의 아이디, 비밀번호, 이름을 입력받아 POST 형식으로 register_process.php로 전송-->
        <legend>정보 입력</legend>
        <form action="register_process.php" method="post">
            <label for="user_id">아이디: </label>
            <input type="text" name="user_id" id="user_id"><br>
            <label for="user_pw">비밀번호: </label>
            <input type="text" name="user_pw" id="user_pw"><br>
            <label for="user_name">이름: </label>
            <input type="text" name="user_name" id="user_name"><br>

            <input type="submit" value="회원가입">
        </form>
    </fieldset>
</body>
</html>