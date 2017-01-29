<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>陈闻恪许愿墙</title>
	<link rel="stylesheet" href="Css/index.css" />
	<script type="text/javascript" src='Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='Js/index.js'></script>
	
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>

		<?php
			$con = mysql_connect("localhost", "tourism", "tourism"); 
			mysql_query("SET NAMES 'UTF8'");
			if (!$con)
			 {
			  die('Could not connect: ' . mysql_error());
			 }

			mysql_select_db("my_db", $con);

			$result = mysql_query("SELECT * FROM wishesWall");

			$flag = 1; 
			while($row = mysql_fetch_array($result))
			  {
				echo "<dl class='paper a".(($flag % 5) + 1)."'> <dt> <span class='usemame'>";
				echo $row['name']."</span>";
				echo "<span class='num'>No."; 
				printf("%05d", $row['id']); 
				echo "</span></dt> <dd class='content'>"; 

				// process expressions 
				$obj_context = $row['context']; 
				$obj_context = str_replace("[抱抱]", "<img src=\"Images/phiz/baobao.gif\" alt=\"抱抱\" />", $obj_context);
				$obj_context = str_replace("[害羞]", "<img src=\"Images/phiz/haixiu.gif\" alt=\"害羞\" />", $obj_context);
				$obj_context = str_replace("[酷]", "<img src=\"Images/phiz/ku.gif\" alt=\"酷\" />", $obj_context);
				$obj_context = str_replace("[嘻嘻]", "<img src=\"Images/phiz/xixi.gif\" alt=\"嘻嘻\" />", $obj_context);
				$obj_context = str_replace("[太开心]", "<img src=\"Images/phiz/taikaixin.gif\" alt=\"太开心\" />", $obj_context);
				$obj_context = str_replace("[偷笑]", "<img src=\"Images/phiz/touxiao.gif\" alt=\"偷笑\" />", $obj_context);
				$obj_context = str_replace("[钱]", "<img src=\"Images/phiz/qian.gif\" alt=\"钱\" />", $obj_context);
				$obj_context = str_replace("[花心]", "<img src=\"Images/phiz/huaxin.gif\" alt=\"花心\" />", $obj_context);
				$obj_context = str_replace("[挤眼]", "<img src=\"Images/phiz/jiyan.gif\" alt=\"挤眼\" />", $obj_context);

				echo "<pre>".$obj_context."</pre></dd>"; 
				echo "<dd class='bottom'> <span class='time'>";
				echo $row['time']."</span>";  
				echo " <a href=\"\" class='close'></a> </dd> </dl>";  
				$flag++; 
			  }

			mysql_close($con);
		?>

	</div>

	<div id='send-form'>
		<p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>

		<!-- Here need a function to sent new wishes -->
		 
		<form action="wishesInsert2.php" method="post">   
			<p>
				<label for="username">昵称：</label>
				<input type="text" name="name" id='email'></input>
				<label for="Email">邮箱 : </label>
				<input type="text" name='email' id='username'/>
			</p>
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>

				<textarea name="content" id='content'></textarea>
				<div id='phiz'>
					<img src="Images/phiz/zhuakuang.gif" alt="抓狂" />
					<img src="Images/phiz/baobao.gif" alt="抱抱" />
					<img src="Images/phiz/haixiu.gif" alt="害羞" />
					<img src="Images/phiz/ku.gif" alt="酷" />
					<img src="Images/phiz/xixi.gif" alt="嘻嘻" />
					<img src="Images/phiz/taikaixin.gif" alt="太开心" />
					<img src="Images/phiz/touxiao.gif" alt="偷笑" />
					<img src="Images/phiz/qian.gif" alt="钱" />
					<img src="Images/phiz/huaxin.gif" alt="花心" />
					<img src="Images/phiz/jiyan.gif" alt="挤眼" />
				</div>
			</p>
			<input type="submit"></input>
		</form>

	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->




<!-- Footer
    ================================================== -->
    <br />
   <br />
   <br />
    <p style="text-align: center;">
              <a href="http://www.cnblogs.com/acm1314/">Blog</a>
              &nbsp; &nbsp;  &nbsp; &nbsp;
             <a href="http://weibo.com/p/1005055382871687?is_all=1">Weibo</a>
          	 &nbsp; &nbsp; &nbsp; &nbsp;
             <a href="https://github.com/CaoTanXiaoKe">GitHub</a>
              &nbsp; &nbsp; &nbsp; &nbsp;
              <a href="http://wpa.qq.com/msgrd?v=3&uin=2568333286&site=qq&menu=yes">QQ</a>
             &nbsp; &nbsp; &nbsp; &nbsp;
              <a href="mailto:2568333286@qq.com" class="hire"><i class="icon-envelope"></i> @Email Me</a>
               &nbsp; &nbsp; &nbsp; &nbsp;
              <a href="thanks.html">鸣谢</a>
   </p>
   <br />
   <br />
   <br />

</body>
    </html>
