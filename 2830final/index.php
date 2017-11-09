
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
<title>Personal Space</title>
<meta name="keywords" content="Personal Space" />
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
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="c_left">
           <div class="s_tuijian">
           <h2>Posts <span>Lists</span>
		    <?php 
			    if($_SESSION['pms'] == 1){
				    echo '<span style="float:right;margin-right:10px;"><a href="post_add.php" style="color:blue">add post</a></span>';
				}
			?>
			</h2>
           </div>
          <div class="content_text">
		  
		  
       <?php
			require_once('mysql_connect.php');
			
			
			$qry="select count(*) from star_posts";
			$result=mysql_query($qry) or die(mysql_error());
			$row=mysql_fetch_array($result,MYSQL_NUM);
			$num_records=$row[0];
            $display_ppp = 4;
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
			
			$qry="select * from star_posts order by createtime desc limit $the_start, $display_ppp";
			$result=mysql_query($qry);
			while($row=mysql_fetch_array($result)){
			    $sql = "select * from user where ID='{$row['user_id']}'";
				$data=mysql_query($sql) or die(mysql_error());
				$tempuser=mysql_fetch_array($data);
				
				
				if($_SESSION['pms'] == 1){
					$delete_post = '<span class="right yd"><a href="post_delete.php?post_id='.$row['id'].'" title="delete">delete</a>
				   </span>';
					
				}
				else{
				    $delete_post = "";
				}

				
				
				echo '
			   <div class="wz">
				<h3><a href="#" title="'.$row['title'].'">'.$row['title'].'</a></h3>
				 <dl>
				   <dt><img src="images/Post/'.$row['image'].'" width="200"  height="123" alt=""></dt>
				   <dd>
					 <p class="dd_text_1">'.$row['content'].'</p>
				   <p class="dd_text_2"><span class="left sj">时间:'.$row['createtime'].'</span>
				   
				   '.$delete_post.'
				   
				   <span class="right yd"><a href="post_view.php?post_id='.$row['id'].'" title="view">view</a>
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
					echo '<a class="page" href="index.php?p='.$previous.'">Pre</a>';
				}
				for($i=1;$i<=$num_pages;$i++)
				{
					if($i!=$page)
					{
						echo '<a class="page" href="index.php?p='.$i.'">'.$i.'</a>';
					}
					else
					echo $i;
				}
				if($page<$num_pages)
				{
					$next=$page+1;
					echo '<a class="page" href="index.php?p='.$next.'">Next</a>';
				}
				echo '</center>';
			}	
			
			?>				                    
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
    <script  type="text/javascript" src="js/nav.js"></script>
</body>
</html>
