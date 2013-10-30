/* ajax tool

 * 1. 回傳瀏覽器專用之【API】

 */

 function Ajax_API_Back() {
 	/*..Start..*/
 	var re_api;
 	if(window.XMLHttpRequest) { //給 IE7UP / Chrome / Opera / Safari / Firefox
 		return re_api = new XMLHttpRequest();
 	} else { //給 IE6 / IE5
 		return re_api = new ActiveXObject("Microsoft.XMLHTTP");
 	}
 	/*..End..*/
 }