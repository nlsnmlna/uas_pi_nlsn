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
            <h1 class="text-2xl w-full font-semibold bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4">Data Pelanggan</h1>

            <!-- Drop down -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Menu <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Tambah Data -->
            <a href="../services/add_customer.php"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Data</button>
            </a>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="../pages/dashboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="../pages/dashboard_car.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data Mobil</a>
                    </li>
                    <li>
                        <a href="../pages/dashboard_customer.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data Pelanggan</a>
                    </li>
                    <li>
                        <a href="../pages/dashboard_rental.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data Rental</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tabel -->
        <div class="bg-white dark:bg-gray-900 flex">
            <div class="justify-center items-center w-full p-8 m-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NIK Pelanggan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor HP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../../config/db.php";
                            $i = 0;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_nelsen");
                            while ($data = mysqli_fetch_array($tampil)) {
                                $i++;
                            ?>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $data['nik_ktp_nelsen'] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $data['nama_nelsen'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $data['no_hp_nelsen'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $data['alamat_nelsen'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="../services/edit_customer.php?nik_ktp_nelsen=<?= $data['nik_ktp_nelsen'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Edit
                                            </button>
                                        </a>

                                        <a href="../services/delete_customer.php?nik_ktp_nelsen=<?= $data['nik_ktp_nelsen'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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