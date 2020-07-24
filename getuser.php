<?php
header("Content-type=text/json;charset=UTF-8");

$conn = mysql_connect("127.0.0.1", "root", "123456") or die("连接数据库的过程失败！");
mysql_query("set names utf-8");
mysql_select_db("test_db");


$resultset = mysql_query("select test_id, test_grade, test_time from test", $conn);
////////////////////////////////////////////////准备数据进行装填
$data = array();
////////////////////////////////////////////////实体类
class User{
    public $test_id;
    public $test_grade;
    public $test_time;
}
////////////////////////////////////////////////处理
while($row = mysql_fetch_array($resultset, MYSQL_ASSOC)) {
    $user = new User();
    $user->test_id = $row['test_id'];
    $user->test_grade = $row['test_grade'];
    $user->test_time = $row['test_time'];
    $data[] = $user;
}
//$conn.close();
// 返回JSON类型的数据
echo json_encode($data);
?>