<?php
include 'db.inc.php';

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die("Ошибка!");
mysql_select_db(DB_NAME) or die(mysql_error());

//$ip = $_SERVER['REMOTE_ADDR'];
//$browser = $_SERVER['HTTP_USER_AGENT'];
//echo $browser;



if($_SERVER['REQUEST_METHOD']=='POST'){
	$user = $_POST['user'];
	$email = $_POST['email'];
	$url = $_POST['url'];
	$text = $_POST['text'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$browser = $_SERVER['HTTP_USER_AGENT'];
	
	$sql = "INSERT INTO get(
							name,
							datetime,
							email,
							url,
							msg,
							ip,
							browser)
						VALUES(
							'$user',
							now(),
							'$email',
							'$url',
							'$text',
							'$ip',
							'$browser')";
	mysql_query($sql) or die(mysql_error());
	header('Location: index.php');
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Guestbook</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/css.css">
	<link href="http://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">

 		<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->

</head>
<body>
	<h1 class="h1">Guestbook</h1>
	<form action="index.php" method="post" enctype="multipart/from-data">
		<table class="table-form" border="1">
			<tr>
				<td>User Name:</td>
				<td><input maxlength="25" size="58" type="text" name="user" required></td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td><input type="email" size="58" name="email" required></td>
			</tr>
			<tr>
				<td>Homepage:</td>
				<td><input type="url" size="58" name="url"></td>
			</tr>
			<tr>
				<td>CAPTCHA:</td>
				<td><img src='captcha.php' id='capcha-image'></td>
			</tr>
			<tr>
				<td><a href="javascript:void(0);" onclick="document.getElementById('capcha-image').src='captcha.php?rid=' + Math.random();">Обновить капчу</a></td>
				<td><input type="text" size="58" name="code"></td>
		
			</tr>
			<tr>
				<td>Text:</td>
				<td><textarea rows="10" cols="45" name="text" required>Писать сюда</textarea></td>
			
			</tr>
			<tr>
				<td><input type="submit" name="go" value="Отправить"></td>
				<td><input type="reset" value="Очистить"></td>
			</tr>
		</table>
	</form>
</body>
</html>