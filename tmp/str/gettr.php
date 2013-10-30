<?php

//2013042001 - Tony Edit

$dateset = @date("Y/m/d");
$fromset = $_REQUEST['fromcity'];
$fromstation = $_REQUEST['fromstation'];

//把fromcity去掉
$msg=join('',file("http://twtraffic.tra.gov.tw/twrail/SearchResult.aspx?searchtype=0&searchdate=$dateset&fromcity=$fromcity&tocity=11&fromstation=$fromstation&tostation=1418&trainclass=2&fromtime=0000&totime=2359"));			   
//				   http://twtraffic.tra.gov.tw/twrail/SearchResult.aspx?searchtype=0&searchdate=2013/05/11&fromcity=9&tocity=11&fromstation=1228&tostation=1418&trainclass=2&fromtime=0000&totime=2359
//       
//       searchtype=0 第一種快速搜尋
//       searchdate=2013/04/20 搜尋時間為今天的班次
//		 fromcity 來自哪個城市
//				臺北 : 0 , 桃園 : 1 , 新竹 : 2 , 苗栗 : 3 , 臺中 : 4 , 彰化 : 5 , 南投 : 6 , 雲林 : 7 , 嘉義 : 8 , 臺南 : 9 ,
//				高雄 : 10 , 屏東 : 11 , 臺東 : 12 , 花蓮 : 13 ,	宜蘭 : 14 , 平溪線 :15 , 內灣/六家線 : 16 , 集集線 : 17 , 沙崙縣 : 18
//		 fromstation 起始點
//				臺北 : 1008 , 板橋 : 1011 , 桃園 : 1015 , 中壢 : 1017 , 新竹 : 1025 , 臺中 : 1319 , 彰化 : 1120 ,
//				斗六 : 1210 , 嘉義 : 1215 , 臺南 : 1228 , 高雄 : 1238 , 屏東 : 1406 , 宜蘭 : 1820 , 花蓮 : 1715 , 臺東 : 1632。
//       tostation   目的地
//       trainclass  對號列車   : '1100','1101','1102','1107','1110','1120'
//                   非對號列車 : '1131','1132','1140'
//                   所有車種   : 2
//		 fromtime 從幾點幾分 
//       totime   到幾點幾分


$cnt=1;
$c=0;
$ss="";
$pt=strpos($msg,'</thead>');
$msg=substr($msg,$pt);
$pt1=strpos($msg,'</tbody>');
$msg1=substr($msg,0,$pt1);
$msg1=preg_replace("/<(\/?div.*?)>/si","",$msg1); 
$msg1=preg_replace("/<(\/?span.*?)>/si","",$msg1);
$msg1=preg_replace("/<(\/?a.*?)>/si","",$msg1);
$msg1=preg_replace("/<(\/?img.*?)>/si","",$msg1);
$msg1=preg_replace("/<(\/?td.*?)>/si","",$msg1);
//$msg1=preg_replace("/<(\/?font.*?)>/si","<br />",$msg1);
$msg1=str_replace('<font color="Black">',"",$msg1);
$msg1=str_replace('</font>',"<br />",$msg1);

$msg1 = preg_replace('/\s(?=\s)/', '', $msg1); 
$stuednt_array=explode("<br />",$msg1);
$msg1=trim($msg1);
//計數
$count=1; 
//word
$word = null;
//foreach($stuednt_array as $index => $value)
//echo "$index : $value"."<br />";

for ($i=0;$i<count($stuednt_array);$i++) {
	//if($stuednt_array[$i] == "自強") echo '<br />'; 
	//if($i%11 == 0) { if($i != 0) {echo '<br />'; } echo '[CARSET]';} 
	if($i%11 == 0) $stuednt_array[$i+10] = ''; 
	//if($stuednt_array[$i] == null) $stuednt_array[$i] = 'over';
	//echo trim($stuednt_array[$i])."\n";
	$msg1code = trim($stuednt_array[$i]);
	$msg2=str_replace(array("<tr class=\"Grid_Row\" bgcolor=\"White\">","<br />","</thead>","<tbody>","<tr class=\"Grid_Row\" bgcolor=\"#EEEEEE\">","</tr>","&rarr;"), array("","","","","","",""),$msg1code); 
	$word .= trim($msg2.'；');
}
//echo $word;
$stuednt_array2=explode("；",$word);
for($j=0;$j<count($stuednt_array2);$j++) {
	if(($stuednt_array2[$j] == "自強" || $stuednt_array2[$j] == "莒光" || $stuednt_array2[$j] == "區間車") & $j != 0) echo ';';
	if(($stuednt_array2[$j] != null && $stuednt_array2[$j] != "自強") && ($stuednt_array2[$j] != null && $stuednt_array2[$j] != "莒光") && ($stuednt_array2[$j] != null && $stuednt_array2[$j] != "區間車")) { echo ','.$stuednt_array2[$j]; } else {  echo $stuednt_array2[$j]; }
}
//echo $i."&nbsp;&nbsp;:&nbsp;&nbsp;".$stuednt_array[$i]."<br />";

