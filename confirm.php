<?php

include "config/connect.php";

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
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div class="w-full h-40 bg-slate-200 mb-5 rounded-md"></div>
                <div class="pb-5 border-b border-border mb-10">
                    <div class="float-left">
                        <div class="text-base font-bold text-quaternary mb-1  tracking-wider">
                            Hotel Seruni
                        </div>
                        <div class="text-sm text-quinary tracking-wider">
                            <i class="fa-solid fa-location-dot"></i>
                            Bogor, Jawa Barat
                        </div>
                        <div class="text-sm text-secondary font-bold tracking-wider">
                            <i class="fa-solid fa-money-bill"></i>
                            Rp10,000,000
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="bg-primary p-3 rounded-md text-white">
                            <i class="fa-solid fa-star"></i>
                            5
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class="text-sm text-quinary mb-10">
                                It is a long established fact that a reader will be distracted by the readable content
                                of a
                                page
                                when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                normal
                                distribution of letters, as opposed to using 'Content here, content here', making it
                                look
                                like
                                readable English. Many desktop publishing packages and web page editors now use Lorem
                                Ipsum
                                as
                                their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                still
                                in
                                their infancy. Various versions have evolved over the years, sometimes by accident,
                                sometimes on
                                purpose (injected humour and the like).
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
                                <div class="text-sm text-quinary">
                                    Jalan Pirus Kp Baru Tegal Desa Cibeureum, Cisarua- Bogor, Cisarua, Puncak, Jawa
                                    Barat, Indonesia, 16750
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="py-7 px-5 border border-border rounded-md">
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    Pilih Kamar
                                </div>
                                <div class="border border-border rounded-md p-5 cursor-pointer mb-5">
                                    <div>
                                        <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                        <div class="float-left">
                                            <div class="text-sm font-bold text-quaternary mb-1">
                                                Single Bed Room
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
                                        <div class="float-right">
                                            <div class="text-sm text-primary">
                                                Tersedia 1 kamar
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="border border-border rounded-md p-5 cursor-pointer mb-5">
                                    <div>
                                        <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                        <div class="float-left">
                                            <div class="text-sm font-bold text-quaternary mb-1">
                                                Single Bed Room
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
                                        <div class="float-right">
                                            <div class="text-sm text-primary">
                                                Tersedia 1 kamar
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    Pilih Jadwal
                                </div>
                                <div class="grid grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                </div>
                                <input type="submit" value="Pesan Sekarang" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Hotel Detail Content -->

    <!-- Book Detail Content -->
    <!-- <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <form action="" method="POST">
                                <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                    Informasi Pemesan
                                </div>
                                <div class="py-7 px-5 border border-border rounded-md mb-10">
                                    <div class="mb-5">
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Nama
                                        </div>
                                        <div>
                                            <input type="text" name="nama_pemesan" placeholder="Masukkan nama Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Email
                                        </div>
                                        <div>
                                            <input type="text" name="email_pemesan" placeholder="Masukkan alamat email Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                        </div>
                                    </div>
                                </div>
                                <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                    Rincian Biaya
                                </div>
                                <div class="py-7 px-5 border border-border rounded-md mb-10">
                                    <?php

                                    $checkin = $_GET['checkin'];
                                    $checkout = $_GET['checkout'];

                                    $checkinNew = strtotime($checkin);
                                    $checkoutNew = strtotime($checkout);

                                    $jumlah_hari = ($checkoutNew - $checkinNew) / (60 * 60 * 24);

                                    $query = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$_GET[id]'");
                                    $data = mysqli_fetch_array($query);
                                    $form_total = $_GET['form_total'];
                                    $harga = 0;
                                    for ($i = 1; $i <= $form_total; $i++) {
                                        ${"id_kamar" . $i} = $_GET['id_kamar' . $i];
                                        $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                        $dataRoom = mysqli_fetch_array($getRoom);
                                        $hargaperkamar = $dataRoom['harga'] * $jumlah_hari;
                                    ?>
                                        <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                            <div class="float-left">
                                                (1x) <?php echo $dataRoom['jenis'] ?> (<?php echo $jumlah_hari ?> malam)
                                            </div>
                                            <div class="float-right">
                                                Rp<?php echo number_format($hargaperkamar, 2, '.', ','); ?>
                                            </div>
                                            <div class="clear-both"></div>
                                        </div>
                                    <?php
                                        $harga += $hargaperkamar;
                                    }
                                    ?>
                                    <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                        <div class="float-left">
                                            PPN 11%
                                        </div>
                                        <div class="float-right">
                                            <?php
                                            $ppn = $harga * 0.11;
                                            echo "Rp" . number_format($ppn, 2, '.', ',');
                                            ?>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="p-5 border border-border rounded-md text-sm text-quaternary font-bold">
                                        <div class="float-left">
                                            Total
                                        </div>
                                        <div class="float-right">
                                            <?php
                                            $totalharga = $harga + $ppn;
                                            echo "Rp" . number_format($totalharga, 2, '.', ',');
                                            ?>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <input type="submit" value="Lanjutkan" class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">
                            </form>
                        </div>
                        <div>
                            <div class="py-7 px-5 border border-border rounded-md">
                                <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                    <?php echo $data['nama_hotel']; ?>
                                </div>
                                <?php
                                for ($i = 1; $i <= $form_total; $i++) {
                                    ${"id_kamar" . $i} = $_GET['id_kamar' . $i];
                                    $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                    $dataRoom = mysqli_fetch_array($getRoom);
                                ?>
                                    <div class="border border-border rounded-md p-5 mb-5">
                                        <div>
                                            <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                            <div class="float-left">
                                                <div class="text-sm font-bold text-quaternary mb-1">
                                                    (1x) <?php echo $dataRoom['nama_kamar'] ?>
                                                </div>
                                                <div class="text-quinary">
                                                    <div class="text-sm float-left mr-3">
                                                        <i class="fa-solid fa-bed"></i>
                                                        <?php echo $dataRoom['jenis'] ?> Single Bed
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
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="grid grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Check In <div class="font-normal inline-block">(Mulai 09:00)</div>
                                        </div>
                                        <input type="date" disabled value="<?php echo $_GET['checkin'] ?>" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                            Check Out <div class="font-normal inline-block">(Sebelum 15:00)</div>
                                        </div>
                                        <input type="date" disabled value="<?php echo $_GET['checkout'] ?>" placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
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
    <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <form action="" method="POST">
                                <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                    Review
                                </div>
                                <div class=" text-sm text-quinary mb-5">
                                    Periksa kembali pesanan Anda dengan benar!
                                </div>
                                <div class="py-7 px-5 border border-border rounded-md mb-10">
                                    <?php
                                    $id_hotel = $_POST['id'];
                                    $query = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$id_hotel'");
                                    $data = mysqli_fetch_array($query);
                                    $getPhoto = mysqli_query($conn, "SELECT * FROM foto WHERE id_hotel='$id_hotel'");
                                    $dataPhoto = mysqli_fetch_array($getPhoto);
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $id_hotel; ?>">
                                    <input type="hidden" name="checkin" value="<?php echo $_POST['checkin']; ?>">
                                    <input type="hidden" name="checkout" value="<?php echo $_POST['checkout']; ?>">
                                    <input type="hidden" name="form_total" value="<?php echo $_POST['form_total']; ?>">

                                    <img src="data/thumb/<?php echo $dataPhoto['nama_foto']; ?>" alt="" class="rounded-md mb-5">
                                    <div class="font-bold text-base text-quaternary mb-5">
                                        <?php echo $data['nama_hotel'] ?>
                                    </div>
                                    <div class="grid grid-cols-2 pb-10 mb-10 border-b border-border">
                                        <div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quinary">
                                                    Check In (Mulai 15:00)
                                                </div>
                                                <div class="font-bold text-sm text-quaternary">
                                                    <?php
                                                    $month = date('F', strtotime($_POST['checkin']));
                                                    $day = date('d', strtotime($_POST['checkin']));
                                                    $year = date('Y', strtotime($_POST['checkin']));
                                                    echo $day . " " . $month . " " . $year;
                                                    ?>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm text-quinary">
                                                    Check Out (Sebelum 15:00)
                                                </div>
                                                <div class="font-bold text-sm text-quaternary">
                                                    <?php
                                                    $month = date('F', strtotime($_POST['checkout']));
                                                    $day = date('d', strtotime($_POST['checkout']));
                                                    $year = date('Y', strtotime($_POST['checkout']));
                                                    echo $day . " " . $month . " " . $year;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <div class="text-sm text-quinary">
                                                    Durasi
                                                </div>
                                                <div class="text-sm text-quaternary">
                                                    <?php
                                                    $checkin = $_POST['checkin'];
                                                    $checkout = $_POST['checkout'];

                                                    $checkinNew = strtotime($checkin);
                                                    $checkoutNew = strtotime($checkout);

                                                    $jumlah_hari = ($checkoutNew - $checkinNew) / (60 * 60 * 24);
                                                    echo $jumlah_hari;
                                                    ?>
                                                    Malam
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$_POST[id]'");
                                        $data = mysqli_fetch_array($query);
                                        $form_total = $_POST['form_total'];
                                        $harga = 0;
                                        for ($i = 1; $i <= $form_total; $i++) {
                                            ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                                            $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                            $dataRoom = mysqli_fetch_array($getRoom);
                                            $hargaperkamar = $dataRoom['harga'] * $jumlah_hari;
                                        ?>
                                            <div class="<?php if ($i != $form_total) {
                                                            echo "mb-5";
                                                        } ?>">
                                                <div class="w-20 h-20 bg-slate-200 rounded-md float-left mr-5"></div>
                                                <div class="float-left">
                                                    <div class="text-sm font-bold text-quaternary mb-1">
                                                        (1x) <?php echo $dataRoom['nama_kamar'] ?>
                                                    </div>
                                                    <div class="text-quinary">
                                                        <div class="text-sm mr-3">
                                                            <i class="fa-solid fa-bed"></i>
                                                            <?php echo $dataRoom['jenis'] ?>
                                                        </div>
                                                        <div class="text-sm">
                                                            <i class="fa-solid fa-person"></i>
                                                            <?php echo $dataRoom['kapasitas'] ?> Tamu
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear-both"></div>
                                                <input type="hidden" name="<?php echo "id_kamar" . $i ?>" value="<?php echo ${"id_kamar" . $i} ?>">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                    Rincian Biaya
                                </div>
                                <div class="py-7 px-5 border border-border rounded-md mb-10">
                                    <?php

                                    $checkin = $_POST['checkin'];
                                    $checkout = $_POST['checkout'];

                                    $checkinNew = strtotime($checkin);
                                    $checkoutNew = strtotime($checkout);

                                    $jumlah_hari = ($checkoutNew - $checkinNew) / (60 * 60 * 24);

                                    $query = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$_POST[id]'");
                                    $data = mysqli_fetch_array($query);
                                    $form_total = $_POST['form_total'];
                                    $harga = 0;
                                    for ($i = 1; $i <= $form_total; $i++) {
                                        ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                                        $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                        $dataRoom = mysqli_fetch_array($getRoom);
                                        $hargaperkamar = $dataRoom['harga'] * $jumlah_hari;
                                    ?>
                                        <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                            <div class="float-left">
                                                (1x) <?php echo $dataRoom['jenis'] ?> (<?php echo $jumlah_hari ?> malam)
                                            </div>
                                            <div class="float-right">
                                                Rp<?php echo number_format($hargaperkamar, 2, '.', ','); ?>
                                            </div>
                                            <input type="hidden" name="<?php echo "id_kamar" . $i ?>" value="<?php echo $_POST['id_kamar' . $i]; ?>">
                                            <div class="clear-both"></div>
                                        </div>
                                    <?php
                                        $harga += $hargaperkamar;
                                    }
                                    ?>
                                    <div class="p-5 border border-border rounded-md text-sm text-quaternary mb-2">
                                        <div class="float-left">
                                            PPN 11%
                                        </div>
                                        <div class="float-right">
                                            <?php
                                            $ppn = $harga * 0.11;
                                            echo "Rp" . number_format($ppn, 2, '.', ',');
                                            ?>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="p-5 border border-border rounded-md text-sm text-quaternary font-bold">
                                        <div class="float-left">
                                            Total
                                        </div>
                                        <div class="float-right">
                                            <?php
                                            $totalharga = $harga + $ppn;
                                            echo "Rp" . number_format($totalharga, 2, '.', ',');
                                            ?>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <input type="submit" value="Konfirmasi dan Lanjutkan Pembayaran" class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">
                            </form>
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
                                        <?php echo $_POST['nama_pemesan'] ?>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Email
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        <?php echo $_POST['email_pemesan'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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