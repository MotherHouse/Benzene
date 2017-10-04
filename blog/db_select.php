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
		$sql = 'select * from user';

		//5.发送并且执行sql语句  mysqli_query('得到的资源'，准备好的sql语句)；会返回一个结果集
		$result = mysqli_query($link,$sql);


		echo '<pre>';
		print_r($result);
		echo '</pre>';

		//6.处理得到的结果集

		if ($result) {
			//处理  mysqli_fetch_assoc(得到的结果集) 返回的是一个二维数组
			while ($row = mysqli_fetch_assoc($result)) {
				//将每次取的数据放入自定义的数组中 就是一个二维数组
				$list[] = $row;
			}
		}

		echo '<pre>';
		print_r($list);
		echo '</pre>';
?>