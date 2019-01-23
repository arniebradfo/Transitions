// jquery.gMap.js
// this comes from the CodyHouse blog - http://codyhouse.co/gem/custom-google-map/
// google maps API js documentation - https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType

function gMap() {

	if ( $('#google-container').length ) {

		//set your google maps parameters
		var latitude = 41.7313039,
			longitude = -111.8189167,
			map_zoom = 12,
			markerLatitude = 41.739,
			markerLongitude = -111.8339;
			
		//define the basic color of your map, plus a value for saturation and brightness
		var	main_color = '#2d313f', // not used
			saturation_value= -20,
			brightness_value= 5; // also not used 

		//we define here the style of the map
		var style= [ 
			{
				//set saturation for the labels on the map
				elementType: "labels",
				stylers: [
					{saturation: saturation_value}
				]
			},  
		    {	
		    	//poi stands for point of interest - don't show these lables on the map 
				featureType: "poi",
				elementType: "labels",
				stylers: [
					{visibility: "off"}
				]
			},
			{
				//don't show road lables on the map
		        featureType: 'road',
		        elementType: 'labels',
		        stylers: [
		            {visibility: "off"}
		        ]
		    }, 
		   	{
				//don't show transit lables on the map
		        featureType: 'transit',
		        elementType: 'labels',
		        stylers: [
		            {visibility: "off"}
		        ]
		    }, 
			{
				//don't show road lables on the map
				featureType: "road",
				elementType: "geometry.stroke",
				stylers: [
					{visibility: "off"}
				]
			},
		];
			
		//set google map options
		var map_options = {
	      	center: new google.maps.LatLng(latitude, longitude),
	      	zoom: map_zoom,
	      	draggable: false,
	      	panControl: false,
	      	zoomControl: false,
	      	mapTypeControl: false,
	      	streetViewControl: false,
	      	mapTypeId: google.maps.MapTypeId.ROADMAP,
	      	// mapTypeId: google.maps.MapTypeId.TERRAIN, // takes too long to load - set map_zoom to 14
	      	// tilt:45, // only works on SATELLITE & HYBRID mapType view
	      	scrollwheel: false,
	      	styles: style,
	    }
	    //inizialize the map
		var map = new google.maps.Map(document.getElementById('google-container'), map_options);
		//add a custom marker to the map				
		var marker = new google.maps.Marker({
		  	position: new google.maps.LatLng(markerLatitude, markerLongitude),
		    map: map,
		    visible: true,
		});

		// create a DOM element with the zoom in and out controls
		var zoomControlDiv = document.createElement('div');
	 	var zoomControl = new CustomZoomControl(zoomControlDiv, map);

	  	//insert the zoom div on the top left of the map
	  	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
	}
}

//add custom buttons for the zoom-in/zoom-out on the map
function CustomZoomControl(controlDiv, map) {

	//grap the zoom elements from the DOM and insert them in the map 
  	var controlUIzoomIn= document.getElementById('cd-zoom-in'),
  		controlUIzoomOut= document.getElementById('cd-zoom-out');
  	controlDiv.appendChild(controlUIzoomIn);
  	controlDiv.appendChild(controlUIzoomOut);
  	controlDiv.style.right='0px';

	// Setup the click event listeners and zoom-in or out according to the clicked element
	google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
	    map.setZoom(map.getZoom()+1)
	});
	google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
	    map.setZoom(map.getZoom()-1)
	});
}