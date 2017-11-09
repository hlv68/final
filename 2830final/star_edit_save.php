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

if(isset($_POST['Realname']) && isset($_POST['Nationality']) 
    && isset($_POST['Occupation']) && isset($_POST['Born']) 
	&& isset($_POST['breif']) && isset($_POST['detail'])){
    $Realname = $_POST['Realname'];
	$Nationality = $_POST['Nationality'];

    $Occupation = $_POST['Occupation'];
	$Born = $_POST['Born'];

    $breif = $_POST['breif'];
	$detail = $_POST['detail'];	
	
	
	$qry="select * from star_info";
	$result=mysql_query($qry) or die(mysql_error());	
	$star_info = mysql_fetch_array($result);
	
	
	
	$nowtime = date("Y-m-d H:i:s",time());
	$file = $_FILES['file0'];
	$name = $file['name'];
	$type = strtolower(substr($name,strrpos($name,'.')+1)); 
	$allow_type = array('jpg','jpeg','gif','png');

	if($file['error'] == 0){

		if(!in_array($type, $allow_type)){

		  
			echo "<script language='javascript'>" ;
			echo "alert('file is not photo!');" ;
			echo "window.location.href='star_edit.php';";
			echo "</script>";
			exit();	  
		}

		if(!is_uploaded_file($file['tmp_name'])){

			echo "<script language='javascript'>" ;
			echo "alert('photo upload error!');" ;
			echo "window.location.href='star_edit.php';";
			echo "</script>";
			exit();	  
		}
		
		
		   
		$upload_path = "./images/"; 
		$photoname = "star_logo.".$type; 

		if(!move_uploaded_file($file['tmp_name'],$upload_path.$photoname)){

			echo "<script language='javascript'>" ;
			echo "alert('add post error!');" ;
			echo "window.location.href='star_edit.php';";
			echo "</script>";
			exit();	  
		}	
	}
	else if($file['error'] == 4){
	    
	    $photoname = $star_info['star_logo']; 
	
	}
	else{

		echo "<script language='javascript'>" ;
		echo "alert('add post error!');" ;
		echo "window.location.href='star_edit.php';";
		echo "</script>";
		exit();	  

	}
	$qry="update star_info set star_name='{$Realname}',star_occupation='{$Occupation}',star_brief='{$breif}',star_logo='{$photoname}',star_detail='{$detail}',star_born='{$Born}',star_nationality='{$Nationality}'";
	$result=mysql_query($qry) or die(mysql_error());		
	$insertid = mysql_insert_id();	
	echo "<script language='javascript'>" ;
	echo "alert('edit star success!');" ;
	echo "window.location.href='star_edit.php';";
	echo "</script>";
	exit();	  	
}
else{
	echo "<script language='javascript'>" ;
	echo "alert('param error!');" ;
	echo "window.location.href='star_edit.php';";
	echo "</script>";
	exit();	 


}	

?>			   
		            
         