if (document.getElementById('prof-map')) {
    function initialize() {
        console.log('asdasd');
        /**Default map properties**/
        var mapProp = {
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            language:'ru'
        };

        var map = new google.maps.Map(document.getElementById('prof-map'), mapProp);

        /**Create map marker**/
        var marker = new google.maps.Marker({
            map: map
        });
        /**Create info window**/
        var infowindow = new google.maps.InfoWindow();

        /**Create new geocode object **/
        var geocoder = new google.maps.Geocoder;
        var coordinates = document.getElementById('coordinates');
        var initialLocation;
        var browserSupportFlag =  new Boolean();

        /**Default google-maps object of defCoordinates**/
        if(typeof defCoordinates !== "undefined"){
            var defLatLng = new google.maps.LatLng(defCoordinates.lat, defCoordinates.lng);
            map.setCenter(defLatLng);
            marker.setPosition(defLatLng);
            geocoder.geocode({'latLng': defLatLng}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        coordinates.value = results[0].place_id;
                        infowindow.setContent(results[0].formatted_address);
                    }
                }
            });
        }else{
            /**Position autodetect if necessary**/
            if(navigator.geolocation) {
                browserSupportFlag = true;
                navigator.geolocation.getCurrentPosition(function(position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                    map.setCenter(initialLocation);
                    marker.setPosition(initialLocation);
                    geocoder.geocode({'latLng': initialLocation}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                coordinates.value = results[0].place_id;
                                infowindow.setContent(results[0].formatted_address);
                            }
                        }
                    });
                    /**User denied browser geolocation**/
                }, function () {
                    handleNoGeolocation(browserSupportFlag);
                });
            }
            /**Browser doesn't support Geolocation***/
            else {
                browserSupportFlag = false;
                handleNoGeolocation(browserSupportFlag);
            }

            function handleNoGeolocation(errorFlag) {
                if (errorFlag == true) {
                    var noGeoLocation = { "lat": 50.43603083262606,  "lng": 30.52825927734375};
                    var defLat = new google.maps.LatLng(noGeoLocation.lat, noGeoLocation.lng);
                    map.setCenter(defLat);
                    marker.setPosition(defLat);
                    geocoder.geocode({'latLng': defLat}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                coordinates.value = results[0].place_id;
                                infowindow.setContent(results[0].formatted_address);
                            }
                        }
                    });
                }
            }
        }

        infowindow.open(map, marker);

        /**Geocode default coordinates into adress**/
        geocoder.geocode({'latLng': defLatLng}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    infowindow.setContent(results[0].formatted_address);
                }
            }
        });

        /**Select the adress input field**/
        var addressInput = document.getElementById("address-input");

        /**Create the search box and link it to the UI element.**/
        var addressComplete = new google.maps.places.Autocomplete(addressInput);

        /**Function that find address, fired on events**/
        function findAddress (){
            var queryMatched = $(".pac-container:last .pac-item:first");
            if (queryMatched.length) {
                var firstResult = queryMatched.text();
                geocoder.geocode({"address": firstResult}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.close();
                            marker.setPosition(results[0].geometry.location);
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setZoom(16);
                            map.setCenter(results[0].geometry.location);
                            coordinates.value = results[0].place_id;
                            addressInput.value = results[0].formatted_address;
                            addressInput.blur();
                        }
                    }
                });
            }
        }

        /**Initialize findAddress function on keypress event**/
        addressInput.addEventListener("keypress", function (e) {
            e.stopPropagation();
            if(e.keyCode == 13) {
                findAddress();
            }
        });

        /**
         * Listen for the event fired when the user selects a prediction and retrieve more details for that place.
         * Map search-autocomplete method
         *
         * */
        addressComplete.addListener('place_changed', function () {
            var place = addressComplete.getPlace();
            if(!place.geometry){
                return false;
            } else {
                infowindow.close();
                map.setZoom(17);
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);
                addressInput.value = place.formatted_address;
                addressInput.blur();
            }
        });

        /**Event that select coordinates on click location and geocode it to adress, and set marker with adress info onto the map**/
        google.maps.event.addListener(map, 'click', function (event){
            var latLang = event.latLng;
            geocoder.geocode({'latLng': latLang}, function (results, status){
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        coordinates.value = results[0].place_id;
                        map.setZoom(17);
                        marker.setPosition(latLang);
                        infowindow.setContent(results[0].formatted_address);
                        addressInput.value = results[0].formatted_address;
                        infowindow.open(map, marker);
                        map.setCenter(latLang);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        });
    }

    /**Init google maps complex function on document load**/
    google.maps.event.addDomListener(window, 'load', initialize);

}
