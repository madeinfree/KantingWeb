<?php
include('indb.php');
$sel=pg_query($link,"select max(sid) from kanting_travel ;");
$row=pg_fetch_row($sel);
$max=$row[0];
$keysid=$max+1;
?>
<!doctype html>
<html style="margin:0px;padding:0px;width:100%;height:100%;overflow:hidden;">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Show墾丁旅遊行程</title>
	<link rel="stylesheet" type="text/css" href="_css/reset.css">
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<!-- /bootstrap -->
</head>
<body>
	<div id="insert">
			<form action="proc.php" method="post">
				<table>
					<tr>
						<td colspan="2">Insert墾丁旅遊行程</td>
					</tr>
					<tr>
						<td>旅遊編號</td>
						<td>#<?=$keysid;?></td>
					</tr>
					<tr>
						<td>旅遊類型編號</td>
						<td>#<input type="text" name="tid"></td>
					</tr>
					<tr>
						<td>旅遊行程名稱</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>旅遊類型</td>
						<td><input type="text" name="tname"></td>
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
						<td colspan="2"><input type="submit" value="新增旅遊行程"></td>
					</tr>
				</table>
				<input type="hidden" name="a1" value="insert" />
				<input type="hidden" name="sid" value="<?=$keysid;?>" />
			</form>
	</div>
	<div id="show">
		<?php
		$sel=pg_query($link,"select * from kanting_travel order by sid desc;");
		while($row=pg_fetch_row($sel)){
			if($row[0]==0)
				continue;
			echo '<table border="1">';
				echo '<tr>';
					echo '<td colspan="2">Show墾丁旅遊行程</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊編號</td>';
					echo '<td>'.$row[0].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊類型編號</td>';
					echo '<td>'.$row[1].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊行程名稱</td>';
					echo '<td>'.$row[2].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊類型</td>';
					echo '<td>'.$row[3].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>價格</td>';
					echo '<td>'.$row[4].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊地點</td>';
					echo '<td>'.$row[5].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>旅遊天數</td>';
					echo '<td>'.$row[6].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>行程路線</td>';
					echo '<td>'.$row[7].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>出發時間</td>';
					echo '<td>'.$row[8].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>銷售期限</td>';
					echo '<td>'.$row[9].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>使用期限</td>';
					echo '<td>'.$row[10].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>集合地點</td>';
					echo '<td>'.$row[11].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>最低人數</td>';
					echo '<td>'.$row[12].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>電話訂購</td>';
					echo '<td>'.$row[13].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>行程介紹</td>';
					echo '<td>'.$row[14].'</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>行程內容</td>';
					echo '<td>'.$row[15].'</td>';
				echo '</tr>';
			echo '</table>';
		}
		?>
	</div>
	
	
</body>
</html>