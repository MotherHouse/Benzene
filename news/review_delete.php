<?php
include_once("functions/is_login.php");
session_start();
if(!is_login()){
	echo "������¼ϵͳ���ٷ��ʸ�ҳ�棡";
	return;
}
include_once("functions/database.php");
$review_id = $_GET["review_id"];
$sql = "delete from review where review_id=$review_id";
get_connection();
$result_set = mysql_query($sql);
close_connection();
header("Location:index.php?url=review_list.php");
?>
