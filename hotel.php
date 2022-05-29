<?php

include 'config/connect.php';

$id_hotel = $_GET['id'];

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Wonderlust/dist/output.css" rel="stylesheet">
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
                    Wonderlust
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

    <!-- Hotel Detail Content -->
    <?php
    $query = "SELECT * FROM hotel WHERE id_hotel = $id_hotel";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    $getPhoto = mysqli_query($conn, "SELECT * FROM foto WHERE id_hotel = '$data[id_hotel]'");
    $dataPhoto = mysqli_fetch_array($getPhoto);
    ?>
    <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <img src="data/thumb/<?php echo $dataPhoto['nama_foto']; ?>" alt="" class="rounded-md w-full mb-5">
                <div class="pb-5 border-b border-border mb-10">
                    <div class="float-left">
                        <div class="text-base font-bold text-quaternary mb-1  tracking-wider">
                            <?php echo $data['nama_hotel'] ?>
                        </div>
                        <div class="text-sm text-quinary tracking-wider">
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
                        <div class="text-sm text-secondary font-bold tracking-wider">
                            <i class="fa-solid fa-money-bill"></i>
                            <?php
                            $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$data[id_hotel]' ORDER BY harga ASC LIMIT 1");
                            $dataRoom = mysqli_fetch_array($getRoom);
                            ?>
                            Rp<?php echo number_format($dataRoom['harga'], 2, '.', ','); ?>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="bg-primary p-3 rounded-md text-white">
                            <i class="fa-solid fa-star"></i>
                            <?php echo $data['bintang'] ?>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class="text-sm text-quinary mb-10">
                                <?php echo $data['deskripsi'] ?>
                            </div>
                            <div class="mb-10">
                                <div class="text-base font-bold text-quaternary tracking-wider">
                                    Fasilitas
                                </div>
                                <div>
                                    Fasilitas
                                </div>
                            </div>
                            <div>
                                <div class="text-base font-bold text-quaternary tracking-wider">
                                    Lokasi
                                </div>
                                <div class="text-sm text-quinary mb-5">
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
                                    <?php echo $data['alamat']; ?>, <?php echo $regencyName; ?>, <?php echo $provinceName; ?>
                                </div>
                                <div>
                                    <iframe class="w-full" src="https://maps.google.com/maps?q=<?php echo $data['lat'] ?>,<?php echo $data['lng'] ?>&hl=es;z=14&amp;output=embed"></iframe>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="py-7 px-5 border border-border rounded-md">
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    Pilih Kamar
                                </div>
                                <?php
                                $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$data[id_hotel]' ORDER BY harga ASC");
                                while ($dataRoom = mysqli_fetch_array($getRoom)) {
                                ?>
                                    <div class="border border-border rounded-md p-5 cursor-pointer mb-5">
                                        <div>
                                            <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                            <div class="float-left">
                                                <div class="text-sm font-bold text-quaternary mb-1">
                                                    <?php echo $dataRoom['nama_kamar'] ?>
                                                </div>
                                                <div class="text-quinary">
                                                    <div class="text-sm float-left mr-3">
                                                        <i class="fa-solid fa-bed"></i>
                                                        <?php echo $dataRoom['jenis'] ?>
                                                    </div>
                                                    <div class="text-sm float-left">
                                                        <i class="fa-solid fa-person"></i>
                                                        <?php echo $dataRoom['kapasitas'] ?> Tamu
                                                    </div>
                                                    <div class="clear-both"></div>
                                                </div>
                                                <div class="text-sm text-secondary font-bold">
                                                    <i class="fa-solid fa-money-bill"></i>
                                                    Rp<?php echo number_format($dataRoom['harga'], 2, '.', ','); ?>
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <div class="text-sm text-primary">
                                                    Tersedia <?php echo $dataRoom['tersedia'] ?> kamar
                                                </div>
                                            </div>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <input type="hidden" name="id_kamar" value="">
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    Pilih Jadwal
                                </div>
                                <div class="grid grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <input type="date" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                    <div>
                                        <input type="date" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                                <input type="submit" value="Pesan Sekarang" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hotel Detail Content -->

    <!-- Book Detail Content -->
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Informasi Pemesan
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Nama
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda"
                                            class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Nomor Telepon
                                    </div>
                                    <div class="grid grid-cols-2 gap-5">
                                        <div>
                                            <input type="text" placeholder="Masukkan kata sandi Anda"
                                                class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Masukkan kata sandi Anda"
                                                class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Email
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda"
                                            class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                            </div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Informasi Tamu
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Nama
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda"
                                            class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                                <div class="text-sm text-quinary">
                                    <input type="checkbox"> Sama seperti pemesan
                                </div>
                            </div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Rincian Biaya
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary font-bold mb-2">
                                    <div class="float-left">
                                        Total
                                    </div>
                                    <div class="float-right">
                                        Rp1,110,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                    <div class="float-left">
                                        (1x) Single Bed Room (3 malam)
                                    </div>
                                    <div class="float-right">
                                        Rp1,000,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary">
                                    <div class="float-left">
                                        PPN 11%
                                    </div>
                                    <div class="float-right">
                                        Rp110,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                            <input type="submit" value="Konfirmasi"
                                class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">
                        </div>
                        <div>
                            <div class="py-7 px-5 border border-border rounded-md">
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    Hotel Seruni
                                </div>
                                <div class="border border-border rounded-md p-5 mb-5">
                                    <div>
                                        <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                        <div class="float-left">
                                            <div class="text-sm font-bold text-quaternary mb-1">
                                                (1x) Single Bed Room
                                            </div>
                                            <div class="text-quinary">
                                                <div class="text-sm float-left mr-3">
                                                    <i class="fa-solid fa-bed"></i>
                                                    1 Single Bed
                                                </div>
                                                <div class="text-sm float-left">
                                                    <i class="fa-solid fa-person"></i>
                                                    1 Tamu
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                            <div class="text-sm text-secondary font-bold">
                                                <i class="fa-solid fa-money-bill"></i>
                                                Rp10,000,000
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Check In <div class="font-normal inline-block">(Mulai 09:00)</div>
                                        </div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda"
                                            class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Check Out <div class="font-normal inline-block">(Sebelum 15:00)</div>
                                        </div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda"
                                            class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                                <div class="text-sm text-quinary">
                                    Perhatikan jadwal check in dan check out dengan benar!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Book Detail Content -->

    <!-- Book Review -->
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                Review
                            </div>
                            <div class=" text-sm text-quinary mb-5">
                                Periksa kembali pesanan Anda dengan benar!
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <img src="../data/thumb/1.jpeg" alt="" class="rounded-md mb-5">
                                <div class="font-bold text-base text-quaternary mb-5">
                                    Hotel Seruni
                                </div>
                                <div class="grid grid-cols-2 pb-10 mb-10 border-b border-border">
                                    <div>
                                        <div class="mb-5">
                                            <div class="text-sm text-quinary">
                                                Check In (Mulai 15:00)
                                            </div>
                                            <div class="font-bold text-sm text-quaternary">
                                                20 Oktober 2022
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-sm text-quinary">
                                                Check Out (Sebelum 15:00)
                                            </div>
                                            <div class="font-bold text-sm text-quaternary">
                                                23 Oktober 2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="text-sm text-quinary">
                                                Durasi
                                            </div>
                                            <div class="text-sm text-quaternary">
                                                3 Malam
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                        <div class="float-left">
                                            <div class="text-sm font-bold text-quaternary mb-1">
                                                (1x) Single Bed Room
                                            </div>
                                            <div class="text-quinary">
                                                <div class="text-sm mr-3">
                                                    <i class="fa-solid fa-bed"></i>
                                                    1 Single Bed
                                                </div>
                                                <div class="text-sm">
                                                    <i class="fa-solid fa-person"></i>
                                                    1 Tamu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Rincian Biaya
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary font-bold mb-2">
                                    <div class="float-left">
                                        Total
                                    </div>
                                    <div class="float-right">
                                        Rp1,110,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                    <div class="float-left">
                                        (1x) Single Bed Room (3 malam)
                                    </div>
                                    <div class="float-right">
                                        Rp1,000,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="p-5 border border-border rounded-md text-sm text-quaternary">
                                    <div class="float-left">
                                        PPN 11%
                                    </div>
                                    <div class="float-right">
                                        Rp110,000
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                            <input type="submit" value="Lanjutkan Pembayaran"
                                class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">
                        </div>
                        <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Pemesan
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Nama
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        Fathoni Zikri Nugroho
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Nomor Telepon
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        08123456789
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Email
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        fathoni@gmail.com
                                    </div>
                                </div>
                            </div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Tamu
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md">
                                <div class="">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Nama
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        Fathoni Zikri Nugroho
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Book Review -->

    <!-- Payment -->
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                Pembayaran
                            </div>
                            <div class=" text-sm text-quinary tracking-wider  mb-5">
                                Silakan melakukan pembayaran sesuai instruksi yang tertera di bawah ini.
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm text-quinary tracking-wider">
                                        ID Pesanan
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        A0001
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Rincian Pesanan
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        Hotel Seruni
                                    </div>
                                    <div class="text-sm text-quaternary tracking-wider">
                                        (1x) Single Bed Room (3 malam)
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Tamu
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        Fathoni Zikri Nugroho
                                    </div>
                                </div>
                            </div>

                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Total yang harus dibayarkan
                                    </div>
                                    <div class="text-base font-bold text-quaternary tracking-wider">
                                        Rp1,110,000
                                    </div>
                                    <div class="text-sm text-quinary tracking-wider">
                                        Sebelum 28 April 2022 05:00
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Kode Pembayaran
                                    </div>
                                    <div class="text-base font-bold text-quaternary tracking-wider">
                                        AB0001
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Status Pembayaran
                                    </div>
                                    <div class="text-base font-bold text-secondary tracking-wider">
                                        Menunggu Pembayaran
                                    </div>
                                </div>
                                <button
                                    class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">Unduh
                                    Tagihan</button>
                            </div>
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
                                        <img src="assets/img/BNI.svg" alt="" class="float-left mr-5">
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
                                        <img src="assets/img/BRI.svg" alt="" class="float-left mr-5">
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
                                        <img src="assets/img/BCA.svg" alt="" class="float-left mr-5">
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
                        </div>
                        <div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                Konfirmasi Pembayaran
                            </div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Bukti Pembayaran
                                    </div>
                                    <input type="text" placeholder="Masukkan kata sandi Anda"
                                        class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Kode Pembayaran
                                    </div>
                                    <input type="text" placeholder="Masukkan kata sandi Anda"
                                        class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                        Nama Pengirim
                                    </div>
                                    <input type="text" placeholder="Masukkan kata sandi Anda"
                                        class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                </div>
                                <input type="submit" value="Konfirmasi"
                                    class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Payment -->

    <!-- Payment Check -->
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
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
                                    <input type="text" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                </div>
                                <input type="submit" value="Cari Pembayaran" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2">
                            </div>

                        </div>
                        <div>
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
                                        <img src="assets/img/BNI.svg" alt="" class="float-left mr-5">
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
                                        <img src="assets/img/BRI.svg" alt="" class="float-left mr-5">
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
                                        <img src="assets/img/BCA.svg" alt="" class="float-left mr-5">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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