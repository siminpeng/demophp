<?php 	
	/**
	 * php学习的相关笔记和代码 ...
	 * 第一章基本语法
	 */
	//格式化输出
	$total=22.456;
	echo "Total includeing:$".number_format($total,2)."</br>";
	
	/*测试和设置变量类型*/
	echo gettype($total)."</br>";
	settype($total, 'integer');//设置类型
	echo gettype($total)."</br>";
	echo $total;
	
	//	检查是否是某种类型..
	echo '执行到这里了';
	echo is_integer($total);
	if(!(is_array($total))) 
	{
		echo '$total类型不是数组';
	}
	
	/*
	 * 测试变量状态
	 * 变量存在：isset();
	 * 变量销毁：unset();
	 * 检查变量是否存在：empty()
	 */
	$tireqty;
	echo 'isset($tireqty):'.isset($tireqty)."</br>";//没有设置返回空白
	echo 'empty($tireqty):'.empty($tireqty)."</br>";//没有设置返回1
	
	/*
	 *  变量的重解释：转换变量数据类型
	 *  int intval(mix var);
	 *  float floatval(mix var);
	 *  string strval(mix var);
	 */
?>

<?php 
	/**
	 * 第二章 数据的存储和检索
	 */
	//打开文件
	$fp=fopen("order.txt",'ab');
	if(!$fp)
	{
		echo"文件打开失败，请重试...";
		exit;
	}
	else
	{
		echo "打开文件成功";
	}	

	//写文件
	
//	$str1=$str.":".$total."\n";
	$str=null;
	$txt=array('apple'=>'苹果','orang'=>'橙子');
	foreach ($txt as $key => $value) 
	{
		$str=$str.$key."\t".$value."\n";
	}
	fwrite($fp, $str);//写文件
	echo "文件写入完成</br>";
	fclose($fp);
	
	$rp=fopen("order.txt",'rb');
	//读文件
	while(!feof($rp))
	{
		$order=fgets($rp,999);//读文件
		echo nl2br($order);
	}
	echo "文件读入完成";
	
	//关闭文件
	fclose($rp);	
?>
<?php 
	/**
	 * 数组的相关操作
	 */

	/*数字索引数组*/
	/************************************************/
	
	/*方式一：创建数组*/
	$product=array("tril","oil","spak");
	$num=range(1,10);//范围
	$letter=range('a','z');
	
	/*方式二：创建数组*/
	$fruit[0]="apple";
	$fruit[1]="preal";
	$fruit[2]="orange";
	
	/*访问数组的内容*/
	echo $product[0];
	$product[0]="erig er";
		
	$product[3]="vhughu";//添加新的元素
	
	/*遍历的方式访问数组**/
	for($i=0;$i<3;$i++)
	{
		echo $product[$i]."</br>";
	}
	/*foreach的方式访问数组*/
	foreach ($product as $current) 
	{
		echo $current."</br>";
	}
	
	/*不同索引数组*/
	/************************************************/

	/*方法一：初始化关联数组*/
	$prices=array('apple'=>123,'orange'=>40,'pear'=>456);
	
	/*访问关联数组*/
	echo $prices['apple'];
//	echo '访问关联数组：'.$prices['apple'].'</br>';
	
	/*方法二:创建关联数组*/
	$person_age=array('mather'=>40);
	$person_age['father']=42;
	
	/*方法三：创建关联数组*/
	$book['math']='高数';
	$book['english']='英语';
	
	/*使用循环语句访问关联数组*/
	/*
	 * 不能使用for语句
	 * 使用foreach();
	 * 使用list();
	 * 使用each();
	 */
	foreach ($prices as $key => $value) 
	{
		echo $key.'---'.$value;
		echo '</br>';
	}
	
	while ($element=each($person_age)) 
	{
		echo $element['key'].'--'.$element['value'].'</br>';
	}
	
	reset($person_age);//再使用each()函数的时候已经记录当前元素
	while (list($person,$age)=each($person_age)) 
	{
		echo $person.'--'.$age.'</br>';
	}
?>

<?php 
	/**
	 * 数组排序
	 */
	echo'排序之前';
	print_r($product);
	echo "</br>";
	
	sort($product);
	rsort($product);
	print_r($product);
	
	/*关联数组不破坏对应关系排序*/
	echo'排序之前';
	print_r($prices);
	echo "</br>";
	
	asort($prices);//按照value排序
//	arsort($prices);
	print_r($prices);
	
	ksort($prices);//按照key排序
//	krsort($prices);
	print_r($prices);
	
	/*用户自定义排序*/
//	自定义排序函数:value值升序排序
	function  compare($x,$y)
	{
		if($x[1] == $y[1])
		{return 0;}
		elseif ($x[1]<$y[1])
		{return -1;}
		else return 0;
	}
	
	echo 'book:</br>';
	print_r($book);
	usort($book, 'compare');
	print_r($book);
	
	/*
	 * 对数组进行重新排序
	 * shuffle();随机排序
	 * array_reverse();反向排序
	 */
	shuffle($book);
	array_reverse($book);
	
//	使用range(10,2,-1);以相反的方式创建数组
?>
<?php 
	/**
	 * 应用：从文件载入数组
	 */
	$orders = file("order.txt");
	$number_of_oeders = count($orders);//统计数组中元素的个数
	if($number_of_oeders == 0)
	{
		echo "文件中没有存入信息";
	}
	else
	{
		for ($j = 0; $j < $number_of_oeders; $j++) 
		{
			//分割数组
			$line=explode("\t",$orders[$j] );
			echo '水果名：'.$line[0].'水果：'.$line[1].'</br>';
		}
	}
?>

<?php 
	/**
	 * 其他数组操作
	 */
	/*
	 * 数组浏览
	 * current();//返回数组第一个元素
	 * each();//指针前移一个元素，前移之前返回
	 * next();//前移之后返回
	 * reset();//移到开头
	 * end();//移到结束
	 * pos();
	 * prev();
	 */

	/*
	 * 对数组的每一个元素应用任何函数
	 *array_walk(); 
	 */
	/*
	 * 统计数组元素个数：count(),sizeof(),array_count_values();
	 */

	/*
	 * 将数组转换成标量变量：extarct();
	 */
	extract($prices);
	echo "$apple,$orange,$pear";
