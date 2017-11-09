
<?php 
session_start() ;                   
if (!isset ($_SESSION['user']))
{
header ("Location:login.php") ;    
exit ;
}     

?>

<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>home</title>
<meta name="keywords" content="home" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

<script>
    function save_post_comments(postid,page){
	    var comments = $("#comments").val();
		
		if(comments.length == 0){
		    alert("comments is null");
			return false;
		
		}
		if(comments.length > 400){
		    alert("comments length up to 400, please reinput");
		    return false;
		}
		
		$.ajax({
		    "url":"save_post_comments.php",
			"type":"post",
			"data":{
			    "comments":comments,
				"postid":postid,
			},
			"success":function(data){
			    alert("comments success");
				window.location.href="post_view.php?post_id="+postid+"&p="+page;
			}
		});
	}

	function reply_comments(username){
	    $("#comments").val("@"+username+": ");
		$("#comments").focus();
		scrollTo(0, 1000);
	}
</script>
</head>

<body>
    <?php require_once("menu.php")?>
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="news">
          <div class="news_content">
 
		  
       <?php
			require_once('mysql_connect.php');
			$postid = $_GET['post_id'];
            $qry="select count(*) from star_posts_comments where post_id={$postid}";
			$result=mysql_query($qry) or die(mysql_error());
			$row=mysql_fetch_array($result,MYSQL_NUM);
			$num_records=$row[0];			
			$qry="select * from star_posts where id={$postid}";
			$result=mysql_query($qry);
			$row=mysql_fetch_array($result);
				
            echo '
			  <div class="news_top">
				<h1>'.$row['title'].'</h1>
				<p>
				  <span class="left sj">时间:'.$row['createtime'].'</span>
				  <span class="left author">comments: '.$num_records.'</span>
				</p>
				<div class="clear"></div>
			  </div>
				<div class="news_text">'.$row['content'].'</div>';				
			?>	


       <div style="margin-top:30px">
       <?php
            $display_ppp = 2;
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
			
			$qry="select * from star_posts_comments where post_id={$postid} order by createtime desc limit $the_start, $display_ppp";
			$result=mysql_query($qry);
			while($row=mysql_fetch_array($result)){
			    $sql = "select * from user where ID='{$row['userid']}'";
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
					echo '<a class="page" href="post_view.php?post_id='.$postid.'&p='.$previous.'">Pre</a>';
				}
				for($i=1;$i<=$num_pages;$i++)
				{
					if($i!=$page)
					{
						echo '<a class="page" href="post_view.php?post_id='.$postid.'&p='.$i.'">'.$i.'</a>';
					}
					else
					echo $i;
				}
				if($page<$num_pages)
				{
					$next=$page+1;
					echo '<a class="page" href="post_view.php?post_id='.$postid.'&p='.$next.'">Next</a>';
				}
				echo '</center>';
			}	
			
			?>	
			
		    <div>
			    <textarea style="width:100%;height:150px" placeholder="please input your comments,up to 400 characters" id="comments"></textarea>
				 <p style="float:right"><a href="javascript:save_post_comments(<?php echo $postid?>,<?php echo $page?>)" class="addfans" title="comment">comment</a></p>
			</div>		
           </div>			
			
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
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="js/nav.js"></script>
</body>
</html>
