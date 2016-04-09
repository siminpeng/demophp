<!--在php中使用会话控制-->
<?php
/*
 * 实现简单会话
 * 1.开始一个会话
 *	(1)session_start();
 *	(2)配置php.ini：session.auto_strat();
 * 2.注册会话变量
 * 	(1)$_SESSION['myvar']=5;
 * 3.使用会话变量
 * 	(1)$_SESSION['myvar']
 * 	(2)检查：if(isset($_SESSION['myvar'])){}
 * 4.注销变量并销毁会话
 * 	(1)unset($_SESSION['myvar']);
 * 	(2)$_SESSION=array();
 * 		注销所有变量后
 * 		session_destory(); 		
 */
/*创建会话的简单例子*/

session_start();

$_SESSION['sess_var']='hello world!';

echo '$_SESSION[\'sess_var\'] 的内容是：'.$_SESSION['sess_var'].'</br>';

?>
<a href="session_page2.php">下一页</a>