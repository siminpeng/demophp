<?php
	
	echo '跳转成功';
	/*
	 * 获取提交变量
	 * 检查过滤用户输入的数据
	 * trim()//去掉空格
	 */
	$name=trim($_POST['user_name']);
	$paw = trim($_POST['user_paw']);
	$info=trim($_POST['user_info']);
//	echo $name."\t".$paw."\t".$info."\n";
	if(!$name||!$paw)
	{
		echo "你还有没输入的信息，请重新填写";
		exit;
	}
	
	/*
	 * 过滤控制字符
	 */
	if(!get_magic_quotes_gpc())
	{
		$name=addslashes($name);
		$paw=addslashes($paw);
		$info=addslashes($info);
	}
	echo "过滤控制字符</br>";
	
	/*连接数据库*/
	
	$db=mysqli_connect('localhost','root','','database');
	//$db=new mysqli('localhost','root','','database');
	
	if(mysqli_connect_errno())
	{
		echo "不能连接数据库";
		exit;
	}
	echo "连接数据库成功</br>";
	 		
	$db->query("set names 'utf8'");
	$query="select * from user_table";
	$result = $db->query($query);
//	print_r($result);
	
	$num_result = $result->num_rows;
	echo "找到了".$num_result."个人";
	
	
	
	for ($i = 0; $i < $num_result; $i++) 
	{
//		$rows=$result->fetch_assoc();//以相关数组返回该行
		$rows=mysqli_fetch_assoc($result);
		
//		echo htmlspecialchars(stripcslashes($rows['name']));

//		echo mb_detect_encoding($rows['name'],'ASII,UTF-8,GBK,GB2312');
		echo "name:".$rows['name']."</br>";
		echo "info:".$rows['info']."</br>";
		echo "pwd:".$rows['paw']."</br>";
	}
	
	exit;
	
	/*插入数据*/
	
	$query="insert into user_table ( name, paw, info )values ('daming','123','我是大大');";
	$result = $db->query($query);
	echo '插入完成';
	
	/*关闭数据库*/
	$db->close();

