<?php include "_header.php"; ?>

<section id="beranda" class="p-5 bg-white dark:bg-gray-900">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full self-center px-4 lg:w-1/2">
                <h1 class="text-base font-semibold text-primary dark:text-white md:text-xl">Pemetaan Kost di<span
                        class="mt-1 block text-4xl font-bold text-dark dark:text-white lg:text-5xl">Kecamatan
                        Dramaga</span></h1>
                <p class="mb-8 mt-3 font-medium leading-relaxed dark:text-gray-400 text-secondary">Temukan rekomendasi
                    pilihan
                    kost
                    terbaik disini
                </p>
                <a href="#tentang"
                    class="relative inline-flex items-center rounded-full justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-gray-800 dark:text-white bg-gray-800 dark:bg-gray-100 group">
                    <span
                        class="absolute w-0 h-0 transition-all duration-500 ease-out bg-green-500 rounded-full group-hover:w-56 group-hover:h-56"></span>
                    <span
                        class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-gray-700 dark:to-gray-100"></span>
                    <span class="relative text-white dark:text-gray-800 dark:hover:text-white">Selengkapnya</span>
                </a>
            </div>
            <div class="w-full self-end px-4 lg:w-1/2">
                <div class="relative mt-10 lg:right-0 lg:mt-9">
                    <img src="assets/hero.png" alt="gambar hero section" class="relative z-10 mx-auto max-w-full" />
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="bg-white dark:bg-gray-900">
    <div class="py-2 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Apa itu GeoKost.ID ?</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">GeoKost.ID
            merupakan salah satu
            website sistem informasi geografis pemetaan kost dengan wilayah Kecamatan Dramaga yang dapat
            memudahkan penggunanya untuk
            menemukan kost terbaik di wilayah tersebut
        </p>
        <div class="relative mt-10 lg:center-0 lg:mt-9">
            <img src="assets/room.png" alt="gambar hero section" class="relative object-cover z-10 mx-auto max-w-lg" />
        </div>
    </div>
</section>

<section id="fitur" class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="py-2 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Fitur Pemetaan</h1>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Berikut beberapa fitur pada sistem informasi
                geografis
                pemetaan kost di Kecamatan Dramaga</p>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 text-center">
            <div
                class="clay p-6 bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden md:max-w-2xl my-5 transform translate-y-4 hover:translate-y-0 duration-500 ease-in-out">
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">
                    Batas Wilayah
                </h3>
                <p class="text-sm leading-6 text-gray-500 sm:text-xl dark:text-gray-400">
                    Pada peta terdapat batas wilayah Kecamatan Dramaga dalam bentuk geojson
                </p>
            </div>
            <div
                class="clay p-6 bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden md:max-w-2xl my-5 transform translate-y-4 hover:translate-y-0 duration-500 ease-in-out">
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">
                    Marker
                </h3>
                <p class="text-sm leading-6 text-gray-500 sm:text-xl dark:text-gray-400">
                    Marker pada peta menunjukkan posisi kost pada Kecamatan Dramaga
                </p>
            </div>
            <div
                class="clay p-6 bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden md:max-w-2xl my-5 transform translate-y-4 hover:translate-y-0 duration-500 ease-in-out">
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">
                    Rute
                </h3>
                <p class="text-sm leading-6 text-gray-500 sm:text-xl dark:text-gray-400">
                    Terdapat fitur rute menuju lokasi kost dari posisi pengguna berada
                </p>
            </div>
            <div
                class="clay p-6 bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden md:max-w-2xl my-5 transform translate-y-4 hover:translate-y-0 duration-500 ease-in-out">
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">
                    Kontrol Peta
                </h3>
                <p class="text-sm leading-6 text-gray-500 sm:text-xl dark:text-gray-400">
                    Dapat menggunakan beberapa fitur pada peta Google API Maps
                </p>
            </div>
        </div>
    </div>
</section>

<section id="peta" class="p-5 bg-white dark:bg-gray-900">
    <div class="py-2 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <h1
            class="text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Pemetaan Kost
        </h1>

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
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQLHdoWey-cwIO1xUeoVHndtVZyKT12NA&callback=initMap&v=weekly">
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
                            img: "<?= $row['image'] != "" ? "<br><img src='assets/iapages/maps/" . $row['image'] . "' width='180px'>" : null ?>",
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
    </div>
</section>

<?php include "_footer.php"; ?>