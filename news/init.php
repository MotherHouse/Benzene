<?php
include_once("functions/database.php");
get_connection();
//����������
mysql_query("insert into category values(null,'����')");
mysql_query("insert into category values(null,'�ƾ�')");
//��ӹ���Ա�û�admin������admin����MD5����˫�ؼ���
$password = md5(md5("admin"));
mysql_query("insert into users values(null,'admin','$password')");
close_connection();
echo "�ɹ���ӳ�ʼ������";
?>
