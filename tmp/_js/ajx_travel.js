var travel_action = function( action ) {
	var key = '';
	switch(action) {
		case 1:
			key = '半日遊';
			break;
		case 2:
			key = '一日遊';
			break;
		case 3:
			key = '二日遊';
			break;
		case 4:
			key = '三日遊';
			break;
		default:
			key = '';
			break;
	}
//if( action === 1 ) {
$.ajax({
	type: "GET",
	cache: true,
  url: "str/kanting_pro_get.php?action_type_for=3&action_doing=get_some_half_tourism&day_key="+key,
  //context: document.body
	}).done(function(data) {
		var temp_table = '<table width="600" style="margin-top:10px; margin-bottom:10px;">';
		var temp_tablend = '</table>';
		var temp ='';
		$('#main-title').remove();
	 	$('#main-title-font').remove();
	 	$('#main-content').remove();
		 	for(var i = 0 ; i < (data.split(';')).length-1 ; i++) {
		 		if(i !== 0) { temp += '<tr>'; }
		 		temp +='<td colspan="4" style="text-align:center; font-weight:900; background-color: #EBF5FF;">'+(data.split(';')[i]).split(',')[0]+'</td>';
		 		temp +='<tr>';
		 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[1]+'</td>';
		 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[2]+'</td>';
		 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[3]+'</td>';
		 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[4]+'</td>';
		 		temp +='</tr>';
		 		if(i !== 0) { '</tr>'; }
		 	}
	 	$('#main').html('<span style="font-size:2em; color:red;">墾丁'+key+'</span><br />'+temp_table+temp+temp_tablend);
	});
}
//	}
/*if(action === 2) {
	$.ajax({
			type: "GET",
			cache: true,
		  url: "str/kanting_pro_get.php?action_type_for=3&action_doing=get_some_half_tourism&day_key=一日遊"
		  //context: document.body
			}).done(function(data) {
				var temp_table = '<table width="600" style="margin-top:10px; margin-bottom:10px;">';
				var temp_tablend = '</table>';
				var temp ='';
				$('#main-title').remove();
			 	$('#main-title-font').remove();
			 	$('#main-content').remove();
				 	for(var i = 0 ; i < (data.split(';')).length-1 ; i++) {
				 		if(i !== 0) { temp += '<tr>'; }
				 		temp +='<td colspan="4" style="text-align:center; font-weight:900; background-color: #EBF5FF;">'+(data.split(';')[i]).split(',')[0]+'</td>';
				 		temp +='<tr>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[1]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[2]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[3]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[4]+'</td>';
				 		temp +='</tr>';
				 		if(i !== 0) { '</tr>'; }
				 	}
			 	$('#main').html('<span style="font-size:2em; color:red;">墾丁半日遊</span><br />'+temp_table+temp+temp_tablend);
			});
}
if(action === 3) {
	$.ajax({
			type: "GET",
			cache: true,
		  url: "str/kanting_pro_get.php?action_type_for=3&action_doing=get_some_half_tourism&day_key=二日遊"
		  //context: document.body
			}).done(function(data) {
				var temp_table = '<table width="600" style="margin-top:10px; margin-bottom:10px;">';
				var temp_tablend = '</table>';
				var temp ='';
				$('#main-title').remove();
			 	$('#main-title-font').remove();
			 	$('#main-content').remove();
				 	for(var i = 0 ; i < (data.split(';')).length-1 ; i++) {
				 		if(i !== 0) { temp += '<tr>'; }
				 		temp +='<td colspan="4" style="text-align:center; font-weight:900; background-color: #EBF5FF;">'+(data.split(';')[i]).split(',')[0]+'</td>';
				 		temp +='<tr>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[1]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[2]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[3]+'</td>';
				 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[4]+'</td>';
				 		temp +='</tr>';
				 		if(i !== 0) { '</tr>'; }
				 	}
			 	$('#main').html('<span style="font-size:2em; color:red;">墾丁半日遊</span><br />'+temp_table+temp+temp_tablend);
			});
}
if(action === 4) {
	$.ajax({
		type: "GET",
		cache: true,
	  url: "str/kanting_pro_get.php?action_type_for=3&action_doing=get_some_half_tourism&day_key=三日遊"
	  //context: document.body
		}).done(function(data) {
			var temp_table = '<table width="600" style="margin-top:10px; margin-bottom:10px;">';
			var temp_tablend = '</table>';
			var temp ='';
			$('#main-title').remove();
		 	$('#main-title-font').remove();
		 	$('#main-content').remove();
			 	for(var i = 0 ; i < (data.split(';')).length-1 ; i++) {
			 		if(i !== 0) { temp += '<tr>'; }
			 		temp +='<td colspan="4" style="text-align:center; font-weight:900; background-color: #EBF5FF;">'+(data.split(';')[i]).split(',')[0]+'</td>';
			 		temp +='<tr>';
			 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[1]+'</td>';
			 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[2]+'</td>';
			 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[3]+'</td>';
			 		temp +='<td style="font-size="5px;text-align:center;font-weight:900;">'+(data.split(';')[i]).split(',')[4]+'</td>';
			 		temp +='</tr>';
			 		if(i !== 0) { '</tr>'; }
			 	}
		 	$('#main').html('<span style="font-size:2em; color:red;">墾丁半日遊</span><br />'+temp_table+temp+temp_tablend);
		});
	}
}*/