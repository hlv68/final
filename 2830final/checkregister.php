<?php 
session_start() ;                   //初始session
if (isset ($_SESSION['user']))
{
header ("Location:index.php") ;    //重新定向到其他页面
exit ;
}                       //登录过的话立即结束
$user_name=strtolower($_POST['username']) ;    //获取参数
$password=$_POST['password'] ;
$passre=$_POST['password_cf'];

//var_dump($_POST);die();
if($user_name=="" || $password==""|| $passre=="")
{
	echo "<script language='javascript'>" ;
	echo "alert('username or password is null!');" ;
	echo "window.location.href='register.php';";
	echo "</script>";
	exit();
}
if($password!=$passre)
{
	echo "<script language='javascript'>" ;
	echo "alert('password and password confirmation are inconsistent!');" ;
	echo "window.location.href='register.php';";
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
if(!ereg('^[a-zA-z0-9_]{6,}$',$password))
{
	echo "<script language='javascript'>" ;
	echo "alert('password is error!');" ;
	echo "window.location.href='register.php';";
	echo "</script>";
	exit();
}

//连接数据库

require_once('mysql_connect.php');
$qry="select * from user where name='$user_name'";
$result=mysql_query($qry);
$num=mysql_num_rows($result);
if($num>=1)
{
	echo "<script language='javascript'>" ;
	echo "alert('username already exists!');" ;
	echo "window.location.href='register.php';";
	echo "</script>";
}
else
{
	$qry="insert into user (name,password,registration_date,permission) values ('$user_name',SHA('$password'),NOW(),'a');";
	$result=mysql_query($qry);
	if($result)
	{
		echo "<script language='javascript'>" ;
		echo "alert('register success!');" ;
		echo "window.location.href='login.php';";
		echo "</script>";
	}
}
mysql_close();
?>
