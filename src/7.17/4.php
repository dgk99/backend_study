<?php
// db 라는 주소를 가지는 mysql에 접속
// 인증 ID : root
// 패스워드 : root
// 선택 DB : gsc

print_r($_POST);

// 1번 작업 : DBMS와의 연결 설정
$db_conn = new mysqli("db", "root", "root", "gsc");
// mysql -u root -p
// root
// use gsc;


// 연결 결과 확인
if($db_conn->errno){
    // 연결 실패 시 -> 프로그램 종료
    echo $db_conn -> error;
    exit;
}

// 2번 작업 : SQL 전송
// 새로운 레코드를 생성
$std_id = $_POST['std_id'];

// 2-1 : SQL문 작성 -> 문자열을 이용하여 실행하고자 하는 SQL문을 생성
$sql = "delete from student where std_id = '$std_id'";

// 2-2 : SQL문 전송 Client -> DBMS 서버
// $result 결과 값
// 1) true 2) Instance of mysqli_result class 3) false
$result = $db_conn->query($sql);

// 3번 작업 : 반환 값 처리
if($result) {
    echo "<hr><br>레코드 삭제 성공<br><hr>";
} else {
    echo "<hr><br>레코드 삭제 실패<br><hr>";
}

// 4번 작업 : 연결 종료
$db_conn->close();

