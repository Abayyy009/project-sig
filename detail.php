<?php
include "header.php";

// Ambil parameter ID dari URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID kost tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Query untuk mengambil data kost berdasarkan ID
$query = $pdo->prepare("SELECT * FROM maps WHERE id = :id");
$query->execute(['id' => $id]);
$kost = $query->fetch();

if (!$kost) {
    echo "<script>alert('Data kost tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}
?>

<!-- Spacer untuk navbar fixed -->
<br><br><br>

<!-- Detail Kost Section -->
<section id="detail" class="p-5 bg-white dark:bg-gray-900">
    <div class="container mx-auto max-w-4xl">
        <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Detail Kost: <?= htmlspecialchars($kost['title']) ?>
        </h1>

        <div class="mt-8 space-y-6">
            <?php if (!empty($kost['image'])): ?>
                <img src="assets/images/maps/<?= htmlspecialchars($kost['image']) ?>"
                    alt="<?= htmlspecialchars($kost['title']) ?>" class="w-2/3 mx-auto rounded-lg shadow-lg" />
            <?php endif; ?>

            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Deskripsi:</h2>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    <?= !empty($kost['description']) ? htmlspecialchars($kost['description']) : "Deskripsi tidak tersedia." ?>
                </p>
            </div>

            <?php if (!empty($kost['info'])): ?>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Informasi Tambahan:</h2>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        <?= htmlspecialchars_decode($kost['info']); ?>
                    </p>
                </div>
            <?php endif; ?>

            <!-- Lokasi Peta -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Lokasi:</h2>
                <div id="map-canvas" class="w-full h-96 mt-4 rounded-lg shadow-lg"></div>
            </div>

            <!-- Tombol Kembali -->
            <div class="pt-4">
                <a href="index2.php"
                    class="relative inline-flex items-center justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-white bg-gray-800 rounded-full group dark:bg-gray-100 dark:text-gray-800">
                    <span
                        class="absolute w-0 h-0 transition-all duration-500 ease-out bg-green-500 rounded-full group-hover:w-56 group-hover:h-56"></span>
                    <span
                        class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-gray-700 dark:to-gray-100"></span>
                    <span class="relative">Kembali Ke Peta</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps Script -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQLHdoWey-cwIO1xUeoVHndtVZyKT12NA&callback=initMap&v=3.31">
    </script>

<script>
    function initMap() {
        const kostLocation = {
            lat: <?= $kost['latitude'] ?>,
            lng: <?= $kost['longitude'] ?>
        };

        const map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 15,
            center: kostLocation
        });

        const marker = new google.maps.Marker({
            position: kostLocation,
            map: map,
            title: "<?= htmlspecialchars($kost['title']) ?>"
        });

        const infoWindow = new google.maps.InfoWindow({
            content: `<b><?= htmlspecialchars($kost['title']) ?></b><br><?= htmlspecialchars($kost['description']) ?>`
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    }
</script>

<?php include "footer.php"; ?>