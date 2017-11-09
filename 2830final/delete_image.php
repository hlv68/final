<?php
session_start() ;                   
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;    
exit ;
}     
if(isset($_POST['photo_id'])){
	require_once('mysql_connect.php');
	$photo_id = $_POST['photo_id'];
	

	$sql = "select * from star_photo where id={$photo_id}";
	$data=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_array($data);
	unlink("images/photo/".$row['star_photo']);
	
	$sql = "delete from star_photo where id='{$photo_id}'";
	$data=mysql_query($sql) or die(mysql_error());
	echo "delete photo success";
}
else{
    echo "param error";

}
?>			   
		            
         