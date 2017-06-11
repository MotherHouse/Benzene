<?php
function page($total_records,$page_size,$page_current,$url,$keyword){
	$total_pages = ceil($total_records/$page_size);
	$page_previous = ($page_current<=1)?1:$page_current-1;
	$page_next = ($page_current>=$total_pages)?$total_pages:$page_current+1;
	$page_start = ($page_current-5>0)?$page_current-5:0;
	$page_end = ($page_start+10<$total_pages)?$page_start+10:$total_pages;
	$page_start = $page_end-10;
	if($page_start<0) $page_start = 0;
	//�ж�$url���Ƿ���ڲ�ѯ�ַ���
	$parse_url = parse_url($url);
	if(empty($parse_url["query"])){
		$url = $url.'?';//�������ڣ���$url����ӣ�
	}else{
		$url = $url.'&'; //�����ڣ���$url�����&
	}
	if(empty($keyword)){
		$navigator = "<a href=".$url."page_current=$page_previous>��һҳ</a>  ";
		for($i=$page_start;$i<$page_end;$i++){
			$j = $i+1;
			$navigator = $navigator."<a href='".$url."page_current=$j'>$j</a>  ";
		}
		$navigator = $navigator."<a href=".$url."page_current=$page_next>��һҳ</a>";
		$navigator.= "<br/>��".$total_records."����¼����".$total_pages."ҳ����ǰ�ǵ�".$page_current."ҳ";
	}else{
		$keyword = $_GET["keyword"];
		$navigator = "<a href=".$url."keyword=$keyword&page_current=$page_previous>��һҳ</a>  ";
		for($i=$page_start;$i<$page_end;$i++){
			$j = $i+1;
			$navigator = $navigator."<a href='".$url."keyword=$keyword&page_current=$j'>$j</a>  ";
		}
		$navigator =$navigator."<a href=".$url."keyword=$keyword&page_current=$page_next>��һҳ</a>";
		$navigator.= "<br/>��".$total_records."����¼����".$total_pages."ҳ����ǰ�ǵ�".$page_current."ҳ";
	}
	echo $navigator;
}
?>
