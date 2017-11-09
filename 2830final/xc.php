<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>photo</title>
<meta name="keywords" content="photo" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/waterfall.js" ></script> 
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script>
    function delete_img(id){
	    $.ajax({
		    "url":"delete_image.php",
			"type":"POST",
			"data":{
			    "photo_id":id,
			
			},
			"success":function(data){
			    alert("delete image success");
				window.location.href="xc.php";
			}
		});
	
	
	
	}
</script>
</head>

<body>
    <!--header start-->
    <?php
 	    require_once("menu.php");
	    session_start(); 
		
	
	?>
    <!--header end-->
    <!--content start-->
    <div id="content_xc">
         <div class="weizi">
           <div class="wz_text">current location：<a href="#">Home</a>><h1>photos</h1>
		   <?php 
		    if($_SESSION['pms'] == 1){
		        echo '<span style="float:right;margin-right:10px;"><a href="xc_add.php" style="color:blue">add photo</a></span>'; 
		   
		   
		    }?>
		   
		   
		   </div>
         </div>
         <div class="xc_content">
          <div class="con-bg">
              <div class="w960 mt_10">
               <div class="w650">
                <ul class="tips" id="wf-main">
					<?php
					
					require_once('mysql_connect.php');
					$qry="select * from star_photo";
					$result=mysql_query($qry);
					while($row = mysql_fetch_array($result)) { 
					
					    
                        if($_SESSION['pms'] == 1){
						    $delete_photo = '<a href="javascript:delete_img('.$row['id'].')" style="width: 180px;">delete</a>';
						}
						else{
						    $delete_photo = '';
						
						}
					    echo '<li class="wf-cld"><img src="images/photo/'.$row['star_photo'].'"  width="200" height="200" alt="" />'.$delete_photo.'</li>';
					}
					?>						
               </ul>
               </div>
             </div>
           </div>
         </div>
    </div>
    <!--content end-->
  <!--footer-->
    <?php require_once("footer.html")?>
    <!--footer end-->
    <script  type="text/javascript" src="js/nav.js"></script>
    
</body>
</html>