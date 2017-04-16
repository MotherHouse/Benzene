<?php
function connectdb()
{
define('servername','139.199.164.15');
define('username','cakeadmin');
define('password','zheng1206');
define('dbname','game');

$conn = new mysqli(servername,username,password,dbname);
//创建连接

$conn->query("set character set 'utf8'");//读库
$conn->query("set names 'utf8'");//写库
/*   将数据库的编码设定成utf－8   */


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
return $conn;
}//将整个连接数据库变成一个方法

?>
