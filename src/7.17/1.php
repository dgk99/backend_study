<?php
// db 라는 주소를 가지는 mysql에 접속
// 인증 ID : root
// 패스워드 : root
// 선택 DB : gsc

//              hostname, username, password, database
$db_conn = new mysqli("db", "root", "root", "gsc");
// mysql -u root -p
// root
// use gsc;

class Bar {
    function __construct() {
        echo "생성자 호출";
        Bar::$id++;
    }

    function __destruct() {
        print "소멸자 호출";
    }

    public $value = 20;

    function get_value() {
        return $value;
    }

    public static $id = 0;
}

$obj = new Bar();
print $obj->value;

$obj2 = new Bar();

echo Bar::$obj;

unset($obj);
echo "프로그램 종료";