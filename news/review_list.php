<?php
include_once("functions/is_login.php");
if (!session_id()){//����ʹ��session_id()�ж��Ƿ��Ѿ�������Session
	session_start();
}
if(!is_login()){
	echo "������¼ϵͳ���ٷ��ʸ�ҳ�棡";
	return;
}
?>
<?php
include_once("functions/database.php");
include_once("functions/page.php");
$sql = "select * from review";
get_connection();
//��ҳ��ʵ��
$result_news = mysql_query($sql);
$total_records = mysql_num_rows($result_news);
$page_size = 3;
if(isset($_GET["page_current"])){
	$page_current = $_GET["page_current"];
}else{
	$page_current = 1;
}
$start = ($page_current-1)*$page_size;
$result_sql = "select * from review order by review_id desc limit $start,$page_size";
$result_set = mysql_query($result_sql);
close_connection();
echo "���ŷ���ϵͳ������������Ϣ���£�<br/>";
while($row = mysql_fetch_array($result_set)){
	echo "�������ݣ�".$row["content"]."<br/>";
	echo "���ڣ�".$row["publish_time"]."&nbsp;&nbsp;";
	echo "IP��ַ��".$row["ip"]."&nbsp;&nbsp;";
	echo "״̬��".$row["state"]."<br/>";
	echo "<a href='review_delete.php?review_id=".$row["review_id"]."'>ɾ��</a>";
	echo "&nbsp;&nbsp;&nbsp;";
	if($row["state"]=="δ���"){
		echo "<a href='review_verify.php?review_id=".$row["review_id"]."'>���</a>";
	}
	echo "<hr/>";
}
//��ҳ��ʵ��
$url = "index.php?url=review_list.php";
page($total_records,$page_size,$page_current,$url,"");
?>
