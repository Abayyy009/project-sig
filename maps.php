<?php include "_header.php"; ?>

<div class="span1">
    <div class="content">
        <div class="module">
            <div class="module-body" style="padding: 120px;">
                <div id="map-canvas" style="height: 520px;"></div>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQLHdoWey-cwIO1xUeoVHndtVZyKT12NA&callback=initMap&v=3.31">
    </script>

<?php $query_maps = $pdo->query("SELECT * FROM maps"); ?>
<script>
    function initMap() {
        var locations = [
            <?php foreach ($query_maps->fetchAll() as $row) { ?>
                                                        {
                    lat: <?= $row['latitude'] ?>,
                    lng: <?= $row['longitude'] ?>,
                    title: "<?= $row['title'] ?>",
                    description: "<?= $row['description'] != '' ? '<a href=\'' . $row['description'] . '\' target=\'_blank\'>' . htmlspecialchars($row['description']) . '</a>' : 'Tidak ada deskripsi' ?>",
                    img: "<?= $row['image'] != "" ? "<br><img src='assets/images/maps/" . $row['image'] . "' width='180px'>" : null ?>",
                    id: "<?= $row['id'] ?>"
                },
            <?php } ?>
        ];

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: <?= $data_setting['map_zoom'] ?>,
            center: locations[0]
        });

        locations.forEach(function (loc) {
            var marker = new google.maps.Marker({
                position: loc,
                map: map,
                title: loc.title
            });

            var infowindow = new google.maps.InfoWindow({
                content: "<div style='overflow:auto; width: 200px;'>" +
                    "<b style='font-size:15px'>" + loc.title + "</b><br>" +
                    loc.description + loc.info + loc.img +
                    "<br><br><a href='detail.php?id=" + loc.id + "' " +
                    "style='display:inline-block; padding:8px 16px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;'>" +
                    "Detail Kost</a>" +
                    "</div>"
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        });
    }
</script>

<?php include "_footer.php"; ?>