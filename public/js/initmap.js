let map, activeInfoWindow, markers = [];

/* ----------------------------- Initialize Map ----------------------------- */
function initMap() {
    const centerCoordinates = {
        lat: {{ $latitude }
},
lng: { { $longitude } }
    };


map = new google.maps.Map(document.getElementById("map"), {
    center: centerCoordinates,
    zoom: 15
});

map.addListener("click", function (event) {
    mapClicked(event);
});
initMarkers();
    }

/* --------------------------- Initialize Markers --------------------------- */
function initMarkers() {
    const initialMarkers = @json($initialMarkers);

    for (let index = 0; index < initialMarkers.length; index++) {
        const markerData = initialMarkers[index];
        const marker = new google.maps.Marker({
            position: markerData.position,
            label: markerData.label,
            draggable: markerData.draggable,
            map
        });
        markers.push(marker);

        const infowindow = new google.maps.InfoWindow({
            content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
        });
        marker.addListener("click", (event) => {
            if (activeInfoWindow) {
                activeInfoWindow.close();
            }
            infowindow.open({
                anchor: marker,
                shouldFocus: false,
                map
            });
            activeInfoWindow = infowindow;
            markerClicked(marker, index);
        });

        marker.addListener("dragend", (event) => {
            markerDragEnd(event, index);
        });
    }
}

/* ------------------------- Handle Map Click Event ------------------------- */
function mapClicked(event) {
    console.log(map);
    console.log(event.latLng.lat(), event.latLng.lng());
}

/* ------------------------ Handle Marker Click Event ----------------------- */
function markerClicked(marker, index) {
    console.log(map);
    console.log(marker.position.lat());
    console.log(marker.position.lng());
}

/* ----------------------- Handle Marker DragEnd Event ---------------------- */
function markerDragEnd(event, index) {
    console.log(map);
    console.log(event.latLng.lat());
    console.log(event.latLng.lng());
}