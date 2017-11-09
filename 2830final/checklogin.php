<?php
session_start() ;                   //初始session
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ;
if (isset ($_SESSION['user']))
{
	header ("Location:index.php") ;    //重新定向到其他页面
	exit ;
}                       //登录过的话立即结束
$user_name=strtolower($_POST['username']) ;    //获取参数
$password=$_POST['password'] ;
if($user_name=="" || $password=="")
{
	echo "<script language='javascript'>" ;
	echo "alert('username or password is null!');" ;
	echo "window.location.href='login.php';";
	echo "</script>";
	exit();
}
if(!eregi('^[a-z0-9_]{2,20}$',$user_name))
{
	echo "<script language='javascript'>" ;
	echo "alert('username is error!');" ;
	echo "window.location.href='register.php';";
	echo "</script>";
	exit();
}
if(!ereg('^[a-zA-z0-9_]{2,}$',$password))
{
	echo "<script language='javascript'>" ;
	echo "alert('password is error!');" ;
	echo "window.location.href='register.php';";
	echo "</script>";
	exit();
}
//check username
require_once('mysql_connect.php');
$qry="select * from user where name='$user_name' and password=SHA('$password')";

$result=mysql_query($qry) or die(mysql_error());

$row=mysql_fetch_array($result,MYSQL_ASSOC);
//echo $num;
if($row)
{
	$_SESSION["user"]=$user_name ;        //注册新的变量,保存当前会话的昵称
	$user = $user_name ;

	if($row['permission']=='b')
	{
		$_SESSION['pms']=1;
	}
	else
	{
		$_SESSION['pms']=0;
	}
	mysql_close();

	echo "<script language='javascript'>window.location.href='login.php';</script>" ;
}
else
{
	mysql_close();
	echo "<script language='javascript'>" ;
	echo "alert('username or password is wrong!');" ;
	echo "window.location.href='login.php';";
	echo "</script>";
}
?>
