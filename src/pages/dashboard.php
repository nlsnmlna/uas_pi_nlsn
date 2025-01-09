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

        <!-- Content -->
        <div class="bg-white dark:bg-gray-900 flex justify-center">
            <div class="container  p-4 my-8 py-4 bg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
                    <!-- Card Data Mobil -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Data Mobil</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-300 mb-8">Informasi mengenai data mobil.</p>
                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="../pages/dashboard_car.php">Lihat Data</a></button>
                        <!-- Tambahkan konten data mobil di sini -->
                    </div>

                    <!-- Card Data Pelanggan -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Data Pelanggan</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-300 mb-8">Informasi mengenai data pelanggan.</p>
                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="../pages/dashboard_customer.php">Lihat data</a></button>
                        <!-- Tambahkan konten data pelanggan di sini -->
                    </div>

                    <!-- Card Data Rental -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Data Rental</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-300 mb-8">Informasi mengenai data rental.</p>
                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="../pages/dashboard_rental.php">Lihat Data</a></button>
                        <!-- Tambahkan konten data rental di sini -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
        include '../component/footer.php';
        ?>


        <!-- Js Flowbite -->
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