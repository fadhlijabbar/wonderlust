<?php

include "../config/connect.php";

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='index.php';</script>";
}

if (isset($_GET['deletehotel'])) {
    $id_hotel = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM hotel WHERE id_hotel='$id_hotel'");
    if ($query) {
        echo "<script>alert('Hotel berhasil dihapus');window.location.href='dashboard.php';</script>";
    }
}
if (isset($_GET['publikasi'])) {
    $id_hotel = $_GET['id'];
    $query = mysqli_query($conn, "UPDATE hotel SET status=1 WHERE id_hotel='$id_hotel'");
    if ($query) {
        echo "<script>alert('Hotel berhasil dipublikasi');window.location.href='dashboard.php';</script>";
    }
}

if (isset($_GET['unpublikasi'])) {
    $id_hotel = $_GET['id'];
    $query = mysqli_query($conn, "UPDATE hotel SET status=0 WHERE id_hotel='$id_hotel'");
    if ($query) {
        echo "<script>alert('Hotel berhasil diunpublikasi');window.location.href='dashboard.php';</script>";
    }
}


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="/Wonderlust/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body class="font-poppins">

    <!-- Header -->
    <header class="bg-white border-b border-border h-24 flex">
        <div class="container mx-auto self-center px-6">

            <!-- Logo Name -->
            <div class="flex float-left h-14">
                <div class="font-playfair-display self-center text-base font-bold text-quaternary">
                    <a href="">
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
                <div id="profile-name" class="self-center cursor-pointer tracking-wider text-sm mx-5 text-quaternary">
                    <?php echo $_SESSION['nama']; ?>
                    <i class="fa-solid fa-circle-user"></i>
                </div>
            </div>
            <!-- End Menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- Profile Menu -->
    <a href="logout.php">
        <div id="profile-menu" class="p-5 fixed top-30 hidden right-10 bg-white border border-border rounded-md">
            <div class=" text-quaternary hover:text-primary">
                Keluar
            </div>
        </div>
    </a>
    <!-- End Profile Menu -->

    <!-- Secondary Menu -->
    <div class="bg-primary-light-hover hidden">
        <div class="py-6 px-6 text-sm text-quinary text-center">
            Tentang Kami
        </div>
        <div class="py-6 px-6 text-sm text-quinary text-center">
            Masuk
        </div>
        <div class="py-4 px-6 text-sm">
            <div class="bg-secondary py-4 px-6 rounded-lg text-white text-center">
                Daftar Sekarang
            </div>
        </div>
    </div>
    <!-- End Secondary Menu -->

    <!-- Content -->
    <div class="py-14">

        <!-- Dashboard Home -->
        <div class="container mx-auto px-6">
            <div class="mb-8">
                <div class="font-bold tracking-wider text-base text-quaternary mb-1">
                    Pesanan Anda
                </div>
                <div class="text-sm tracking-wider text-quinary">
                    Berikut merupakan pesanan hotel Anda.
                </div>
            </div>
            <div class="mb-8">
                <table class="w-full border border-border text-quaternary">
                    <tr>
                        <th class=" border border-border text-quaternary">No</th>
                        <th class=" border border-border text-quaternary">Kode Pembayaran</th>
                        <th class=" border border-border text-quaternary">Pesanan</th>
                        <th class=" border border-border text-quaternary">Pemesan</th>
                        <th class=" border border-border text-quaternary">Bukti Pembayaran</th>
                        <th class=" border border-border text-quaternary">Status</th>
                        <th class=" border border-border text-quaternary">Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_pengurus='$_SESSION[id_pengurus]'");
                    $dataHotel = mysqli_fetch_array($getHotel);
                    $id_hotel = $dataHotel['id_hotel'];
                    $getTransaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_hotel='$id_hotel'");
                    while ($dataTransaksi = mysqli_fetch_array($getTransaksi)) {
                        $no++;
                    ?>
                        <tr>
                            <td class=" border border-border text-quinary text-center"><?php echo $no; ?></td>
                            <td class=" border border-border text-quinary text-center">
                                <?php
                                $getPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_transaksi='$dataTransaksi[id_transaksi]'");
                                if (mysqli_num_rows($getPembayaran) > 0) {
                                    $dataPembayaran = mysqli_fetch_array($getPembayaran);
                                    echo $dataPembayaran['kode_pembayaran'];
                                }
                                ?>
                            </td>
                            <td class=" border border-border text-quinary text-center">
                                <?php
                                $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$dataTransaksi[id_hotel]'");
                                $dataHotel = mysqli_fetch_array($getHotel);
                                echo $dataHotel['nama_hotel'];
                                ?>
                            </td>
                            <td class=" border border-border text-quinary text-center">
                                <?php
                                if ($dataTransaksi['id_pengguna'] == 0) {
                                    $getTamu = mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu='$dataTransaksi[id_tamu]'");
                                    $dataTamu = mysqli_fetch_array($getTamu);
                                    echo $dataTamu['nama_tamu'];
                                } else {
                                    $getPengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$dataTransaksi[id_pengguna]'");
                                    $dataPengguna = mysqli_fetch_array($getPengguna);
                                    echo $dataPengguna['nama'];
                                }
                                ?>
                            </td>
                            <td class=" border border-border text-quinary text-center">
                                <?php
                                if ($dataPembayaran['bukti'] == "") {
                                    echo "Belum Upload";
                                } else {
                                    echo "<img src='../data/bukti/$dataPembayaran[bukti]' width='200px' class='inline-block'>";
                                }
                                ?>
                            </td>
                            <td class=" border border-border text-quinary text-center">
                                <?php
                                echo $dataPembayaran['status'];
                                ?>
                            </td>
                            <td class="p-5 border border-border text-quinary text-center">
                                <?php
                                if ($dataPembayaran['bukti'] !== "" and $dataPembayaran['status'] == "Menunggu Pembayaran") {
                                ?>
                                    <form action="konfirmasipembayaran.php" method="POST">
                                        <input type="hidden" name="kode_pembayaran" value="<?php echo $dataPembayaran['kode_pembayaran'] ?>">
                                        <button class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">Konfirmasi</button>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <button class="tracking-wider bg-slate-200 py-4 px-6 text-sm rounded-md text-white cursor-pointer">Konfirmasi</button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="mb-8">
                <div class="font-bold tracking-wider text-base text-quaternary mb-1">
                    Hotel Anda
                </div>
                <div class="text-sm tracking-wider text-quinary">
                    Berikut merupakan daftar hotel yang telah Anda tambahkan.
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-10">
                <?php
                $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_pengurus = '$_SESSION[id_pengurus]'");
                while ($dataHotel = mysqli_fetch_array($getHotel)) {
                    $id_hotel = $dataHotel['id_hotel'];
                    $getPhoto = mysqli_query($conn, "SELECT * FROM foto WHERE id_hotel = $id_hotel ORDER BY id_foto DESC LIMIT 1");
                    $dataPhoto = mysqli_fetch_array($getPhoto);
                ?>
                    <div class="">
                        <img src="../data/thumb/<?php echo $dataPhoto['nama_foto']; ?>" alt="" class="rounded-md mb-5">
                        <div class="font-bold text-quaternary tracking-wider text-sm md:text-base">
                            <?php echo $dataHotel['nama_hotel'] ?>
                        </div>
                        <div class="text-sm text-quinary tracking-wider mb-5">
                            Terakhir diubah <?php echo $dataHotel['last_edit'] ?>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <?php
                            $checkStatus = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = '$id_hotel'");
                            $dataStatus = mysqli_fetch_array($checkStatus);
                            $status = $dataStatus['status'];
                            if ($status == 0) {
                            ?>
                                <a href="?publikasi&id=<?php echo $id_hotel; ?>">
                                    <button class="w-full py-4 text-sm rounded-md text-center border border-border text-white bg-primary hover:bg-primary-hover cursor-pointer">
                                        <i class="fa-solid fa-earth-asia"></i> Publikasi
                                    </button>
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="?unpublikasi&id=<?php echo $id_hotel; ?>">
                                    <button class="w-full py-4 text-sm rounded-md text-center border border-border text-white bg-red-500 hover:bg-red-600 cursor-pointer">
                                        <i class="fa-solid fa-earth-asia"></i> Unpublikasi
                                    </button>
                                </a>
                            <?php
                            }
                            ?>

                            <a href="hotel.php?informasiumum&id=<?php echo $id_hotel; ?>">
                                <button class="w-full py-4 text-sm rounded-md text-quaternary text-center border border-border hover:text-white hover:bg-secondary-hover cursor-pointer">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a>
                            <a href="?deletehotel&id=<?php echo $id_hotel; ?>" onclick="confirm('Apakah Anda yakin?');">
                                <button class="w-full py-4 text-sm rounded-md text-quaternary text-center border border-border hover:text-white hover:bg-secondary-hover cursor-pointer">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <div class="">
                    <a href="hotel.php?informasiumum">
                        <div class="text-center h-full py-5 grid items-center border border-secondary bg-white hover:bg-secondary text-secondary hover:text-white cursor-pointer rounded-md">
                            <div class="text-sm md:text-base">
                                <i class="fa-solid fa-plus"></i>
                                <br>
                                Tambah Hotel Baru
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End of Dashboard Home -->

    </div>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="bg-quaternary py-10 text-sm text-center text-quinary">
        <div class=" font-playfair-display text-white font-bold text-base">
            Wonderlust
        </div>
        <div>
            ?? 2022 Wonderlust Indonesia
        </div>
    </footer>
    <!-- End Footer -->

</body>

<script>
    $("#profile-name").click(function() {
        $("#profile-menu").toggle("");
    });
</script>

</html>