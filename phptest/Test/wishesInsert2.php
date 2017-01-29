<?php
header("Content-Type: text/html; charset=utf-8"); 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$context = $_POST["context"]; 
if ($context != "" && $email != "" && $name != "")
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
}
?>


<?php
$conn = mysql_connect("localhost", "tourism", "tourism"); 
mysql_query("set character 'utf8'", $conn); 
if (!$conn)
{
	die('Could not connect:'.mysql_error()); 
}

mysql_select_db("my_db", $conn); 

$res
