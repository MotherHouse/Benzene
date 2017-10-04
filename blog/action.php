<?php 
	require_once './loginclass/class.geetestlib.php';
	header("content-type:text/html;charset=utf-8");
	session_start();
	//处理所有的业务逻辑
	//在php中获取用户提交的参数方式有两种；
	//$_GET 这全局数组获取的是用户通过地址栏传递过来的值
	//$_POST 这个全局数组获取的是用户通过form表单传递过来的值，并且form中的method属性的值
	//必须为post，如果是get的话那么就只能通过$_GET方式获取

	// var_dump($_GET);
	// echo "<hr>";
	// echo $_GET['h'];
	// echo 'post<br>';
	// var_dump($_POST);
	// echo "<hr>";
	// echo $_POST['email'];
	// echo '我是get 过来的：';
	// var_dump($_GET);

	switch ($_GET['a']) {
		//用户注册
		case 'register':
			//1.获取用户输入的数据
			$nikename = $_POST['nikename'];	//获取到用户名称
			$email = $_POST['email'];		//获取到用户邮箱地址
			$password = $_POST['password']; //获取到用户密码
			$repassword = $_POST['repassword']; //获取到用户的重复密码
			$addtime = time();//获取当前时间

			//2.验证数据是否正确
				//2.1验证用户两次密码是否一致
				if ($password != $repassword) {
					//输入异常提示信息
					echo "<script>";
					echo 'alert("两次密码不一致，请重新输入")';
					echo "</script>";
					//跳转
					echo "<script>";
					echo "window.history.back()";
					echo "</script>";
					exit();
				}
				//2.2验证用户的邮箱地址是否重复，已经存在。
					//2.2.1连接数据库
					$link = mysqli_connect('localhost','root','') or die('数据库连接失败');
					//2.2.2选择数据库
					mysqli_select_db($link,'myblog') or die('数据库选择失败');
					//2.2.3设置字符集
					mysqli_set_charset($link,'utf8');
					//2.2.4准备sql语句
					$sql = "select * from user where email = '$email'";
					//2.2.5发送并且执行sql语句,返回的是一个结果集
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						$list[] = $row;
					}
					//2.2.6判断结果集
					if ($result->num_rows != 0) {
						echo "<script>";
						echo 'alert("用户名邮箱已经存在，请重新输入")';
						echo "</script>";
						//跳转
						echo "<script>";
						echo "window.history.back()";
						echo "</script>";
						exit();
					}

				//将用户密码进行加密
					$password = md5($password);

			//3.将数据放入数据库保存
				//3.1准备插入数据库的sql语句
				$sql = "insert into user (nikename,email,pass,addtime) values ('$nikename','$email','$password',$addtime)";
				//3.2发送并执行sql语句   插入：返回的是最后插入ID
				$result = mysqli_query($link,$sql);

			//4.判断是否存入成功
			if (mysqli_insert_id($link)) {
				//输出成功提示信息
				echo "<script>";
				echo 'alert("注册成功")';
				echo "</script>";
				//跳转
				echo "<script>";
				echo 'window.location.href = "./login.php"';
				echo "</script>";
				exit();
			}else{
				//输出错误提示信息
				echo "<script>";
				echo 'alert("注册失败")';
				echo "</script>";
				//跳转
				echo "<script>";
				echo "window.history.back()";
				echo "</script>";
				exit();
			}

			//5.跳转

			break;
		case 'login':
			//1.获取用户输入的数据
			$email = $_POST['email'];
			$pass = md5($_POST['password']);

			//1.1进行验证码真实性验证
			session_start();
			$GtSdk = new GeetestLib('c47af48dd5225b53f6148bd5dde1e398', '88798ad2e9280c81c2cd1fade04ab940');
			$data = array(
					"user_id" => "test", # 网站用户id
					"client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
					"ip_address" => $_SERVER['REMOTE_ADDR'] # 请在此处传输用户请求验证时所携带的IP
				);


			if ($_SESSION['gtserver'] == 1) {   //服务器正常
				if (!empty($_POST['geetest_challenge']) && !empty($_POST['geetest_validate']) && !empty($_POST['geetest_seccode'])) {
					$result = $GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $data);

			    	if (!$result) {
				        //输出错误提示信息
						echo "<script>";
						echo 'alert("验证码错误!")';
						echo "</script>";
						//跳转
						echo "<script>";
						echo "window.history.back()";
						echo "</script>";
						exit();
				    } 

				} else {
			   			//输出异常提示信息
						echo '<script>';
						echo 'alert("验证码错误!")';
						echo '</script>';
						//跳转
						echo '<script>';
						echo 'window.history.back()';
						echo '</script>';
						exit();
					    } 

			}else{  //服务器宕机,走failback模式
			    if (!empty($_POST['geetest_challenge']) && !empty($_POST['geetest_validate']) && !empty($_POST['geetest_seccode'])) {
					$result = $GtSdk->fail_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $data);

			    	if (!$result) {
				        //输出错误提示信息
						echo "<script>";
						echo 'alert("验证码错误!")';
						echo "</script>";
						//跳转
						echo "<script>";
						echo "window.history.back()";
						echo "</script>";
						exit();
				    }
			  	} else {
		   			//输出异常提示信息
					echo '<script>';
					echo 'alert("验证码错误!")';
					echo '</script>';
					//跳转
					echo '<script>';
					echo 'window.history.back()';
					echo '</script>';
					exit();
					} 
			}
			//2.验证是否真实
				//2.1 连接数据库
				$link = mysqli_connect('localhost','root','') or die('数据库连接失败');
				//2.2 选择数据库
				mysqli_select_db($link,'myblog') or die('选择数据库失败');
				//2.3 设置字符集
				mysqli_set_charset($link,'utf8');
				//2.4 准备sql语句
				$sql = "select id,nikename,email,pass from user where email = '$email' and pass = '$pass'";
				//2.5 发送并且执行sql语句
				$result = mysqli_query($link, $sql);
				//2.6 获取查询得到的数据
				while($row = mysqli_fetch_assoc($result)) {
					$list[] = $row;
				}
			//3.判断
				if ($result->num_rows) {
					//如果可以进入这里代表用户输入的用户名和密码都正确
					//3.1存储用户信息 - session
					$_SESSION['userInfo'] = $list[0];
					//3.2页面跳转
					//输出成功提示信息
					echo '<script>';
					echo 'alert("登录成功")';
					echo '</script>';
					//跳转
					echo '<script>';
					echo 'window.location.href = "./index.php"';
					echo '</script>';
					exit();
				} else {
					//如果进入这里代表输入错误
					//输出异常提示信息
					echo '<script>';
					echo 'alert("邮箱或密码不正确!")';
					echo '</script>';
					//跳转
					echo '<script>';
					echo 'window.history.back()';
					echo '</script>';
					exit();

				}
			break;

		case 'code':
			session_start();
			$GtSdk = new GeetestLib('c47af48dd5225b53f6148bd5dde1e398', '88798ad2e9280c81c2cd1fade04ab940');
			$data = array(
					"user_id" => "test", # 网站用户id
					"client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
					"ip_address" => $_SERVER['REMOTE_ADDR'] # 请在此处传输用户请求验证时所携带的IP
				);

			$status = $GtSdk->pre_process($data, 1);
			$_SESSION['gtserver'] = $status;
			$_SESSION['user_id'] = $data['user_id'];
			echo $GtSdk->get_response_str();
			break;

		//用户退出
		case 'logout':
			//1.清除用户登录信息
			$_SESSION['userInfo'] = null;
			//2.跳转
			//输出成功提示信息
			echo '<script>';
			echo 'alert("退出成功")';
			echo '</script>';
			//跳转
			echo '<script>';
			echo 'window.location.href = "./index.php"';
			echo '</script>';
			exit;
			break;
		case 'create':
			//1.接收用户输入的数据
			$userid = $_SESSION['userInfo']['id']; //获取当前登录的用户ID
			$title = $_POST['title']; //获取文章标题
			$content = $_POST['content']; //获取文章内容
			$addtime = time();	//获取当前的时间
			//2.验证数据
			//判断用户是否登录
			//empty()判断某一个变量是否为空，如果为空则返回true，否则返回false 假
			if (empty($userid)) {
				echo "<script>";
				echo 'alert("请登录后再进行发表")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//
			if (empty($title)) {
				echo "<script>";
				echo 'alert("文章标题不能为空")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//
			if (strlen($content) < 50) {
				echo "<script>";
				echo 'alert("文章内容不能少于50个字符")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//3.插入数据库
				//3.1连接数据库
				$link = mysqli_connect('localhost','root','') or die('连接数据库失败');


				//3.2选择数据库
				mysqli_select_db($link,'myblog') or die('选择数据库失败');

				//3.3设置字符集
				mysqli_set_charset($link,'utf8');

				//3.4准备sql语句
				$sql = "insert into posts (userid,title,content,addtime) values ($userid,'$title','$content',$addtime)";

				//3.5发送并且执行sql语句
				$result = mysqli_query($link,$sql);

				//3.6获取最后插入ID
				$lastid = mysqli_insert_id($link);

			//4.判断
			if ($lastid) {
					echo "<script>";
					echo 'alert("文章发表成功")';
					echo "</script>";
					//跳转
					echo '<script>';
					echo 'window.location.href = "./index.php"';
					echo '</script>';
					exit;
			} else{
					echo "<script>";
					echo 'alert("文章发表失败")';
					echo "</script>";
					//跳转
					echo '<script>';
					echo 'window.history.back()';
					echo '</script>';
					exit;
			}

			break;

		case 'edit':
			//1.接收数据
				//1.1接收标题
				$title = $_POST['title'];
				//1.2接收内容
				$content = $_POST['content'];
				//1.3获取时间
				$time = time();
				//1.4获取当前登录的用户ID
				$userid = $_SESSION['userInfo']['id']; 
				//1.5接收文章所属ID
				$id = $_POST['id'];

			//2.验证数据
			//判断用户是否登录
			//empty()判断某一个变量是否为空，如果为空则返回true，否则返回false 假
			if (empty($userid)) {
				echo "<script>";
				echo 'alert("非法操作!")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//
			if (empty($title)) {
				echo "<script>";
				echo 'alert("文章标题不能为空")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//
			if (strlen($content) < 50) {
				echo "<script>";
				echo 'alert("文章内容不能少于50个字符")';
				echo "</script>";
				//跳转
				echo '<script>';
				echo 'window.location.href = "./index.php"';
				echo '</script>';
				exit;
			}

			//3.修改数据库中的字段
				//3.1连接数据库
				$link = mysqli_connect('localhost','root','') or die('连接数据库失败');


				//3.2选择数据库
				mysqli_select_db($link,'myblog') or die('选择数据库失败');

				//3.3设置字符集
				mysqli_set_charset($link,'utf8');

				//3.4准备sql语句
				$sql = "update posts set title = '$title', content = '$content',addtime = $time where id = $id";

				//3.5发送并且执行sql语句
				$result = mysqli_query($link,$sql);

				//3.6获取插入受影响数据
				$rows = mysqli_affected_rows($link);


			//4.判断
				if ($rows) {
					echo "<script>";
					echo 'alert("文章修改成功")';
					echo "</script>";
					//跳转
					echo '<script>';
					echo 'window.location.href = "./index.php"';
					echo '</script>';
					exit;
				} else{
					echo "<script>";
					echo 'alert("文章修改失败")';
					echo "</script>";
					//跳转
					echo '<script>';
					echo 'window.history.back()';
					echo '</script>';
					exit;
				}
			break;


		case 'del':
			//1.获取文章用户ID
			$id = $_GET['id'];

			//2.验证数据
				//2.1验证ID是否有数据，并且是否为数字格式
				if (empty($id) || !is_numeric($id)) {
			          echo '<script>';
			          echo 'alert("非法操作")';
			          echo '</script>';
			          //跳转
			          echo '<script>';
			          echo 'window.history.back()';
			          echo '</script>';
			          exit();
  				}

  				//2.2验证所删除的文章是否是当前登录用户的
  					//3.1连接数据库
					$link = mysqli_connect('localhost','root','') or die('连接数据库失败');


					//3.2选择数据库
					mysqli_select_db($link,'myblog') or die('选择数据库失败');

					//3.3设置字符集
					mysqli_set_charset($link,'utf8');

					//3.4准备sql语句
					$sql = "select userid from posts where id = $id";

					//执行sql语句
					$result = mysqli_query($link,$sql);

					//处理结果集
					while ($row = mysqli_fetch_assoc($result)) {
						$list = $row;
					}

					if ($list['userid'] != $_SESSION['userInfo']['id']) {
						echo '<script>';
				        echo 'alert("非法操作")';
				        echo '</script>';
				        //跳转
				        echo '<script>';
				        echo 'window.history.back()';
				        echo '</script>';
				        exit();
					}

			//3.数据库删除操作
					//3.1准备sql语句
					$sql = "delete from posts where id = $id";
					//3.2执行sql语句
					$bool = mysqli_query($link,$sql);
					//3.3获取受影响行
					$rows = mysqli_affected_rows($link);
			//4.判断 判断sql语句是否执行成功并且已经删除成功得到受影响行
					if ($bool && $rows) {
						echo "<script>";
						echo 'alert("文章删除成功")';
						echo "</script>";
						//跳转
						echo '<script>';
						echo 'window.location.href = "./index.php"';
						echo '</script>';
						exit;
					} else{
						echo "<script>";
						echo 'alert("文章删除失败")';
						echo "</script>";
						//跳转
						echo '<script>';
						echo 'window.history.back()';
						echo '</script>';
						exit;
					}
			break;

		default:
			echo "参数有误";
			break;
	}
?>