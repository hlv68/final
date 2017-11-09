<?php
session_start() ;                   //初始session
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;    //重新定向到其他页面
exit ;
}     


if(isset($_POST['comments'])){
	require_once('mysql_connect.php');
	$comments = $_POST['comments'];
	$nowtime = date("Y-m-d H:i:s",time());
	$username = $_SESSION['user'];
	
	$sql = "select * from user where name='{$username}'";
	
	$data=mysql_query($sql) or die(mysql_error());
	
	$row=mysql_fetch_array($data);
	
	
	$qry="insert into fans_comments(user_id,content,createtime) value({$row['ID']},'{$comments}','{$nowtime}')";
	$result=mysql_query($qry) or die(mysql_error());
	echo "comments success";
}
else{
    echo "param error";

}
?>			   
		            
         