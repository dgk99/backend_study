<?php 
session_start(); 
require_once("db_conf.php");

$conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PASS, DB_INFO::DB_NAME);

if ($conn->connect_error) {
    die("연결 실패: ") . $conn->connect_error;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>게시글 목록</title>
    <style>
      table, th, td {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <h1>게시글 목록</h1>

    <?php
      if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      } else if (isset($_SESSION['edit'])) {
        echo $_SESSION['edit'];
        unset($_SESSION['edit']);
      }
    ?>


    <table style="width: 100%;">
      <tr>
        <th>순서</th>
        <th>작성자</th>
        <th>제목</th>
        <th>작성 날짜</th>
        <th>수정 날짜</th>
      </tr>
      <tr>
        <?php
        $sql = "SELECT * FROM bulletin";
        $result = $conn->query($sql);
        while($row = mysqli_fetch_array($result)) {
        ?>
        <td><?= $row['id']; ?></td>
        <td><?= $row['user_name']; ?></td>
        <td><a href="view.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a></td>
        <td><?= $row['created_at']; ?></td>
        <td><?= $row['updated_at']; ?></td>
      </tr>
      <?php } ?>
    </table>

    <form action="write.php">
      <input type="submit" value="글 작성">
    </form>
  </body>
</html>
