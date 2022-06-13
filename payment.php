<?php

include "config/connect.php";

session_start();

if (isset($_POST['confirmPembayaran'])) {
    $kode_pembayaran = $_POST['kode_pembayaran'];
    $checkKode = mysqli_query($conn, "SELECT * FROM pembayaran WHERE kode_pembayaran = '$kode_pembayaran'");
    if (mysqli_num_rows($checkKode) > 0) {
        $nama_bukti = "IMG_" . $kode_pembayaran . "_" . $_FILES['bukti_pembayaran']['name'];
        $nama_bukti_sementara = $_FILES['bukti_pembayaran']['tmp_name'];
        $lokasi = "data/bukti/";
        $upload = move_uploaded_file($nama_bukti_sementara, $lokasi . $nama_bukti);
        if ($upload) {
            $query = mysqli_query($conn, "UPDATE pembayaran SET bukti = '$nama_bukti' WHERE kode_pembayaran = '$kode_pembayaran'");
            if ($query) {
                echo "<script>alert('Bukti berhasil ditambahkan');</script>";
                echo "<script>location.href='payment.php?kode_pembayaran=$_GET[kode_pembayaran]';</script>";
            } else {
                echo "<script>alert('Bukti gagal ditambahkan!');</script>";
                echo "<script>location.href='payment.php?kode_pembayaran=$_GET[kode_pembayaran]';</script>";
            }
        } else {
            echo "<script>alert('Bukti gagal ditambahkan!');</script>";
            echo "<script>location.href='payment.php?kode_pembayaran=$_GET[kode_pembayaran]';</script>";
        }
    } else {
        echo "<script>alert('Kode Pembayaran tidak ditemukan');</script>";
        echo "<script>location.href='payment.php?kode_pembayaran=$_GET[kode_pembayaran]';</script>";
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

    <!-- Payment -->
    <div class="py-14">
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
                                        <?php
                                        $getPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE kode_pembayaran = '$_GET[kode_pembayaran]'");
                                        $dataPembayaran = mysqli_fetch_array($getPembayaran);
                                        echo $dataPembayaran['id_transaksi'];
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Rincian Pesanan
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        <?php
                                        $getDetail = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_transaksi = '$dataPembayaran[id_transaksi]' LIMIT 1");
                                        $dataDetail = mysqli_fetch_array($getDetail);
                                        $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = '$dataDetail[id_hotel]'");
                                        $dataHotel = mysqli_fetch_array($getHotel);
                                        echo $dataHotel['nama_hotel'];
                                        ?>
                                    </div>
                                    <div class="text-sm text-quaternary tracking-wider">
                                        <?php
                                        $getTransaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$dataPembayaran[id_transaksi]'");
                                        $dataTransaksi = mysqli_fetch_array($getTransaksi);
                                        $checkin = $dataTransaksi['checkin'];
                                        $checkout = $dataTransaksi['checkout'];
                                        $checkinNew = strtotime($checkin);
                                        $checkoutNew = strtotime($checkout);
                                        $jumlah_hari = ($checkoutNew - $checkinNew) / (60 * 60 * 24);
                                        $getDetail2 = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_transaksi = '$dataPembayaran[id_transaksi]'");
                                        while ($dataDetail2 = mysqli_fetch_array($getDetail2)) {
                                            $getKamar = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '$dataDetail2[id_kamar]'");
                                            $dataKamar = mysqli_fetch_array($getKamar);
                                            echo "(1x) " . $dataKamar['nama_kamar'] . " (" . $jumlah_hari . " malam)<br>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-sm text-quinary tracking-wider">
                                        Pemesan
                                    </div>
                                    <div class="text-sm font-bold text-quaternary tracking-wider">
                                        <?php
                                        if (isset($_SESSION['id_pengguna'])) {
                                            echo $_SESSION['nama'];
                                        } else {
                                            $getTamu = mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu = '$dataTransaksi[id_tamu]'");
                                            $dataTamu = mysqli_fetch_array($getTamu);
                                            echo $dataTamu['nama_tamu'];
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Total yang harus dibayarkan
                                    </div>
                                    <div class="text-base font-bold text-quaternary tracking-wider">
                                        Rp<?php
                                            $total = $dataPembayaran['total'];
                                            echo number_format($total, 2, '.', ',');
                                            ?>
                                    </div>
                                    <div class="text-sm text-quinary tracking-wider">
                                        Sebelum
                                        <?php
                                        $hari = date('d', strtotime($dataPembayaran['kadaluarsa']));
                                        $bulan = date('F', strtotime($dataPembayaran['kadaluarsa']));
                                        $tahun = date('Y', strtotime($dataPembayaran['kadaluarsa']));
                                        echo $hari . " " . $bulan . " " . $tahun;
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Kode Pembayaran
                                    </div>
                                    <div class="text-base font-bold text-quaternary tracking-wider">
                                        <?php echo $dataPembayaran['kode_pembayaran'] ?>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-sm font-bold text-quinary tracking-wider">
                                        Status Pembayaran
                                    </div>
                                    <div class="text-base font-bold text-secondary tracking-wider">
                                        <?php echo $dataPembayaran['status'] ?>
                                    </div>
                                </div>
                                <a href="invoice.php?kode_pembayaran=<?php echo $dataPembayaran['kode_pembayaran'] ?>" target="__blank">
                                    <button class="tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer">Unduh
                                        Tagihan</button>
                                </a>
                            </div>
                            <div class=" font-bold text-base text-quaternary tracking-wider mb-1">
                                Instruksi Pembayaran
                            </div>
                            <div class=" text-sm text-quinary tracking-wider mb-5">
                                Anda dapat melakukan transaksi dengan menggunakan bank yang tertera di bawah. Silaka
                                lakukan transfer sesuai <b>Total yang harus dibayar</b>.
                            </div>
                            <div>
                                <?php
                                $getPembayaranHotel = mysqli_query($conn, "SELECT * FROM pembayaranhotel WHERE id_hotel = '$dataHotel[id_hotel]'");
                                while ($dataPembayaranHotel = mysqli_fetch_array($getPembayaranHotel)) {
                                ?>
                                    <div class="mb-5">
                                        <div>
                                            <?php
                                            if ($dataPembayaranHotel['nama_bank'] == "BNI") {
                                                echo "<img src='src/assets/img/bni.svg' class='float-left mr-5'>";
                                            } elseif ($dataPembayaranHotel['nama_bank'] == "BRI") {
                                                echo "<img src='src/assets/img/bri.svg' class='float-left mr-5'>";
                                            } elseif ($dataPembayaranHotel['nama_bank'] == "BCA") {
                                                echo "<img src='src/assets/img/bca.svg' class='float-left mr-5'>";
                                            }
                                            ?>
                                        </div>
                                        <div class="float-left">
                                            <div class="text-sm font-bold text-quaternary tracking-wider">
                                                <?php
                                                echo $dataPembayaranHotel['nama_bank'];
                                                ?>
                                            </div>
                                            <div class="text-sm text-quinary tracking-wider">
                                                No. Rekening : <?php echo $dataPembayaranHotel['no_rek']; ?>
                                            </div>
                                            <div class="text-sm text-quinary tracking-wider">
                                                <?php echo $dataPembayaranHotel['nama_pemilik']; ?>
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div>
                            <?php
                            if ($dataPembayaran['status'] == "Menunggu Pembayaran") {
                            ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class=" font-bold text-base text-quaternary tracking-wider mb-5">
                                        Konfirmasi Pembayaran
                                    </div>
                                    <div class="py-7 px-5 border border-border rounded-md mb-10">
                                        <div class="mb-5">
                                            <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                                Bukti Pembayaran
                                            </div>
                                            <input type="file" name="bukti_pembayaran" required>
                                        </div>
                                        <div class="mb-5">
                                            <div class="text-sm font-bold text-quaternary tracking-wider mb-3">
                                                Kode Pembayaran
                                            </div>
                                            <input type="number" name="kode_pembayaran" required placeholder="Masukkan kode pembayaran" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border">
                                        </div>
                                        <input type="submit" value="Konfirmasi" name="confirmPembayaran" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2">
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Payment -->

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