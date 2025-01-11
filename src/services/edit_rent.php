<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password']) || $_SESSION['level'] !== 'admin') {
    echo "<script>alert('Anda tidak memiliki akses'); window.location = '../pages/login.php'</script>";
} else {

?>
    <?php
    include "../../config/db.php";

    $notrx = "TRX-" . date("Ymdhis");
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
            <h1 class="text-2xl w-full font-semibold bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4">Tambah Data Rental</h1>

            <!-- Tambah Data -->
            <a href="../pages/dashboard_rental.php">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</button>
            </a>

        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-900 flex">
            <div class="justify-center items-center w-full p-8 m-8">

                <?php
                include "../../config/db.php";

                // Ambil no_trx_nelsen dari URL
                $no_trx_nelsen = $_GET['no_trx_nelsen'];

                // Jalankan query untuk mengambil data rental berdasarkan no_trx_nelsen
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_rental_nelsen WHERE no_trx_nelsen='$no_trx_nelsen'");
                $data = mysqli_fetch_array($tampil);
                ?>

                <form method="post" action="../services/update_rent.php">
                    <div class="grid grid-cols-2 gap-6 mb-6 md:grid-cols-2">

                        <!-- No. Transaksi -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Transaksi</label>
                            <input type="hidden" name="no_trx_nelsen_tmp" value="<?= htmlspecialchars($data['no_trx_nelsen']) ?>" id="no_trx_nelsen_tmp" required>
                            <input type="text" name="no_trx_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= htmlspecialchars($data['no_trx_nelsen']) ?>" readonly>
                        </div>

                        <!-- Nama Pelanggan -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
                            <select id="base-input" name="nik_ktp_nelsen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option>-- Pilih Pelanggan --</option>
                                <?php
                                $tampil_pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_nelsen");
                                while ($data_pelanggan = mysqli_fetch_array($tampil_pelanggan)) {
                                    $selected = $data_pelanggan['nik_ktp_nelsen'] == $data['nik_ktp_nelsen'] ? 'selected' : '';
                                    echo '<option value="' . htmlspecialchars($data_pelanggan['nik_ktp_nelsen']) . '" ' . $selected . '>' . htmlspecialchars($data_pelanggan['nik_ktp_nelsen']) . ' - ' . htmlspecialchars($data_pelanggan['nama_nelsen']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Mobil -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobil</label>
                            <select id="base-input" name="no_plat_nelsen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option>-- Pilih Mobil --</option>
                                <?php
                                $tampil_mobil = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_nelsen");
                                while ($data_mobil = mysqli_fetch_array($tampil_mobil)) {
                                    $selected = $data_mobil['no_plat_nelsen'] == $data['no_plat_nelsen'] ? 'selected' : '';
                                    echo '<option value="' . htmlspecialchars($data_mobil['no_plat_nelsen']) . '" ' . $selected . '>' . htmlspecialchars($data_mobil['no_plat_nelsen']) . ' - ' . htmlspecialchars($data_mobil['nama_mobil_nelsen']) . '</option>';
                                }
                                ?>

                            </select>
                        </div>

                        <!-- Tanggal Sewa -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Ambil</label>
                            <input type="date" name="tgl_rental_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= htmlspecialchars($data['tgl_rental_nelsen']); ?>" required>
                        </div>

                        <!-- Jam Sewa -->
                        <div class="mb-5">
                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Ambil</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="time" id="time" name="jam_rental_nelsen" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= htmlspecialchars($data['jam_rental_nelsen']); ?>" required />
                            </div>
                        </div>

                        <!-- Lama Rental -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lama Rental</label>
                            <input type="number" name="lama_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lama_nelsen" value="<?= htmlspecialchars($data['lama_nelsen']); ?>" required>
                        </div>

                        <!-- Harga Sewa -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Sewa</label>
                            <input type="number" name="harga_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 harga_nelsen" value="<?= htmlspecialchars($data['harga_nelsen']); ?>" required>
                        </div>

                        <!-- Total Harga -->
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                            <input type="number" name="total_bayar_nelsen" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 jumlah_bayar" value="<?= htmlspecialchars($data['total_bayar_nelsen']); ?>" readonly>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end items-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                    </div>
                </form>
            </div>
        </div>
        </div>


        <!-- Footer -->
        <?php
        include '../component/footer.php';
        ?>

        <!-- Js Total Bayar -->
        <script>
            // Ambil elemen dengan class masukanNama
            const lamaRental = document.querySelector(".lama_nelsen");
            const harga = document.querySelector('.harga_nelsen');

            let value1

            function loginput2(e) {
                value1 = e.target.value;
            }

            // Fungsi untuk mencatat log
            function logInput(event) {
                const value = event.target.value; // Ambil nilai input
                let total_bayar = value * value1
                document.querySelector(".jumlah_bayar").value = total_bayar
            }

            // Tambahkan event listener ke elemen input
            lamaRental.addEventListener('input', logInput);
            harga.addEventListener('input', loginput2);
            
        </script>


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
