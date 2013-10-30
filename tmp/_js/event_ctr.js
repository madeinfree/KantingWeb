/*

 * 事件控制項目
 
 */

(function( window ) {

	//元素
	var maps_search = document.getElementById('maps-search');
	//取內容
	var maps_key_get = document.getElementsByTagName('input')[0];


	//maps_search事件
	maps_search.addEventListener('click' , function() {
		get_map_system(maps_key_get.value , 'get_some_food_for_map');
	});


}(window));