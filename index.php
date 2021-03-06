<?php

include "config/connect.php";

session_start();

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderlust</title>
    <link href="/Wonderlust/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body class="font-poppins">

    <!-- Scroll Top Button -->
    <div class="fixed p-5 bg-primary right-5 bottom-5 rounded-xl cursor-pointer hover:bg-primary-hover hidden" id="scrollTopBtn">
        <div class="text-white">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
    </div>
    <!-- End of Scroll Top Button -->

    <!-- Header -->
    <header class="bg-primary-light h-24 flex" id="header">
        <div class="container mx-auto self-center px-6">

            <!-- Logo Name -->
            <div class="flex float-left h-14">
                <div class="font-playfair-display self-center text-base font-bold text-quaternary">
                    Wonderlust
                </div>
            </div>
            <!-- End Logo Name -->

            <!-- Bars Button -->
            <div class="float-right h-14 flex md:hidden bg-primary text-white rounded-lg cursor-pointer" id="bars-btn">
                <div class="self-center px-6">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <!-- End Bars Button -->

            <?php
            if (isset($_SESSION['id_pengguna'])) {

            ?>
                <!-- Menu -->
                <div class="float-right h-14 hidden md:flex">
                    <div class="self-center text-sm text-quinary cursor-pointer">
                        <a href="dashboard.php">
                            <?php echo $_SESSION['nama']; ?>
                            <i class="fa-solid fa-circle-user text-quaternary"></i>
                        </a>
                    </div>
                    </a>
                </div>
                <!-- End Menu -->
            <?php
            } else {
            ?>
                <!-- Menu -->
                <div class="float-right h-14 hidden md:flex">
                    <div class="self-center tracking-wider text-sm mx-5 text-quinary">
                        <a href="masuk.php">
                            Masuk
                        </a>
                    </div>
                    <a href="daftar.php">
                        <div class="self-center text-sm mx-5 tracking-wider bg-secondary py-4 px-6 rounded-lg text-white hover:bg-secondary-hover hover:duration-200">
                            Daftar Sekarang
                        </div>
                    </a>
                </div>
                <!-- End Menu -->

            <?php
            }
            ?>

        </div>
    </header>
    <!-- End Header -->

    <!-- Secondary Menu -->
    <div class="bg-primary-light-hover hidden" id="sec-menu">
        <div class="py-6 px-6 text-sm tracking-wider text-quinary text-center">
            <a href="">
                Masuk
            </a>
        </div>
        <div class="py-4 px-6 text-sm">
            <a href="">
                <button class="bg-secondary w-full tracking-wider hover:bg-secondary-hover py-4 px-6 rounded-lg text-white text-center">
                    Daftar Sekarang
                </button>
            </a>
        </div>
    </div>
    <!-- End Secondary Menu -->

    <!-- Hero -->
    <div class="bg-primary-light pt-20 pb-20 lg:pb-40">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="self-center">
                    <div class="font-playfair-display font-bold text-quaternary text-lg md:text-xl tracking-wide">
                        Menjelajah Bersama Kami
                    </div>
                    <div class="font-poppins text-quinary text-sm md:text-base mb-8 tracking-wider">
                        Terdapat ratusan hotel pilihan yang tersedia untuk menemani kamu healing. Pesan sekarang, besok
                        liburan!
                    </div>
                    <button id="book-btn" class="tracking-wider text-xs md:text-sm bg-secondary py-4 px-6 rounded-lg text-white hover:bg-secondary-hover hover:duration-200">
                        Pesan Hotel
                    </button>
                    <a href="cekpembayaran.php">
                        <button class="tracking-wider text-xs md:text-sm text-secondary py-4 px-6 rounded-lg border border-secondary hover:bg-white hover:text-secondary hover:border-white hover:duration-200">
                            Cek Pembayaran
                        </button>
                    </a>
                </div>
                <div class="grid justify-items-center">
                    <img src="src/assets/img/hero-illust.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Feature -->
    <div class="bg-tertiary lg:bg-white">
        <div class="lg:w-800px py-20 lg:py-8 md:px-16 mx-auto lg:bg-tertiary lg:rounded-lg md:relative lg:-top-100px">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="text-center md:text-left px-6">
                    <img src="src/assets/img/penginapan.svg" alt="" class="inline">
                    <div class="text-sm text-tertiary-text tracking-wider py-3">Penginapan</div>
                    <div class="text-sm text-quaternary tracking-wider"><b>100</b> beragam penginapan hadir di sini
                        untuk kamu.</div>
                </div>
                <div class="text-center md:text-left px-5">
                    <img src="src/assets/img/pengunjung.svg" alt="" class="inline">
                    <div class=" text-sm text-tertiary-text tracking-wider py-3">Pengunjung
                    </div>
                    <div class="text-sm text-quaternary tracking-wider">Kami telah melayani <b>1000</b> pengunjung satu
                        dekade
                        terakhir.</div>
                </div>
                <div class="text-center md:text-left px-5">
                    <img src="src/assets/img/kota.svg" alt="" class="inline">
                    <div class=" text-sm text-tertiary-text tracking-wider py-3">Kota
                    </div>
                    <div class="text-sm text-quaternary tracking-wider">Saat ini kami telah hadir di <b>100</b> kota di
                        seluruh
                        Indonesia.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature -->

    <!-- Feature 2 -->
    <div class="py-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="grid justify-items-center">
                    <img src="src/assets/img/feature-illust1.png" alt="">
                </div>
                <div class="self-center">
                    <div class="heading font-playfair-display tracking-wide font-bold text-lg md:text-xl text-quaternary mb-5">
                        Dapatkan Diskon di Setiap Pemesanan
                    </div>
                    <div class="tracking-wider text-sm md:text-base text-quinary">
                        Kami sangat bangga pada kamu. Oleh karena itu, kami berikan potongan harga dan promo lainnya.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="self-center">
                    <div class="heading font-playfair-display tracking-wide font-bold text-lg md:text-xl text-quaternary mb-5">
                        Dapatkan Diskon di Setiap Pemesanan
                    </div>
                    <div class="tracking-wider text-sm md:text-base text-quinary">
                        Kami sangat bangga pada kamu. Oleh karena itu, kami berikan potongan harga dan promo lainnya.
                    </div>
                </div>
                <div class="grid justify-items-center">
                    <img src="src/assets/img/feature-illust2.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature 2 -->

    <!-- Recommendation -->
    <div class="bg-primary-light py-20" id="hotel-list">
        <div class="container mx-auto px-6">
            <div class="font-playfair-display tracking-wide text-quaternary text-lg md:text-xl font-bold text-center mb-5">
                Rekomendasi Hotel untuk Kamu
            </div>
            <div class="lg:w-800px text-center mx-auto text-sm md:text-base tracking-wider text-quinary mb-14">
                Kami sangat bangga pada kamu. Oleh karena itu, kami berikan potongan harga dan promo lainnya.
            </div>
            <div class="text-center">
                <form action="search.php" method="GET">
                    <input type="text" name="q" placeholder="Cari hotel atau penginapan" class="py-4 px-5 text-sm w-52 md:w-96 inline rounded-md focus:outline-none text-quaternary tracking-wider">
                    <input type="submit" value="Cari" class="inline tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                </form>
            </div>
        </div>
    </div>
    <!-- End Recommendation -->

    <!-- Hotel List -->
    <div class="py-20 md:py-40">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-10">

                <?php
                $query = "SELECT * FROM hotel WHERE status='1'";
                $result = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($result)) {
                    $getPhoto = mysqli_query($conn, "SELECT * FROM foto WHERE id_hotel = '$data[id_hotel]'");
                    $dataPhoto = mysqli_fetch_array($getPhoto);
                ?>
                    <div>
                        <div class="mb-5">
                            <img src="data/thumb/<?php echo $dataPhoto['nama_foto']; ?>" alt="" class="rounded-md">
                        </div>
                        <div class="font-bold text-quaternary tracking-wide text-sm md:text-base mb-1">
                            <a href="hotel.php?id=<?php echo $data['id_hotel']; ?>">
                                <?php echo $data['nama_hotel']; ?>
                            </a>
                        </div>
                        <div class="text-quinary tracking-wider text-sm">
                            <i class="fa-solid fa-location-dot"></i>
                            <?php
                            $getProvince = mysqli_query($conn, "SELECT * FROM provinces WHERE id = '$data[provinsi]'");
                            $dataProvince = mysqli_fetch_array($getProvince);
                            $province = strtolower($dataProvince['name']);
                            $provinceName = ucwords($province);
                            $province = $dataProvince['name'];
                            $getRegency = mysqli_query($conn, "SELECT * FROM regencies WHERE id = '$data[kota]'");
                            $dataRegency = mysqli_fetch_array($getRegency);
                            $regency = strtolower($dataRegency['name']);
                            $regencyName = ucwords($regency);
                            ?>
                            <?php echo $regencyName; ?>, <?php echo $provinceName; ?>
                        </div>
                        <div class="font-bold tracking-wider text-sm text-secondary">
                            <i class="fa-solid fa-money-bill"></i>
                            <?php
                            $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$data[id_hotel]' ORDER BY harga ASC LIMIT 1");
                            $dataRoom = mysqli_fetch_array($getRoom);
                            ?>
                            Rp<?php echo number_format($dataRoom['harga'], 2, '.', ','); ?>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- End Hotel List -->

    <!-- Footer -->
    <footer class="py-40">
        <div class="container mx-auto">
            <div class="font-playfair-display font-bold tracking-wide text-quaternary text-lg md:text-xl text-center mb-4">
                Terhubung dengan Kami
            </div>
            <div class=" text-quinary text-center text-sm md:text-base tracking-wider mb-14">
                Dapatkan informasi terbaru seputar promo atau tawaran menarik lainnya dari kami.
            </div>
            <div class="text-center">
                <a href="">
                    <button class="mb-8 tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                        Hubungi Kami
                    </button>
                </a>
                <div class="text-base text-quaternary mb-5">
                    <a href="">
                        <i class="fa-brands fa-instagram mx-5"></i></a>
                    <a href="">
                        <i class="fa-brands fa-twitter mx-5"></i></a>
                    <a href="">
                        <i class="fa-brands fa-youtube mx-5"></i></a>
                </div>
                <div class="text-sm text-quinary">
                    ?? 2022 Wonderlust Indonesia
                </div>
            </div>
        </div>
    </footer>

</body>

<script>
    $(window).resize(function() {
        if ($(window).width() >= 768) {
            $('#sec-menu').hide();
        }
    });
    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            $('#scrollTopBtn').show();
        } else {
            $('#scrollTopBtn').hide();
        }
    });
    $("#bars-btn").click(function() {
        $("#sec-menu").toggle("slow");
    });
    $("#book-btn").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#hotel-list").offset().top
        }, 2000);
    });
    $("#scrollTopBtn").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#header").offset().top
        }, 2000);
    });
</script>

</html>