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
	<title>Show墾丁旅遊行程</title>
	<link rel="stylesheet" type="text/css" href="_css/reset.css">
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
	<!--link rel="stylesheet" href="https://ssl.gstatic.com/sites/p/7ccd89/system/app/css/codemirror_css.css"-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
	.all_center {
		position: relative;
		margin:0 auto;
	}
</style>
</head>
<body>
<a href="index.php">back</a>
		<?php
		if(!isset($_GET['page']))
		{
			$page=1; //設定起始頁
			//isset在此判斷後方參數是否存在
		} else {
			$page = intval($_GET['page']);
			//確認頁數只能夠是數值資料
		}

		if($page==null)
		  $page=1;

		$items = pg_num_rows(pg_query($link,"select * from kanting_travel order by sid desc;"    ));
		$per = 10; //設定每頁顯示項目數量
		$pages = ceil($items/$per); //計算總頁數
		$start = ($page-1)*$per; //每頁起始資料序號

		$page_prev = $page-1;
		$page_next = $page+1;
		echo '<center>';	
		echo '<ul class="pure-paginator">';
    	echo '<li>';
			if($page_prev == 0) {
				echo '<a class="pure-button prev" href="javascript:void(0);">&#171;</a>';
			} else {
				echo '<a class="pure-button prev" href="show.php?page='.$page_prev.'">&#171;</a>';
			}
		echo '</li>';
			for($i=1;$i<=$pages;$i++) {
				if($i == $page) {
    			echo '<li>';
					echo '<a class="pure-button pure-button-active" href="show.php?page='.$i.'">'.$i.'</a>';
				echo '</li>';
				} else {
    			echo '<li>';
					echo '<a class="pure-button" href="show.php?page='.$i.'">'.$i.'</a>';
				echo '</li>';
				}
			}
    	echo '<li>';
			if($page_next > $pages) {
				echo '<a class="pure-button next" href="javascript:void(0)">&#187;</a>';
			} else {
				echo '<a class="pure-button next" href="show.php?page='.$page_next.'">&#187;</a>';
			}
		echo '</li>';
		echo '</ul>';
		echo '</center>';
//		echo '<table class="main">';
		echo '<tr>';
		$p=0;
		$sel=pg_query($link,"select * from kanting_travel order by sid desc limit $per offset $start;");
		while($row=pg_fetch_row($sel)){
			$p++;
			echo '<td>';
			echo '<table class="pure-table pure-table-horizontal all_center">';
				echo '<thead>';
				echo '<tr>';
					echo '<td colspan="2">Show墾丁旅遊行程</td>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
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
				echo '</tbody>';
			echo '</table>';
			echo '</td>';
		//	if($p==2){
				echo '</tr>';
				echo '<tr>';
		//		$p=0;
		//	}
		}
		?>
	
	<script type="text/javascript">
		$('#name').focus();
		$("select").change(function () {
  			var tname = "";
			var tid = "";
  			$("select option:selected").each(function () {
            	tname = $(this).text();
				if(tname == '半日遊'){
					tid = 1;
				}else if(tname == '一日遊'){
					tid = 2;
				}else if(tname == '二日遊'){
					tid = 3;
				}else if(tname == '三日遊'){
					tid = 4;
				}
  			});
  			$("#kanting_type_tid").text(tid);
		})
		.change();		
	</script>	
</body>
</html>
