<!--header start-->
<div id="header">
  <div>
  <h1 style="width:80%;float:left">Personal Space</h1>
  <?php 
    session_start() ; 
	if (!isset ($_SESSION['user']))
	{
		echo '<span class="loignclass">Not login,please, <span>,  <a href="login.php" style="color:blue">Login</a></span></span>';		
	}
	else
	{
		echo '<span class="loignclass">hello, <span>'.$_SESSION['user'].',  <a href="logout.php" style="color:blue">Logout</a></span></span>';

	} 
  
  ?>  
  
  
  </div>
  <div class="clear"></div>
  <p>Do one thing at a time, and do well.</p>    
</div>
 <!--header end-->
<!--nav-->
 <div id="nav">
	<ul>
	 <li><a href="index.php">Home</a></li>
	 <li><a href="about.php">Personal</a></li>
	 <li><a href="xc.php">photos</a></li>
	 <li><a href="video.php">videos</a></li>
	 <li><a href="guestbook.php">comments</a></li>
	 <div class="clear"></div>
	</ul>
  </div>
   <!--nav end-->