<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password']) || $_SESSION['level'] !== 'admin') {
    echo "<script>alert('Anda tidak memiliki akses'); window.location = '../pages/login.php'</script>";
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Header -->
    <?php
    include '../component/header.php';
    ?>

    <body>

        <!-- Navbar -->
        <?php
        include '../component/navbar.php';
        ?>

        <!-- Jumbotron -->
        <?php
        include '../component/jumbotron.php';
        ?>

        <!-- Data Tabel -->
        <div class="bg-white dark:bg-gray-900 p-8 m-8">
            <h1 class="text-2xl w-full font-semibold bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4">Tambah Data Mobil</h1>



            <!-- Tambah Data -->
            <a href="../pages/dashboard_car.php">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</button>
            </a>


        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-900 flex">
            <div class="justify-center items-center w-full p-8 m-8">
                <form method="post" action="../services/insert_cars.php">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plat Nomor</label>
                            <input type="text" name="no_plat_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mobil</label>
                            <input type="text" name="nama_mobil_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merek Mobil</label>
                            <input type="text" name="brand_mobil_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Transmisi</label>
                            <select id="transmisi_nelsen" name="tipe_transmisi_nelsen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option>-- Pilih jenis transmisi --</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end items-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <?php
        include '../component/footer.php';
        ?>


        <!-- Js Flowbite Darkmode -->
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Switch between light and dark mode
            let themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            let themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            let logo = document.getElementById('logo');
            let logoFooter = document.getElementById('logo_footer');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
                logo.src = '../../public/assets/img/logo_dark.png'; // Ganti dengan path logo dark mode
                logoFooter.src = '../../public/assets/img/logo_dark.png'; // Ganti dengan path logo dark mode
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
                logo.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
                logoFooter.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
            }

            let themeToggleBtn = document.getElementById('theme-toggle');

            themeToggleBtn.addEventListener('click', function() {
                // toggle icons inside button
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // if set via local storage previously
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                        logo.src = '../../public/assets/img/logo_dark.png'; // Ganti dengan path logo dark mode
                        logoFooter.src = '../../public/assets/img/logo_dark.png'; // Ganti dengan path logo dark mode
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                        logo.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
                        logoFooter.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
                    }

                    // if NOT set via local storage previously
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                        logo.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
                        logoFooter.src = '../../public/assets/img/logo.png'; // Ganti dengan path logo light mode
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                        logoFooter.src = '../../public/assets/img/logo_dark.png'; // Ganti dengan path logo dark mode
                    }
                }
            });
        </script>

        <!-- Js Flowbite -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    </body>

    </html>
<?php
}
?>