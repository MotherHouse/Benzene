<?php
include_once("functions/is_login.php");
if (!session_id()){//����ʹ��session_id()�ж��Ƿ��Ѿ�������Session
	session_start();
}
if(!is_login()){
	echo "������¼ϵͳ���ٷ��ʸ�ҳ�棡";
	return;
}
include_once("functions/database.php");
$news_id = $_GET["news_id"];
get_connection();
mysql_query("delete from review where news_id=$news_id");
mysql_query("delete from news where news_id=$news_id");
close_connection();
$message = "���ż����������Ϣɾ���ɹ���";
header("Location:index.php?url=news_list.php&message=$message");
?>
