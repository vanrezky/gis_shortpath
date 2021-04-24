<?= $map['js']; ?>
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Text</label>
                            <input type="text" id="myPlaceTextBox" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="hero-content">
                    <?= $map['html'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var marker; // global new marker
    var terdekat = []; // global terdekat

    function mapClicked(markerOptions) {
        createMarker(markerOptions);
    }

    function createMarker(markerOptions) {
        if (marker == undefined) {
            marker = new google.maps.Marker(markerOptions);
        } else {
            marker.setPosition(markerOptions.position);
        }

        find_closest_marker(markerOptions);
        return marker;
    }

    function rad(x) {
        return x * Math.PI / 180;
    }

    function find_closest_marker(event) {
        var lat = event.position.lat();
        var lng = event.position.lng();
        var R = 6371; // radius of earth in km
        var distances = [];
        var closest = -1;
        terdekat = [];
        for (i = 0; i < markers_map.length; i++) {
            var mlat = markers_map[i].position.lat();
            var mlng = markers_map[i].position.lng();
            var title = markers_map[i].title;
            var dLat = rad(mlat - lat);
            var dLong = rad(mlng - lng);
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            distances[i] = d;

            //tambahkan jarak ke dalam marker
            markers_map[i].distance = d;
            // masukkan ke terdekat
            terdekat.push(markers_map[i]);

            if (closest == -1 || d < distances[closest]) {
                closest = i;
            }
        }

        terdekat.sort(function(a, b) {
            return a.distance - b.distance;
        });

        console.log(terdekat);

        alert(markers_map[closest].title);

    }
</script>