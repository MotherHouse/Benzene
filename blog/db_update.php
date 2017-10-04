<?php
	//PHP操作Mysql数据库
	//1.连接数据库  mysqli_connect(数据库地址，用户名，密码(可选))	连接成功会返回一个数据库资源文件
		$link = mysqli_connect('localhost','root','') or die('数据库连接失败');


		// echo "<pre>";
		// print_r($link);
		// echo "</pre>";




		//2.选择进入指定的数据库	mysqli_select_db(上一步得到的资源，要选择的数据库)
		mysqli_select_db($link,'myblog') or die('数据库选择失败');



		//3.设置字符集； mysqli_set_charset(第一步得到的资源，'utf-8')；
		mysqli_set_charset($link,'utf-8');


		//4.准备sql语句 (因为要从数据库中获取数据)
		//更新语句
		$sql = "update user set nikename = 'Tom' where id = 1";

		//5.发送并且执行sql语句  mysqli_query('得到的资源'，准备好的sql语句)；会返回一个结果集
		$result = mysqli_query($link,$sql);


		//6.判断是否插入成功

		if ($result) {
			$rows = mysqli_affected_rows($link);
		}


		echo $rows;
?>