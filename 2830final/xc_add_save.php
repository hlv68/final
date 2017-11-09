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

$file = $_FILES['file0'];
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); 
$allow_type = array('jpg','jpeg','gif','png');

if($_FILES['error'] == 0){

	if(!in_array($type, $allow_type)){

	  
		echo "<script language='javascript'>" ;
		echo "alert('file is not photo!');" ;
		echo "window.location.href='xc_add.php';";
		echo "</script>";
		exit();	  
	}

	if(!is_uploaded_file($file['tmp_name'])){

		echo "<script language='javascript'>" ;
		echo "alert('photo upload error!');" ;
		echo "window.location.href='xc_add.php';";
		echo "</script>";
		exit();	  
	}
	
	
	

	$qry="insert into star_photo(star_id,star_photo) value(1,'{$file['name']}')";
	$result=mysql_query($qry) or die(mysql_error());		
	$insertid = mysql_insert_id();
	$upload_path = "./images/photo/"; 
	$photoname = "photo_".$insertid.".".$type; 

	if(move_uploaded_file($file['tmp_name'],$upload_path.$photoname)){


		$qry="update star_photo set star_photo='{$photoname}' where id={$insertid}";
		$result=mysql_query($qry) or die(mysql_error());	       

		echo "<script language='javascript'>" ;
		echo "alert('photo upload success!');" ;
		echo "window.location.href='xc.php';";
		echo "</script>";
		exit();	  
	}else{
		echo "<script language='javascript'>" ;
		echo "alert('photo upload error!');" ;
		echo "window.location.href='xc_add.php';";
		echo "</script>";
		exit();	  
	}	
}
else{

	echo "<script language='javascript'>" ;
	echo "alert('photo upload error!');" ;
	echo "window.location.href='xc_add.php';";
	echo "</script>";
	exit();	  

}

?>			   
		            
         