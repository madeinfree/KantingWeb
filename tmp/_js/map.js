function initialize( latput , lonput , contentput ) {
	var lat = latput || '120.797768',
		 	lon = lonput || '21.945713',
		 	content = contentput || 'Welcome to 墾丁大街　！';
	//標示經緯度位置
  	var mapOptions = {
    center: new google.maps.LatLng( lon , lat ),
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
  	var map = new google.maps.Map( document.getElementById("map_canvas"), mapOptions );
  	var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div>'+
     	content+
      '</div>'+
      '</div>';

	  var infowindow = new google.maps.InfoWindow({
	      content: contentString
	  });
		//標示mark
		var myLatlng = new google.maps.LatLng( lon , lat );
		var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title:"墾丁大街"
		  });
    infowindow.open(map,marker);
}