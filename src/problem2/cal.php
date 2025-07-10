<?php
$vals = array($_POST["val1"], $_POST["val2"], $_POST["val3"], $_POST["val4"], $_POST["val5"]);
$sum = 0;

echo "입력 값: ";
foreach ($vals as $i) {
    $sum += $i;
    echo "$i ";
};

echo "평균 : " . $sum / sizeof($vals);

?>