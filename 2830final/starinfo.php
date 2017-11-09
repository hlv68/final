<script>
function add_fans(userid){
    $.ajax({
	    "url":"add_fans.php",
		"type":"POST",
		"dataType":"json",
		"data":{
		    "userid":userid,
		},
		"success":function(data){
		    console.log(data.status);
		    if(data.status == 1){
			    alert("add success");
				$("#fansnum").html(data.num);
			
			
			}  
            else if(data.status == 2){
			    alert("alreay add fans");
				$("#fansnum").html(data.num);
			
			}
            else{
			
			    alert("param error");
			}			
		
		}
	
	});

}

</script>

<style>
#star_eidt{
    margin: 10px;
    width:60px;
	height:20px;


}

</style>

<?php
session_start() ;                   
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;  
exit ;
}     

require_once('mysql_connect.php');
$username = $_SESSION['user'];
$sql = "select * from user where name='{$username}'";
$data = mysql_query($sql);
$userinfo=mysql_fetch_array($data);



$qry="select * from star_info";
$result=mysql_query($qry);
$starInfo=mysql_fetch_array($result);


$qry = "select count(*) as num from fans_info";

$result=mysql_query($qry);
$fanInfo=mysql_fetch_array($result);
?>
<div class="right" id="c_right">
<div class="s_about">
<h2>Personal information</h2>
<img src="images/<?php echo $starInfo['star_logo']?>" width="230" height="230" alt="博主"/>
<p><strong class="startinfolabel">Realname</strong><?php echo $starInfo['star_name']?></p>
<p><strong class="startinfolabel">Nationality</strong><?php echo $starInfo['star_nationality']?></p>
<p><strong class="startinfolabel">Occupation</strong><?php echo $starInfo['star_occupation']?></p>
<p><strong class="startinfolabel">Born</strong><?php echo $starInfo['star_born']?></p>
<p style="margin-top:7px;margin-bottom:7px"><?php echo $starInfo['star_brief']?></p>

<?php 
if($_SESSION['pms'] == 1){
    echo '<p><center><a href="star_edit.php"><input id="star_eidt" type="button" value="edit"/></a></center></p>';
}
?>
</div>

<!--end-->
<div class="s_about">
<h2>Fans</h2>
<p><strong class="startinfolabel">fans num:</strong><span id="fansnum"><?php echo $fanInfo['num']?></span></p>

<p><a href="javascript:add_fans(<?php echo $userinfo['ID']?>)" class="addfans" title="+ fans">+ fans</a></p>

</div>
</div>