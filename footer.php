<footer class="bg-white border-t border-gray-200 pt-10 pb-6">
    <div class="container mx-auto px-8">
        <div class="flex flex-wrap justify-between">

            <div class="w-full md:w-1/4 mb-6">
                <h2 class="text-2xl font-bold text-green-600 mb-2">GeoKost.ID</h2>
                <p class="text-gray-600 text-sm">Solusi mudah cari kost terbaik di Kecamatan Dramaga. Cek peta,
                    bandingkan fasilitas, dan langsung hubungi pemiliknya!</p>
            </div>

            <div class="w-full md:w-1/5 mb-6">
                <h4 class="text-gray-800 font-semibold mb-3">Menu</h4>
                <ul class="text-gray-600 space-y-2">
                    <li><a href="#home" class="hover:text-green-600">Beranda</a></li>
                    <li><a href="#peta" class="hover:text-green-600">Peta Kost</a></li>
                    <li><a href="#faq" class="hover:text-green-600">FAQ</a></li>
                </ul>
            </div>

            <div class="w-full md:w-1/5 mb-6">
                <h4 class="text-gray-800 font-semibold mb-3">Legal</h4>
                <ul class="text-gray-600 space-y-2">
                    <li><a href="#" class="hover:text-green-600">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-green-600">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div class="w-full md:w-1/5 mb-6">
                <h4 class="text-gray-800 font-semibold mb-3">Ikuti Kami</h4>
                <ul class="text-gray-600 space-y-2">
                    <li><a href="#" class="hover:text-green-600">Instagram</a></li>
                    <li><a href="#" class="hover:text-green-600">Facebook</a></li>
                    <li><a href="#" class="hover:text-green-600">LinkedIn</a></li>
                </ul>
            </div>

        </div>

        <div class="text-center text-gray-500 text-sm mt-10">
            &copy; 2025 GeoKost.ID. All rights reserved. | Design inspiration by <a
                href="https://www.freepik.com/free-photos-vectors/background"
                class="text-green-500 hover:underline">Freepik</a>
        </div>
    </div>
</footer>

<!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->

<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener('scroll', function () {

        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
            header.classList.add("bg-white");
            navaction.classList.remove("bg-white");
            navaction.classList.add("gradient");
            navaction.classList.remove("text-gray-800");
            navaction.classList.add("text-white");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-gray-800");
                toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
            navcontent.classList.remove("bg-gray-100");
            navcontent.classList.add("bg-white");
        } else {
            header.classList.remove("bg-white");
            navaction.classList.remove("gradient");
            navaction.classList.add("bg-white");
            navaction.classList.remove("text-white");
            navaction.classList.add("text-gray-800");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
            }

            header.classList.remove("shadow");
            navcontent.classList.remove("bg-white");
            navcontent.classList.add("bg-gray-100");

        }

    });
</script>

<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>

<!-- AOS Library JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // animasi hanya muncul sekali
        duration: 800, // durasi animasi (ms)
    });
</script>


</body>

</html>