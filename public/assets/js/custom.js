$(":input").inputmask();
var placeSearch, autocomplete;
var componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    sublocality: "long_name",
    administrative_area_level_1: "long_name",
    administrative_area2: "short_name",
    country: "long_name",
    postal_code: "short_name"
};

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete"),
        { types: ["geocode"] }
    );
    autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
    var itemMap = {
        route: "street",
        latitude: "latitude",
        longitude: "longitude",
        locality: "city",
        administrative_area_level_1: "state",
        country: "country",
        postal_code: "zip"
    };
    var items = {};
    var place = autocomplete.getPlace();
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
    items["latitude"] = latitude;
    items["longitude"] = longitude;
    jQuery("#LocationForm input[name='autocomplete']").val(place.name);

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            items[addressType] = val;
        }
    }
    jQuery(".address-compnents").html("");
    for (var key of Object.keys(items)) {
        jQuery(".address-compnents").append(
            '<input type="hidden" name="' +
                itemMap[key] +
                '" value="' +
                items[key] +
                '" />'
        );
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
