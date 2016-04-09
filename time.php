<!--php对时间的操作-->
<?php
/*时间的基本输出  :date() */
echo '输出格式为：年月日:'.date('Y n j').'</br>';
echo '输出格式为：年月日:'.date('y m d').'</br>';

//这段内容没有看懂
/*将日期和时间变成时间戳: mktime();*/
/*参数为空，默认为当前时间*/
$timetamp=time();
//$timetamp=mktime();执行错误，建议使用上面的方法
$timetamp=date("U");

//今天日期的中午时间
$time=mktime(12,0,0);

/*getdate()，返回相关数组*/
$today=getdate();
print_r($today);

/* 检验日期的有效性(是否存在):checkdate(); */
echo checkdate(2, 29, 2008);

/*格式化时间戳 :strftime()*/
echo strftime('%A</br>');
echo strftime('%x</br>');
echo strftime('%c</br>');
echo strftime('%Y</br>');

/*
 * php日期mysql日期转换：
 * 1.php使用date(),注意带有0前导格式的日期和月份，使用两位或四位年份
 * 2.mysql：data_format(),unix_timestamp()
 */
//在mysql端的使用：
//select date_format(date_colum,'%m %d %Y')from tablename;
//select unix_timestamp(date_colum)from tablename;//可以将一列转换为时间戳

/*在php中计算日期*/

$day=18;
$month=9;
$year=1972;

$bdayunix=mktime(0,0,0,$month,$day,$year);
$nowunix=time();
$ageunix=$nowunix-$bdayunix;
$age=floor($ageunix/(365*24*60*60));
echo "age is $age</br>"
?>