<html>
<head>
	<title>單純測試網頁</title>
</head>
<body>

<?php
$link = pg_connect("host=localhost dbname=kantinggo user=kantinggo password=XJ9#25M2");
if (!$link) {
    die('Could not connect: ');
}
$sel1="select * from kanting_store_info ;";
$sel2=pg_query($sel1);
while($sel3=pg_fetch_row($sel2))
{
	if($sel3[0]!=0){
	echo '<table border="1">';
	echo '<tr>';
		echo '<td>編號</td><td>'.$sel3[0].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>店家名稱</td><td>'.$sel3[1].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>店家類型</td><td>'.$sel3[2].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>店家區域</td><td>'.$sel3[3].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>介紹</td><td>'.$sel3[4].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>住址</td><td>'.$sel3[5].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>電話</td><td>'.$sel3[6].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>內容</td><td>'.$sel3[7].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>備註</td><td>'.$sel3[8].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>經度</td><td>'.$sel3[9].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>緯度</td><td>'.$sel3[10].'</td>';
	echo '</tr>';
	echo '</table>';
	echo '</br>';
	}
}
?>

</body>
</html>