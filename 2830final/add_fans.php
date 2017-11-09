<?php
session_start() ;                   
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;   
exit ;
}     


if(isset($_POST['userid'])){
	require_once('mysql_connect.php');
	$userid = $_POST['userid'];
	$nowtime = date("Y-m-d H:i:s",time());


	$sql1 = "select count(*) as num from fans_info where star_id=1";
	$data=mysql_query($sql1) or die(mysql_error());
	
	$allnum=mysql_fetch_array($data);
	
	
	$sql = "select count(*) as num from fans_info where star_id=1 and fans_userid={$userid}";
	$data=mysql_query($sql) or die(mysql_error());
	
	$row=mysql_fetch_array($data);
	
	if($row['num'] > 0){
	    $result = array(
	        "status"=>2,
			"num"=>$allnum['num'],
     	);
	
	
	}
    else{
	
		$qry="insert into fans_info(fans_userid,star_id,createtime) value({$userid},1,'{$nowtime}')";
		$data=mysql_query($qry) or die(mysql_error());
		
		$result = array(
			"status"=>1,
			"num"=>$allnum['num'] + 1,
		
		);	
	
	
	
	}	
	
	
}
else{
	$result = array(
		"status"=>-1,
	);

}

echo json_encode($result);


?>			   
		            
         