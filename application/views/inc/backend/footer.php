<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bersiap Untuk Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan "Logout" dibawah jika kamu infin keluar dari aplikasi dan mengakhiri sesi login</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout/') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url(); ?>assets/sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/sb_admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->

<script src="<?= base_url(); ?>assets/sb_admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/sb_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- sweetalert -->

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/sb_admin/js/demo/datatables-demo.js"></script>
<script>
    // untuk isi form 
    function setMapToForm(latitude, longitude) {
        $('input[name="latitude"]').val(latitude);
        $('input[name="longitude"]').val(longitude);
    }

    // ganti lokasi saat drag
    function newLocationDrag(newLat, newLng) {
        map.setCenter({
            lat: newLat,
            lng: newLng
        });

        // lempar newLat dan new Lng ke setMapToForm
        setMapToForm(newLat, newLng);
        // animasi
        map.panTo(map.getCenter());
    }

    // untuk ganti lokasi marker saat click
    function newLocationClick(newLat, newLng) {
        // set center map
        map.setCenter({
            lat: newLat,
            lng: newLng
        });
        // set marker posisi
        // marker_van.setPosition(new google.maps.LatLng(newLat, newLng));

        // lempar newLat dan new Lng ke setMapToForm
        setMapToForm(newLat, newLng);

        // set marker posisi ditengah
        marker_van.setPosition(map.getCenter());

        // set zoom 
        map.setZoom(14);
        // animasi 
        map.panTo(map.getCenter());
    }

    // function newLocationDragMap() {
    //     var latLng = map.getCenter();
    //     setMapToForm(latLng.lat(), latLng.lng());
    //     marker_van.setPosition(latLng);
    // }

    function createMarker_map2(markerOptions) {
        deleteOneMarker();
        var marker = new google.maps.Marker(markerOptions);
        markers_map.push(marker);
        lat_longs_map.push(marker.getPosition());
        return marker;
    }

    function deleteOneMarker() {
        markers_map[1].setMap(null);
        markers_map[1].setMap(map);
    }

    function deleteMarkers() {
        clearMarkers();
        markers_map = [];
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        console.log(markers_map.length);
        for (let i = 0; i < markers_map.length; i++) {
            markers_map[i].setMap(map);
        }
    }
</script>


</body>

</html>