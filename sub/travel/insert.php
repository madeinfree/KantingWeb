<?php
session_start();
include('indb.php');
if($_SESSION['id']!='adm'){
	die("你沒有權限！");
}
$sel=pg_query($link,"select max(sid) from kanting_travel ;");
$row=pg_fetch_row($sel);
$max=$row[0];
$keysid=$max+1;
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Insert墾丁旅遊行程</title>
	<link rel="stylesheet" type="text/css" href="_css/reset.css">
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<a href="index.php">back</a>
			<form action="proc.php" method="post">
				<table class="pure-table pure-table-horizontal main">
					<thead>
					<tr>
						<td colspan="2"><span style="font-size:1.5em;">Insert墾丁旅遊行程</span></td>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>旅遊編號</td>
						<td>#<?=$keysid;?></td>
					</tr>
					<tr>
						<td>旅遊行程名稱</td>
						<td><input type="text" name="name" id="name"></td>
					</tr>
					<tr>
						<td>旅遊類型編號</td>
						<td>
							<span id="kanting_type_tid"></span>
						</td>
					</tr>
					<tr>
						<td>旅遊類型</td>
						<td>
							<select name="tname">
								<option value="半日遊">半日遊</option>
								<option value="一日遊">一日遊</option>
								<option value="二日遊">二日遊</option>
								<option value="三日遊">三日遊</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>價格</td>
						<td>$<input type="text" name="price"></td>
					</tr>
					<tr>
						<td>旅遊地點</td>
						<td><input type="text" name="place"></td>
					</tr>
					<tr>
						<td>旅遊天數</td>
						<td><input type="text" name="day"></td>
					</tr>
					<tr>
						<td>行程路線</td>
						<td><input type="text" name="itinerary"></td>
					</tr>
					<tr>
						<td>出發時間</td>
						<td><input type="text" name="start_time"></td>
					</tr>
					<tr>
						<td>銷售期限</td>
						<td><input type="text" name="sale_deadline"></td>
					</tr>
					<tr>
						<td>使用期限</td>
						<td><input type="text" name="use_deadline"></td>
					</tr>
					<tr>
						<td>集合地點</td>
						<td><input type="text" name="meeting_place"></td>
					</tr>
					<tr>
						<td>最低人數</td>
						<td><input type="text" name="lowest_people"></td>
					</tr>
					<tr>
						<td>電話訂購</td>
						<td><input type="text" name="telphone"></td>
					</tr>
					<tr>
						<td>行程介紹</td>
						<td><input type="text" name="introduce"></td>
					</tr>
					<tr>
						<td>行程內容</td>
						<td><input type="text" name="content"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="pure-button pure-button-primary" value="新增旅遊行程"></td>
					</tr>
					</tbody>
				</table>
				<input type="hidden" name="a1" value="insert" />
				<input type="hidden" name="sid" value="<?=$keysid;?>" />
			</form>
		</div>
</body>
</html>
