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


		//准备数据
		$pass = md5(123456);
		$time = time();
		//4.准备sql语句 (因为要从数据库中获取数据)
		//单双引号的使用；只能互插，不能自插
		$sql = "insert into user (nikename,email,pass,addtime) values ('Liverpool','asd@qq.com','$pass',$time)";

		//exit结束后续代码的执行
			// echo $sql;exit;

		//5.发送并且执行sql语句  mysqli_query('得到的资源'，准备好的sql语句)；
		//如果是插入操作那么返回的就是最后插入ID，如果是更新和删除返回的就是受影响行数
		$lastid = mysqli_query($link,$sql);


		//输出查看最后插入ID
		if ($lastid) {
			//	true 1,false 0
			//mysqli_insert_id(得到的资源)，返回的是最后插入ID
			echo mysqli_insert_id($link);
		}

?>