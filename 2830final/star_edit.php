
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


?>

<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>start edit</title>
<meta name="keywords" content="star edit" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->


<style>
	#file {
		 opacity:0;
		 filter:alpha(opacity=0);
		 font-size:100px;
	    z-index:1;
	}
	#post_Realname{
	    position: absolute;
		top: 150px;
		height: 25px;
		width: 300px;
	
	
	}
	
	#post_Nationality{
	    position: absolute;
		top: 200px;
		height: 25px;
		width: 300px;
	
	
	}

	#post_Occupation{
	    position: absolute;
		top: 250px;
		height: 25px;
		width: 300px;
	
	
	}	
	
	#post_Born{
	    position: absolute;
		top: 300px;
		height: 25px;
		width: 300px;
	
	
	}	
	.post_image{
	    position: absolute;
		top: 350px;
		width:200px;
		height:200px;
	}	
	#tip{
	    position: absolute;
		top: 500px;
		width:200px;
		height:200px;
       left:330px;		
	
	}
	
	#post_breif{
	
	    position: absolute;
		top: 580px;
		height:200px;
		width:400px;

	
	}
	
	#post_detail{
	
	    position: absolute;
		top: 800px;
		height:200px;
		width:400px;

	
	}	
	
	#post_save{
	
	    position: absolute;
		top: 1010px;
		width:60px;
		height:30px;

	
	}	
</style>

</head>

<body>
    <?php require_once("menu.php");
	require_once('mysql_connect.php');
	
	$qry="select * from star_info";
	$result=mysql_query($qry) or die(mysql_error());	
	$star_info = mysql_fetch_array($result);
	
	
	
	?>
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="news">
          <div class="news_content" style="min-height:900px">
  					<form action="star_edit_save.php" name="form" method="post" enctype="multipart/form-data">
					    <div><input placeholder="please input Realname" id="post_Realname" type="text" name="Realname" value="<?php echo $star_info['star_name']?>"></div>
						<div><input placeholder="please input Nationality" id="post_Nationality" type="text" name="Nationality" value="<?php echo $star_info['star_nationality']?>"></div>
						<div><input placeholder="please input Occupation" id="post_Occupation" type="text" name="Occupation" value="<?php echo $star_info['star_occupation']?>"></div>
						<div><input placeholder="please input Born" id="post_Born" type="text" name="Born" value="<?php echo $star_info['star_born']?>"></div>
					    <div><input class="post_image" name="file0" type="file" id="file"  multiple="multiple" />
						 <img class="post_image" id="img0" src="images/<?php echo $star_info['star_logo']?>" class="user-img input" ><label id="tip">click image to change</label></div>
					    <div><textarea placeholder="please input breif" id="post_breif" name="breif" ><?php echo $star_info['star_brief']?></textarea></div>
						<div><textarea placeholder="please input detail" id="post_detail" name="detail" ><?php echo $star_info['star_detail']?></textarea></div>
					    <div><input id="post_save" onclick="return checkform()" type="submit" name="submit" value="save" /></div>
					</form>           
		  
       		
			
           </div>
         </div>
         <!--left end-->
         <!--right-->
         <?php require_once("starinfo.php")?>
         <!--right end-->
         <div class="clear"></div>
    </div>
    <!--content end-->
    <!--footer start-->
    <?php require_once("footer.html")?>
    <!--footer end-->	
    <script  type="text/javascript" src="js/photo.js"></script>
    <script  type="text/javascript" src="js/nav.js"></script>
</body>
</html>
