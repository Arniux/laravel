<style>



#map {height:300px ;width:100%; }
.geocoder {
  left: 350px; top:290px;
}
</style>


<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />



<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: user_location,
    zoom: 3.5
});
//  geocoder here
var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    // limit results to Australia
    //country: 'IN',
});

var marker ;

// After the map style has loaded on the page, add a source layer and default
// styling for a single point.
map.on('load', function() {
    addMarker(user_location,'load');
    add_markers(saved_markers);

    // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
    // makes a selection and add a symbol that matches the result.
    geocoder.on('result', function(ev) {
        alert("aaaaa");
        console.log(ev.result.center);

    });
});
map.on('click', function (e) {
    marker.remove();
    addMarker(e.lngLat,'click');
    //console.log(e.lngLat.lat);
    document.getElementById("lat").value = e.lngLat.lat;
    document.getElementById("lng").value = e.lngLat.lng;

});

function addMarker(ltlng,event) {

    if(event === 'click'){
        user_location = ltlng;
    }
    marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
        .setLngLat(user_location)
        .addTo(map)
        .on('dragend', onDragEnd);
}
function add_markers(coordinates) {

    var geojson = (saved_markers == coordinates ? saved_markers : '');

    console.log(geojson);
    // add markers to map
    geojson.forEach(function (marker) {
        console.log(marker);
        // make a marker for each feature and add to the map
        new mapboxgl.Marker()
            .setLngLat(marker)
            .addTo(map);
    });

}

function onDragEnd() {
    var lngLat = marker.getLngLat();
    document.getElementById("lat").value = lngLat.lat;
    document.getElementById("lng").value = lngLat.lng;
    console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
}

$('#add-airport').submit(function(event){
    event.preventDefault();
    var lat = $('#lat').val();
    var lng = $('#lng').val();
    var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            alert(data);
            location.reload();
        }
    });
});




</script>