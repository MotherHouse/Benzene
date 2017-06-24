<html>
<head>
    <title>winmine的新闻管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
			function dodel(id){
				if(confirm("确定要删除吗？")){
					window.location="action.php?action=del&id="+id;
				}
			}

		</script>
	</head>
	<body>
		<center>
			<?php include("menu.php"); //导入导航栏 ?>

			<h3>搜索新闻</h3>
			<!-----搜索表单--------->
				<form action="list1.php" method="get">
					标题：<input type="text" name="title" size="8" value="<?php echo !empty($_GET['title'])?$_GET['title']:''; ?>" />&nbsp;
					关键字：<input type="text" name="keywords" size="8" value="<?php echo !empty($_GET['keywords'])?$_GET['keywords']:''; ?>" />&nbsp;
					作者：<input type="text" name="author"  size="8"  value="<?php echo !empty($_GET['author'])?$_GET['author']:''; ?>"/>&nbsp;
					<input type="submit" value="搜索"/>
					<input type="button" value="全部信息" onclick="window.location='list1.php'"/>
				</form>
			<!-------------->
			<table width="880" border="1">
				<tr>
					<th>新闻id</th><th>新闻标题</th><th>关键字</th>
					<th>作者</th><th>发布时间</th><th>新闻内容</th>
					<th>操作</th>
				</tr>
				<?php
					//=============================
					//封装搜索信息
					$wherelist = array();//定义一个封装搜索条件的数组变量

					//判断新闻标题是否有值，若有则封装此搜索条件
					if(!empty($_GET["title"])){
						$wherelist[]="title like '%{$_GET['title']}%'";
					}
					//判断关键字是否有值，若有则封装此搜索条件
					if(!empty($_GET["keywords"])){
						$wherelist[]="keywords like '%{$_GET['keywords']}%'";
					}
					//判断作者是否有值，若有则封装此搜索条件
					if(!empty($_GET["author"])){
						$wherelist[]="author like '%{$_GET['author']}%'";
					}
					//组装搜索条件
					if(count($wherelist)>0){
						$where = " where ".implode(" and ",$wherelist);
					}
					//echo $where;
					//=============================

					//1.导入配置文件
						require("dbconfig.php");

					//2.连接MySQL，选择数据库
						$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
						mysql_select_db(DBNAME,$link);

					//3. 执行查询，并返回结果集
						@$sql = "select * from news {$where} order by addtime desc";
						$result = mysql_query($sql,$link);

					//4. 解析结果集,并遍历输出
						while($row = mysql_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>{$row['id']}</td>";
							echo "<td>{$row['title']}</td>";
							echo "<td>{$row['keywords']}</td>";
							echo "<td>{$row['author']}</td>";
							echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
							echo "<td>{$row['content']}</td>";
							echo "<td>
								<a href='javascript:dodel({$row['id']})'>删除</a>
								<a href='edit.php?id={$row['id']}'>修改</a></td>";
							echo "</tr>";
						}
					//5. 释放结果集
						mysql_free_result($result);
						mysql_close($link);
				?>
			</table>
		</center>
	</body>
</html>
