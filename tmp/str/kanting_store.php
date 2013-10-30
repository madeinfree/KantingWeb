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
	echo '【'.$sel3[0].'】'.$sel3[1].','.$sel3[2].','.$sel3[3].','.$sel3[4].','.$sel3[5].','.$sel3[6].','.$sel3[7].','.$sel3[8].','.$sel3[9].','.$sel3[10];
}
?>

</body>
</html>