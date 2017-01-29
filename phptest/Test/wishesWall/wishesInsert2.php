<?php
header("Content-Type: text/html; charset=utf-8"); 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$context = $_POST["content"]; 

$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
         $flag1 = preg_match( $pattern, $email);
if ($context != ""&& $flag1 && $name != "")
{
	$con = mysql_connect("localhost", "tourism", "tourism"); 
	mysql_query("set names 'utf8'", $con); 
	if (!$con)
	{
		die('Could not connect: '.mysql_error());
	}

	mysql_select_db("my_db", $con); 

	$innn = mysql_query("INSERT INTO wishesWall(name, email, context, time)
		VALUES('{$name}', '{$email}', '{$context}', CURDATE())"); 

	mysql_close($con);
	$url = "WishesWall.php"; 
	header("refresh:0; url=$url"); 
	
}	
else 
{
	echo "<br /><br /><center><h3>请检查你填写的  “姓名”， “邮箱”， “愿望”， 信息是否完整， 正确。</h3></center><br /><br />";

	echo "<br /><br /><center><h3>你的愿望， 让我们共同来守护 </h3></center>";
	$url = "WishesWall.php"; 
	header("refresh:5; url=$url"); 
}
?>
