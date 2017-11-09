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
<title>add photo</title>
<meta name="keywords" content="add photo" />
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
	.post_image{
	    position: absolute;
		top: 150px;
		width:200px;
		height:200px;
	}	
	#tip{
	    position: absolute;
		top: 330px;
		width:200px;
		height:200px;
       left:330px;		
	
	}
	#post_save{
	
	    position: absolute;
		top: 400px;
		width:60px;
		height:30px;

	
	}	
</style>


</head>

<body>
    <!--header start-->
    <?php require_once("menu.php")?>
    <!--header end-->
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="news">
          <div class="news_content">
  					<form action="xc_add_save.php" name="form" method="post" enctype="multipart/form-data">
					    <div><input class="post_image" name="file0" type="file" id="file"  multiple="multiple" />
						 <img class="post_image" id="img0" src="images/my.jpg" class="user-img input" ><label id="tip">click image to change</label></div>
					    <div><input id="post_save" type="submit" name="submit" value="save" /></div>
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
  <!--footer-->
    <?php require_once("footer.html")?>
    <!--footer end-->
	<script  type="text/javascript" src="js/photo.js"></script>
    <script  type="text/javascript" src="js/nav.js"></script>
    
</body>
</html>