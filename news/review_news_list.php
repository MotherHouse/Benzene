<?php
include_once("functions/database.php");
$news_id = $_GET["news_id"];
$sql = "select * from review where news_id=$news_id and state='�����' order by review_id desc";
get_connection();
$result_set = mysql_query($sql);
close_connection();
echo "�����ŵ��������£�<br/>";
while($row = mysql_fetch_array($result_set)){
	echo "�������ݣ�".$row["content"]."<br/>";
	echo "�������ڣ�".$row["publish_time"]."<br/>";
	echo "����IP��ַ��".$row["ip"]."<hr/>";
}
?>
