function initialize() {
var myLatlng = new google.maps.LatLng(23.811885,90.3627442);
//var myLatlng = new google.maps.LatLng(23.814226,90.359259);
var mapOptions = {zoom: 12,center: myLatlng}
var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
var marker = new google.maps.Marker({position: myLatlng,map: map,title: 'eBangali.com'
});
}
google.maps.event.addDomListener(window, 'load', initialize);