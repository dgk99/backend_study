<?php
// 1) 쿠키 생성 요청 (어플리케이션 서버)
setcookie("bar", "milk"); // bar = milk
// http response 메시지에 bar라는 이름과 milk라는 값을 가지는 쿠키를
// 생성하는 메시지를 작성하시오 를 삽입함


// 2) 쿠키 생성 (클라이언트)
// Web browser가 local에 쿠키 정보를 파일로 저장
// 도메인 단위 관리 : localhost/bar=milk

// 3) 쿠키 전달 (클라이언트)
// 4) 쿠키 읽기 (어플리케이션 서버)

