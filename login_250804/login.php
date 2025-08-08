<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>로그인</h1>

    <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } else if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        } else if (isset($_SESSION['noid'])) {
            echo $_SESSION['noid'];
            unset($_SESSION['noid']);
        } else if (isset($_SESSION['nopw'])) {
            echo $_SESSION['nopw'];
            unset($_SESSION['nopw']);
        } 
    ?>

    <fieldset>
        <legend>로그인 정보 입력</legend>
        <form action="login_process.php" method="post">
            <label for="user_id">아이디: </label>
            <input type="text" name="user_id" id="user_id"><br>
            <label for="user_pw">비밀번호: </label>
            <input type="text" name="user_pw" id="user_pw"><br>
            <input type="submit" value="로그인">
        </form>
        <form action="register.php">
            <input type="submit" value="회원가입">  
        </form>
            
        
    </fieldset>
</body>
</html>