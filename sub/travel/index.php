<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Show墾丁旅遊行程</title>
	<link rel="stylesheet" type="text/css" href="_css/reset.css">
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();
if($_SESSION['id']=='adm'){
  echo '你已經登入<br/><br/>- <a href="insert.php">新增旅遊行程</a></br>- <a href="show.php">查看旅遊行程</a><br/><br/><a href="logout.php">登出</a>';
} else {
echo '<form class="pure-form" action="proc.php" method="post">
    <fieldset>
		<legend>登入管理介面</legend>
		<input type="text" name="id" placeholder="ID">
		<input type="password" name="pw" placeholder="Password">
		<button type="submit" class="pure-button notice">登入</button>
	</fieldset>
	<input type="hidden" name="a1" value="login" />
</form>';
}
?>

</body>
</html>
