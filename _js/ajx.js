/*
 
 *** 方法名稱：get_map_system
 *** 使用於Ajax查詢MAP資訊，回報經緯度已提供地圖之使用。
 *** Return：經緯度

 */
//全域變數
var ajax_api = new Ajax_API_Back(),
		lat,
		lon;


function get_map_system( search_key , action_key ) {
	var map_result,
			key = search_key,
			action = action_key;
	ajax_api.onreadystatechange = function() {
		if (ajax_api.readyState==4 && ajax_api.status==200 ){
			map_result = ajax_api.responseText;
    	lat = map_result.split(',')[0];
    	lon = map_result.split(',')[1];
    	content = map_result.split(',')[2];
    	initialize( lat , lon , content);
    }
	}
	ajax_api.open("GET" , "str/kanting_pro_get.php?action_type_for=1&action_doing="+action+"&food="+key , true);
	ajax_api.send();
}

//　首頁　【隨機推薦民宿飯店】　使用 //[4]
function get_random_for_index_stay() {
	var rand = parseInt((Math.random() * 3));
	$.ajax({
	type: "GET",
	cache: false,
  url: "str/kanting_pro_get.php?action_type_for=4&action_doing=get_some_random_for_index"
  //context: document.body
	}).done(function(data) {
		$('.nav-down-img:eq(2) img')[0].src = '_img/stay/'+((data.split(';')[rand]).split(','))[0]+'/main.jpg';
	 	$('#recommend_stay').html(((data.split(';')[rand]).split(','))[1].substring(0,60)+'...');
	});
}
//　首頁　【隨機推薦行程】　使用 //[5]
function get_random_for_index_travel() {
	var rand = parseInt((Math.random() * 3));
	$.ajax({
	type: "GET",
	cache: false,
  url: "str/kanting_pro_get.php?action_type_for=5&action_doing=get_some_random_for_index"
  //context: document.body
	}).done(function(data) {
		$('.nav-down-img:eq(0) img')[0].src = '_img/travel/'+((data.split(';')[rand]).split(','))[0]+'/main.jpg';
	 	$('#recommend_travel').html(((data.split(';')[rand]).split(','))[1].substring(0,60)+'...');
	});
}
//　首頁　【隨機推薦美食】　使用 //[6]
function get_random_for_index_food() {
	var rand = parseInt((Math.random() * 3));
	$.ajax({
	type: "GET",
	cache: false,
  url: "str/kanting_pro_get.php?action_type_for=6&action_doing=get_some_random_for_index"
  //context: document.body
	}).done(function(data) {
		$('.nav-down-img:eq(1) img')[0].src = '_img/food/'+((data.split(';')[rand]).split(','))[0]+'/main.jpg';
	 	$('#recommend_food').html(((data.split(';')[rand]).split(','))[1].substring(0,60)+'...');
	});
}
//　首頁　【隨機推薦美食】　使用 //[7]
function get_random_for_index_organism() {
	var rand = parseInt((Math.random() * 3));
	$.ajax({
	type: "GET",
	cache: false,
  url: "str/kanting_pro_get.php?action_type_for=7&action_doing=get_some_random_for_index"
  //context: document.body
	}).done(function(data) {
		$('.nav-down-img:eq(3) img')[0].src = '_img/organism/'+((data.split(';')[rand]).split(','))[0]+'/main.jpg';
	 	$('#recommend_organism').html(((data.split(';')[rand]).split(','))[1].substring(0,60)+'...');
	});
}

//　綜合導覽　【隨機推薦旅遊】　使用
function get_random_tourism() {
	$.ajax({
	type: "GET",
	cache: false,
  url: "str/kanting_pro_get.php?action_type_for=2&action_doing=get_some_random_tourism"
  //context: document.body
	}).done(function(data) {
	 	$('#main-title-font')[0].innerHTML = data.split(',')[2] + 
	 		'<span style="color: red; font-size:15px"><strong>　隨機推薦</strong></span>';
	 	$('#main-table')[0].innerHTML = '<tr><td rowspan="8"><!--img src="_img/hotel.jpg" width="270" height="250"--></td><td>'+
	 	'【旅遊地點】 '+data.split(',')[5]+'<br />'+
	 	'【旅遊天數】 '+data.split(',')[6]+'<br />'+
	 	'【行程路線】 '+data.split(',')[7]+'<br />'+
	 	'【出發時間】 '+data.split(',')[8]+'<br />'+
	 	'【銷售期限】 '+data.split(',')[9]+'<br />'+
	 	'【使用期限】 '+data.split(',')[10]+'<br />'+
	 	'【集合地點】 '+data.split(',')[11]+'<br />'+
	 	'【最低人數】 '+data.split(',')[12]+'<br />'+
	 	'【電話訂購】 '+data.split(',')[13]+
	 	'</tr>';
	});
}

//行程唷~
function travel_list() {
	$('#menu-title-list ul li small:eq(0)')[0].addEventListener('click', main_travel);
	$('#menu-title-list ul li small:eq(1)')[0].addEventListener('click', main_travel);
	$('#menu-title-list ul li small:eq(2)')[0].addEventListener('click', main_travel);
	$('#menu-title-list ul li small:eq(3)')[0].addEventListener('click', main_travel);
}

function main_travel() {
	if($('#menu-title-list ul li small:eq(0)')[0] === this) {
		travel_action(1);
	}
	if($('#menu-title-list ul li small:eq(1)')[0] === this) {
		travel_action(2);
	}
	if($('#menu-title-list ul li small:eq(2)')[0] === this) {
		travel_action(3);
	}
	if($('#menu-title-list ul li small:eq(3)')[0] === this) {
		travel_action(4);
	}
}

//行程結束了唷~