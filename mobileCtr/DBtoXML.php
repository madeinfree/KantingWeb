<?php 
/*********************************
 * DataBase_data to Mobile_Client*
 * 手機撈資料庫                  *
 *********************************/

/* Include
 * config -- 控制項目 
 * query -- DataBase
 */

include('../str/import/config.php');
include('../str/import/query.php');

/*** 實體Query ***/
$Connect = new _Query();

/*** Connect ***/
$link = $Connect->db_connect();

/*** Connect Error ***/
if(!$link) {
	die('Connection Error !');
}

/*** Connect Select ***/
//
// Control Var
$_count = $Connect->db_fetch_row($Connect->db_query('select count(no) from kanting_store_info;'));
//
echo $_count[0].'：';
//Lock
$num = 0;

$sel_cmd = 'select * from kanting_store_info;';
$sel_query = $Connect->db_query($sel_cmd);
while( $Result = $Connect->db_fetch_row($sel_query) ) {
	$Result_len = count($Result);
	//資料總數切割
	//echo '|';
	//輸出總數
	//echo $Result_len;
	//輸出總數切割
	//echo '|';
	//For Start
	for($i = 0 ; $i < $Result_len ; $i++) {
		//判斷是否為最後一筆
		if($i != $Result_len-1) { 
			//判斷第一個Number,分析切割 Number
			if($i == 0) {
				echo '['.$Result[$i].'],'; 
			} else {
				echo $Result[$i].','; 
			}
			//最後一筆結束 ';'
		} else {
				echo $Result[$i];
			if($_count[0]-1 != $num) {
				echo '；';
				$num++;
			}
		}
	} // End For
	//echo '<br />';
}


/*** Connect_close ***/
$link_close = $Connect->db_close($link);

?>
