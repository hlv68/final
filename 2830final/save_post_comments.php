<?php
session_start() ;                  
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;    
exit ;
}     


if(isset($_POST['comments']) && isset($_POST['postid'])){
	require_once('mysql_connect.php');
	$comments = $_POST['comments'];
	$postid = $_POST['postid'];
	$nowtime = date("Y-m-d H:i:s",time());
	$username = $_SESSION['user'];
	
	$sql = "select * from user where name='{$username}'";
	
	$data=mysql_query($sql) or die(mysql_error());
	
	$row=mysql_fetch_array($data);
	
	
	$qry="insert into star_posts_comments(post_id,content,createtime,userid) value({$postid},'{$comments}','{$nowtime}',{$row['ID']})";
	$result=mysql_query($qry) or die(mysql_error());
	echo "comments success";
}
else{
    echo "param error";

}
?>			   
		            
         