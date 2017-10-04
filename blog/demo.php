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

		$pass = md5(123456);
		$time = time();
		for ($i=1; $i <=50 ; $i++) { 
			$sql = "insert into user (nikename,email,pass,addtime) values ('Kobe$i','asd@qq.com','$pass',$time)";
			//发送执行sql语句
			$result = mysqli_query($link,$sql);



		// //6.判断是否插入成功

			if ($result) {
				//7.获取最后插入ID
				$lsatid = mysqli_insert_id($link);
			}

		}


		//8.输出
		echo $lsatid;

?>