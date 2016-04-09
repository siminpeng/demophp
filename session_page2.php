<?php
session_start();

//访问
echo '$_SESSION[\'sess_var\'] 的内容是：'.$_SESSION['sess_var'].'</br>';

//注销
unset($_SESSION);
//echo '$_SESSION[\'sess_var\'] 的内容是：'.$_SESSION['sess_var'].'</br>';

//结束
session_destroy();
?>