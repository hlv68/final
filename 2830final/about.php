<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>about me</title>
<meta name="keywords" content="about me" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
    <?php require_once("menu.php")?>
    <div id="content">
       <!--left-->
         <div class="left" id="about_me">
           <div class="weizi">
           <div class="wz_text">current location：<a href="#">Home</a>><h1>Personal</h1></div>
           </div>
           <div class="about_content">
		   
			<?php
			require_once('mysql_connect.php');
			$qry="select * from star_info";
			$result=mysql_query($qry);
			$starInfo=mysql_fetch_array($result);
            echo $starInfo['star_detail'];
			?>		   
		   
           </div>
         </div>
         <!--end left -->
         <!--right-->
         <?php require_once("starinfo.php")?>
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
    <!--footer-->
    <?php require_once("footer.html")?>
    <!--footer end-->
    <script  type="text/javascript" src="js/nav.js"></script>
    
</body>
</html>
