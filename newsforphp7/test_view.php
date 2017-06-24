<?php
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'Zheng1@06leavenotrace';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
// mysqli_query($conn , "set names utf8");

$sql = 'select * from news';

mysqli_select_db( $conn, 'demodb' );
$retval = mysqli_query( $conn, $sql );
if(!$retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h2>菜鸟教程 mysqli_fetch_array 测试<h2>';
echo '<table border="1"><tr><td>教程 ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>';
while($row = mysqli_fetch_row($retval))
{
  echo "<tr>";
  echo "<td>{$row['id']}</td>";
  echo "<td>{$row['title']}</td>";
  echo "<td>{$row['keywords']}</td>";
  echo "<td>{$row['author']}</td>";
  echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
  echo "<td>{$row['content']}</td>";
  echo "<td>
    <a href='javascript:dodel({$row['id']})'>删除</a>
    <a href='edit.php?id={$row['id']}'>修改</a></td>";
  echo "</tr>";
}
echo '</table>';
mysqli_close($conn);
?>
