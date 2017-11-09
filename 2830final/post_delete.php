<?php
session_start() ;                   
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;    
exit ;
} 

if($_SESSION['pms'] == 0){
    echo "Permission denied";
	exit;
}    


//var_dump($_FILES);die();

require_once('mysql_connect.php');

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
		

	$qry="select * from star_posts where id={$post_id}";
	$result=mysql_query($qry) or die(mysql_error());	

	$postInfo = mysql_fetch_array($result);
	$upload_path = "./images/Post/".$postInfo['image'];


    unlink($upload_path);
    $sql = "delete from star_posts where id={$post_id}";	
	$result=mysql_query($sql) or die(mysql_error());		
      

	echo "<script language='javascript'>" ;
	echo "alert('delete post success!');" ;
	echo "window.location.href='index.php';";
	echo "</script>";
	exit();	  
	
}
else{
	echo "<script language='javascript'>" ;
	echo "alert('param error!');" ;
	echo "window.location.href='index.php';";
	echo "</script>";
	exit();	 


}	

?>			   
		            
         