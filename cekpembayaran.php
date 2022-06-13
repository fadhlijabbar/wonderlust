<?php

include "config/connect.php";

session_start();

if (isset($_POST['cari'])) {
    $kode_pembayaran = $_POST['kode_pembayaran'];
    $checkPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE kode_pembayaran = $kode_pembayaran");
    if (mysqli_num_rows($checkPembayaran) > 0) {
        header("location:payment.php?kode_pembayaran=$kode_pembayaran");
    } else {
        echo "<script>alert('Kode Pembayaran tidak ditemukan');</script>";
        echo "<script>location='cekpembayaran.php';</script>";
    }
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
</head>

<body class="font-poppins">

    <!-- Header -->
    <header class="bg-white h-24 flex border-b border-border">
        <div class="container mx-auto self-center px-6">

            <!-- Logo Name -->
            <div class="flex float-left h-14">
                <div class="font-playfair-display self-center text-base font-bold text-quaternary">
                    <a href="/wonderlust">
                        Wonderlust
                    </a>
                </div>
            </div>
            <!-- End Logo Name -->

            <!-- Bars Button -->
            <div class="float-right h-14 flex md:hidden bg-primary text-white rounded-lg cursor-pointer">
                <div class="self-center px-6">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <!-- End Bars Button -->

            <!-- Menu -->
            <div class="float-right h-14 hidden md:flex">
                <div class="self-center text-sm text-quinary cursor-pointer">
                    Fathoni Zikri Nugroho
                    <i class="fa-solid fa-circle-user text-quaternary"></i>
                </div>
            </div>
            <!-- End Menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- Payment Check -->
    <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <form action="" method="POST">
                                <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                    Cek Pembayaran
                                </div>
                                <div class=" text-sm text-quinary tracking-wider  mb-5">
                                    Silakan masukkan kode pembayaran Anda untuk melakukan cek pembayaran.
                                </div>
                                <div class="py-7 px-5 border border-border rounded-md mb-10">
                                    <div class="mb-5">
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Kode Pembayaran
                                        </div>
                                        <input type="number" name="kode_pembayaran" required placeholder="Masukkan kode pembayaran" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                    <input type="submit" name="cari" value="Cari Pembayaran" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2">
                                </div>
                            </form>
                        </div>
                        <!-- <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                Instruksi Pembayaran
                            </div>
                            <div class=" text-sm text-quinary tracking-wider mb-5">
                                Anda dapat melakukan transaksi dengan menggunakan bank yang tertera di bawah. Silaka
                                lakukan transfer sesuai <b>Total yang harus dibayar</b>.
                            </div>
                            <div>
                                <div class="mb-5">
                                    <div>
                                        <img src="src/assets/img/BNI.svg" alt="" class="float-left mr-5">
                                    </div>
                                    <div class="float-left">
                                        <div class="text-sm font-bold text-quaternary tracking-wider">
                                            Bank Negara Indonesia (BNI)
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            No. Rekening : 123456789
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            Wonderlust Indonesia
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="mb-5">
                                    <div>
                                        <img src="src/assets/img/BRI.svg" alt="" class="float-left mr-5">
                                    </div>
                                    <div class="float-left">
                                        <div class="text-sm font-bold text-quaternary tracking-wider">
                                            Bank Rakyat Indonesia (BRI)
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            No. Rekening : 123456789
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            Wonderlust Indonesia
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="">
                                    <div>
                                        <img src="src/assets/img/BCA.svg" alt="" class="float-left mr-5">
                                    </div>
                                    <div class="float-left">
                                        <div class="text-sm font-bold text-quaternary tracking-wider">
                                            Bank Central Asia (BCA)
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            No. Rekening : 123456789
                                        </div>
                                        <div class="text-sm text-quinary tracking-wider">
                                            Wonderlust Indonesia
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Payment Check -->

    <!-- Footer -->
    <footer class="bg-quaternary py-10 text-sm text-center text-quinary">
        <div class=" font-playfair-display text-white font-bold text-base">
            Wonderlust
        </div>
        <div>
            © 2022 Wonderlust Indonesia
        </div>
    </footer>
    <!-- End Footer -->

</body>

</html>