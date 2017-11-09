<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>comments</title>
<meta name="keywords" content="comments" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
      <!--header start-->
       <?php require_once("menu.php")?>
       <!--nav end-->
    <!--content start-->
    <div id="content">
       <!--left-->
         <div class="left" id="guestbook">
           <div class="weizi">
           <div class="wz_text">current location：<a href="#">Home</a>><h1>comments</h1></div>
           </div>
		    <div>
			    <textarea style="width:100%;height:150px" placeholder="please input your comments,up to 400 characters" id="comments"></textarea>
				 <p style="float:right"><a href="javascript:save_comments()" class="addfans" title="comment">comment</a></p>
			</div>

		   <div class="clear"></div>
		   
           <div class="content_text">

		   
			<?php
			require_once('mysql_connect.php');
			
			
			$qry="select count(*) from fans_comments";
			$result=mysql_query($qry) or die(mysql_error());
			$row=mysql_fetch_array($result,MYSQL_NUM);
			$num_records=$row[0];
            $display_ppp = 3;
			if($num_records>$display_ppp){
				$num_pages=ceil($num_records/$display_ppp);
			}
			else{
				$num_pages=1;
			}
			if(!isset($_GET['p'])){
				$page=1;
			}
			else
			{
				$page=$_GET['p'];
				if($page>$num_pages)
				$page=1;
			}			
			
			$the_start=($page-1)*$display_ppp;
			
			$qry="select * from fans_comments order by createtime desc limit $the_start, $display_ppp";
			$result=mysql_query($qry);
			while($row=mysql_fetch_array($result)){
			    $sql = "select * from user where ID='{$row['user_id']}'";
				$data=mysql_query($sql) or die(mysql_error());
				$tempuser=mysql_fetch_array($data);
                echo '
			   <div class="wz" style="border: 1px solid #ccc;">
				 <dl>
				   <dd style="width:100%">
		           <p class="dd_text_2">
				   <span class="left author">'.$tempuser['name'].'</span><span class="left sj">'.$row['createtime'].'</span>
					<div class="clear"></div>
				   </p>				   
					 <p class="dd_text_1">'.$row['content'].'</p>
		           <p class="dd_text_2">
				   <span class="right yd"><a href="javascript:reply_comments(\''.$tempuser['name'].'\')" title="reply">reply</a>
				   </span>
					<div class="clear"></div>
				   </p>			
				   </dd>
				   <div class="clear"></div>
				 </dl>
				</div>';

			}
			
			if($num_pages>1)
			{
				echo '<center style="color: red">';
				if($page>1)
				{
					$previous=$page-1;
					echo '<a class="page" href="guestbook.php?p='.$previous.'">Pre</a>';
				}
				for($i=1;$i<=$num_pages;$i++)
				{
					if($i!=$page)
					{
						echo '<a class="page" href="guestbook.php?p='.$i.'">'.$i.'</a>';
					}
					else
					echo $i;
				}
				if($page<$num_pages)
				{
					$next=$page+1;
					echo '<a class="page" href="guestbook.php?p='.$next.'">Next</a>';
				}
				echo '</center>';
			}	
			
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