/*while (strpos($msg1,'<font color="Black">',$c)!=false)
{

$end=strpos($msg1,'</font>');
$str=substr($msg1,$c,$end);
$ss.=$cnt."  :  ".$str."<br />";
$cnt++;
$c+=$end;

}*/
/****
//echo $ss;
function parseurl($url)
{
$pt1=strpos($url,'SORTB_NAME=');
$pt2=strpos($url,'SORTA_ID=');
$aa=substr($url,$pt1+11,$pt2-$pt1-16);
$url=substr($url,0,$pt1+11).urlencode($aa).'&'.substr($url,$pt2);
$url=str_replace('&amp;','&',$url);
$msg=join('',file('http://bio.ktnp.gov.tw/'.$url));
//die('http://bio.ktnp.gov.tw/'.$url);
$msg=join('',file('http://bio.ktnp.gov.tw/BIOS100_21.asp?SORTB_ID=A8&SORTB_NAME=%A5%D2%B4%DF%C3%FE&SORTA_ID=A'));
while (($pt=strpos($msg,'<a HREF='))!=false)
{
$msg=substr($msg,$pt+9);
$pt1=strpos($msg,'">');
$nexturl=substr($msg,0,$pt1);

parsehtml($nexturl);
//break;
//echo $nexturl."<br/>";
}
}
function parsehtml($url)
{
$url=str_replace('&amp;','&',$url);
$msg=file_get_contents('http://bio.ktnp.gov.tw/'.$url);
$msg1=$msg;
$pt=strpos($msg,'target="_blank"'); //先跳過前面
if ((int)$pt==0) return;//找不到就跳過
$msg=substr($msg,$pt+15);
$pt=strpos($msg,'<img src="'); //先跳過前面
if ((int)$pt==0) return;//找不到就跳過
$msg=substr($msg,$pt+10);
$pt1=strpos($msg,'&width');
$imgfile=substr($msg,0,$pt1);
//echo "imgfile=$imgfile <br/>\n";
echo '<img src="http://bio.ktnp.gov.tw/'.$imgfile.'&width=250" /><br/>';
$pt=strpos($msg,'中 文 名：');
$msg=substr($msg,$pt+10);
$ptt=strpos($msg,'class="TableData">');
$msg=substr($msg,$pt+18);
$pt1=strpos($msg,'</table>');

$pt=strpos($msg1,'<td width="12%" class="TableTitle3" align="right">');
$ptt=strpos($msg1,'</table>');
$cname=substr($msg1,$pt,$ptt);
//$cname=substr($msg,0,$pt1);
$cname=str_replace("</td>","<br />",$cname);
$cname=str_replace("中 文 名：<br />","中 文 名：<div id='ch_name${c}'>",$cname);
$cname=str_replace("英 文 名：<br />","</div>英 文 名：<div id='en_name${c}'>",$cname);
$cname=str_replace("中 分 類：<br />","</div>中 分 類：<div id='type${c}'>",$cname);
$cname=str_replace("保 育 別：<br />","</div>保 育 別：<div id='care${c}'>",$cname);
$cname=str_replace("中文科名：<br />","</div>中文科名：<div id='cname${c}'>",$cname);
$cname=str_replace("英文科名：<br />","</div>英文科名：<div id='cename${c}'>",$cname);
$cname=str_replace("中文屬名：<br />","</div>中文屬名：<div id='cs${c}'>",$cname);
$cname=str_replace("學　　名：<br />","</div>學名：<div id='learn${c}'>",$cname);
$cname=str_replace("保育類別：<br />","</div>保育類別：<div id='ctype${c}'>",$cname);
$cname=str_replace("物種特性：<br />","</div>物種特性：<div id='sp${c}'>",$cname);
$cname=str_replace("　 說　　明：<br />","</div>說明：<div id='remark${c}'>",$cname);
echo $cname."</div><br/>\n";
echo '<hr />';
$c++;
}
****/
?>