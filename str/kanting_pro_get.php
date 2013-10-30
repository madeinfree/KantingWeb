<?php
//include
//include('config.php');
include('import/query.php');

//action_type
$action_type_for_dosomething = str_replace("'","''",$_GET['action_type_for']);
$action_doing_query = str_replace("'","''",$_GET['action_doing']);

//for food
$food_key = str_replace("'","''",$_GET['food']);
//for 亂數推薦
$random_key = '';
//for 幾日遊
$travel_day_key = str_replace("'","''",$_GET['day_key']);

$link = new _Query();
$link_connect = $link->db_connect();
if (!$link_connect) {
    die('Could not connect !');
}

//Map取得美食[1]
if($action_type_for_dosomething == 1 && $action_doing_query == 'get_some_food_for_map' && $food_key != null) {
	$sel = "select * from kanting_store_info where name like '%$food_key%';";
	$sel_show = pg_fetch_row($link->db_query($sel));
	echo $sel_show[9].','.$sel_show[10].','.$sel_show[7].'<br /><br />詳細地址：'.$sel_show[5].'<br /><br />心得：'.$sel_show[4];
}

//取得亂數推薦[2]
if($action_type_for_dosomething == 2 && $action_doing_query == 'get_some_random_tourism') {
	$sel = "select * from kanting_travel where sid = ".rand(1,43);
	$sel_show = pg_fetch_row($link->db_query($sel));
	for( $i=0;$i<count($sel_show);$i++) {
			echo $sel_show[$i];
		if($i != 15) {
			echo ',';
		}
	}
}

//取得*日遊[3]
if($action_type_for_dosomething == 3 && $action_doing_query == 'get_some_half_tourism' && $travel_day_key != null) {
	$sel = "select * from kanting_travel where tname = '$travel_day_key'";
	$sel_query = $link->db_query($sel);
	while($sel_show = pg_fetch_row($sel_query)) {
		echo $sel_show[2].','.
				 $sel_show[3].','.
				 $sel_show[4].','.
				 $sel_show[5].','.
				 $sel_show[6].';';
	}
}
/** 取得亂數首頁
 * 1. 優惠行程[5]
 * 2. 美食推薦[6]
 * 3. 民宿飯店[4]
 * 4. 生物推薦[7]
 * ...
 */
//取得*首頁隨機推薦[5]
if($action_type_for_dosomething == 5 && $action_doing_query == 'get_some_random_for_index') {
	$rand = rand(0,2);
	$sel = "select * from kanting_travel where recommend = 1";
	$sel_query = $link->db_query($sel);
	while($sel_show = pg_fetch_row($sel_query)) {
		echo $sel_show[0].',';
		echo $sel_show[2].';';
	}
}
//取得*首頁隨機推薦[6]
if($action_type_for_dosomething == 6 && $action_doing_query == 'get_some_random_for_index') {
	$rand = rand(0,2);
	$sel = "select * from kanting_food where recommend = 1";
	$sel_query = $link->db_query($sel);
	while($sel_show = pg_fetch_row($sel_query)) {
		echo $sel_show[0].',';
		echo $sel_show[2].';';
	}
}
//取得*首頁隨機推薦[7]
if($action_type_for_dosomething == 7 && $action_doing_query == 'get_some_random_for_index') {
	$rand = rand(0,2);
	$sel = "select * from kanting_organism where recommend = 1";
	$sel_query = $link->db_query($sel);
	while($sel_show = pg_fetch_row($sel_query)) {
		echo $sel_show[0].',';
		echo $sel_show[2].';';
	}
}
//取得*首頁隨機推薦[4]
if($action_type_for_dosomething == 4 && $action_doing_query == 'get_some_random_for_index') {
	$rand = rand(0,2);
	$sel = "select * from kanting_stay where recommend = 1";
	$sel_query = $link->db_query($sel);
	while($sel_show = pg_fetch_row($sel_query)) {
		echo $sel_show[0].',';
		echo $sel_show[2].';';
	}
}

?>
