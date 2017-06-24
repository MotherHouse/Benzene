<html>
	<head>
		<title>winmine新闻管理系统</title>
		  <link rel="stylesheet" href="css/bootstrap.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<center>
			<?php include("menu.php"); //导入导航栏 ?>

			<h3>发布新闻</h3>
			<form action="action.php?action=add" method="post">
				<table width="320" border="0">
					<tr>
						<td align="right">标题:</td>
						<td><input type="text" name="title"/></td>
					</tr>
					<tr>
						<td align="right">关键字:</td>
						<td><input type="text" name="keywords"/></td>
					</tr>
					<tr>
						<td align="right">作者:</td>
						<td><input type="text" name="author"/></td>
					</tr>
					<tr>
						<?php
						include("fckeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('content');
						$oFCKeditor->BasePath = 'fckeditor/';
						$oFCKeditor->Width = 550;
						$oFCKeditor->Height = 350;
						$oFCKeditor->Value = "";
						$oFCKeditor->ToolbarSet = "Default";
						$oFCKeditor->Config['EnterMode'] = 'br';
						$oFCKeditor->Create() ;
						?>

					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="添加"/>&nbsp;&nbsp;
							<input type="reset" value="重置"/>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>
