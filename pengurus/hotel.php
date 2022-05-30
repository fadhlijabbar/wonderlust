<?php

include "../config/connect.php";

session_start();

if (isset($_POST['addHotel'])) {
    $nama_hotel = $_POST['nama_hotel'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $telepon = $_POST['telepon'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $id_pengurus = $_SESSION['id_pengurus'];

    $query = mysqli_query($conn, "INSERT INTO hotel (nama_hotel, alamat, provinsi, kota, lat, lng, telepon, checkin, checkout, id_pengurus, status, last_edit) VALUES ('$nama_hotel', '$alamat', '$provinsi', '$kota', '$lat', '$lng', '$telepon', '$checkin', '$checkout', '$id_pengurus', '0', NOW())");
    if ($query) {
        $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_pengurus = '$id_pengurus' ORDER BY id_hotel DESC LIMIT 1");
        $dataHotel = mysqli_fetch_array($getHotel);
        $id_hotel = $dataHotel['id_hotel'];
        echo "<script>alert('Hotel berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?fasilitas&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Hotel gagal ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?informasiumum;</script>";
    }
}

if (isset($_POST['updateHotel'])) {
    $id_hotel   = $_POST['id_hotel'];
    $nama_hotel = $_POST['nama_hotel'];
    $deskripsi = $_POST['deskripsi'];
    $bintang = $_POST['bintang'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $telepon = $_POST['telepon'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $id_pengurus = $_POST['id_pengurus'];

    $query = mysqli_query($conn, "UPDATE hotel SET nama_hotel = '$nama_hotel', deskripsi='$deskripsi', bintang='$bintang', alamat = '$alamat', provinsi = '$provinsi', kota = '$kota', lat = '$lat', lng = '$lng', telepon = '$telepon', checkin = '$checkin', checkout = '$checkout', last_edit = NOW() WHERE id_hotel = '$id_hotel' AND id_pengurus = '$id_pengurus'");
    if ($query) {
        echo "<script>alert('Hotel berhasil diubah!');</script>";
        echo "<script>window.location.href='hotel.php?informasiumum&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Hotel gagal diubah!');</script>";
        echo "<script>window.location.href='hotel.php?informasiumum&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['addFacilities'])) {
    $id_hotel = $_GET['id'];
    if (isset($_POST['tempat_parkir']) && $_POST['tempat_parkir'] == "Tempat Parkir") {
        $tempat_parkir =  1;
    } else {
        $tempat_parkir = 0;
    }
    if (isset($_POST['restoran']) && $_POST['restoran'] == "Restoran") {
        $restoran = 1;
    } else {
        $restoran = 0;
    }
    if (isset($_POST['wifi_publik']) && $_POST['wifi_publik'] == "WiFi Publik") {
        $wifi_publik = 1;
    } else {
        $wifi_publik = 0;
    }
    if (isset($_POST['coffee_shop']) && $_POST['coffee_shop'] == "Coffee Shop") {
        $coffee_shop = 1;
    } else {
        $coffee_shop = 0;
    }
    if (isset($_POST['antar_jemput']) && $_POST['antar_jemput'] == "Antar-jemput Bandara") {
        $antar_jemput = 1;
    } else {
        $antar_jemput = 0;
    }
    if (isset($_POST['shuttle_bus']) && $_POST['shuttle_bus'] == "Shuttle Bus") {
        $shuttle_bus = 1;
    } else {
        $shuttle_bus = 0;
    }
    if (isset($_POST['fitness']) && $_POST['fitness'] == "Fitness") {
        $fitness = 1;
    } else {
        $fitness = 0;
    }
    if (isset($_POST['kolam_renang']) && $_POST['kolam_renang'] == "Kolam Renang") {
        $kolam_renang = 1;
    } else {
        $kolam_renang = 0;
    }
    if (isset($_POST['billiards']) && $_POST['billiards'] == "Billiards") {
        $billiards = 1;
    } else {
        $billiards = 0;
    }

    $query = mysqli_query($conn, "INSERT INTO fasilitas (tempat_parkir, restoran, wifi_publik, coffee_shop, antar_jemput, shuttle_bus, fitness, kolam_renang, billiards, id_hotel) VALUES ('$tempat_parkir', '$restoran', '$wifi_publik', '$coffee_shop', '$antar_jemput', '$shuttle_bus', '$fitness', '$kolam_renang', '$billiards','$id_hotel')");

    echo "<script>alert('Fasilitas berhasil ditambahkan!');</script>";
    echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
}

if (isset($_POST['updateFacilities'])) {
    $id_hotel = $_GET['id'];
    if (isset($_POST['tempat_parkir']) && $_POST['tempat_parkir'] == "Tempat Parkir") {
        $tempat_parkir =  1;
    } else {
        $tempat_parkir = 0;
    }
    if (isset($_POST['restoran']) && $_POST['restoran'] == "Restoran") {
        $restoran = 1;
    } else {
        $restoran = 0;
    }
    if (isset($_POST['wifi_publik']) && $_POST['wifi_publik'] == "WiFi Publik") {
        $wifi_publik = 1;
    } else {
        $wifi_publik = 0;
    }
    if (isset($_POST['coffee_shop']) && $_POST['coffee_shop'] == "Coffee Shop") {
        $coffee_shop = 1;
    } else {
        $coffee_shop = 0;
    }
    if (isset($_POST['antar_jemput']) && $_POST['antar_jemput'] == "Antar-jemput Bandara") {
        $antar_jemput = 1;
    } else {
        $antar_jemput = 0;
    }
    if (isset($_POST['shuttle_bus']) && $_POST['shuttle_bus'] == "Shuttle Bus") {
        $shuttle_bus = 1;
    } else {
        $shuttle_bus = 0;
    }
    if (isset($_POST['fitness']) && $_POST['fitness'] == "Fitness") {
        $fitness = 1;
    } else {
        $fitness = 0;
    }
    if (isset($_POST['kolam_renang']) && $_POST['kolam_renang'] == "Kolam Renang") {
        $kolam_renang = 1;
    } else {
        $kolam_renang = 0;
    }
    if (isset($_POST['billiards']) && $_POST['billiards'] == "Billiards") {
        $billiards = 1;
    } else {
        $billiards = 0;
    }

    $query = mysqli_query($conn, "UPDATE fasilitas SET tempat_parkir = '$tempat_parkir', restoran = '$restoran', wifi_publik = '$wifi_publik', coffee_shop = '$coffee_shop', antar_jemput = '$antar_jemput', shuttle_bus = '$shuttle_bus', fitness = '$fitness', kolam_renang = '$kolam_renang', billiards = '$billiards' WHERE id_hotel = '$id_hotel'");

    echo "<script>alert('Fasilitas berhasil disimpan!');</script>";
    echo "<script>window.location.href='hotel.php?fasilitas&id=" . $id_hotel . "';</script>";
}

if (isset($_POST['addRoom'])) {
    $id_hotel = $_GET['id'];
    $nama_kamar = $_POST['nama_kamar'];
    $jenis = $_POST['jenis'];
    $kapasitas = $_POST['kapasitas'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $query = mysqli_query($conn, "INSERT INTO kamar (nama_kamar, jenis, kapasitas, tersedia, harga, jumlah, id_hotel) VALUES ('$nama_kamar', '$jenis', '$kapasitas', '$kapasitas', '$harga', '$jumlah', '$id_hotel')");
    if ($query) {
        echo "<script>alert('Kamar berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Kamar gagal ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['deleteRoom'])) {
    $id_hotel = $_POST['id_hotel'];
    $id_kamar = $_POST['id_kamar'];
    $query = mysqli_query($conn, "DELETE FROM kamar WHERE id_kamar = '$id_kamar' AND id_hotel = '$id_hotel'");
    if ($query) {
        echo "<script>alert('Kamar berhasil dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Kamar gagal dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['updateRoom'])) {
    $id_hotel = $_POST['id_hotel'];
    $id_kamar = $_POST['id_kamar'];
    $nama_kamar = $_POST['nama_kamar'];
    $jenis = $_POST['jenis'];
    $kapasitas = $_POST['kapasitas'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $query = mysqli_query($conn, "UPDATE kamar SET nama_kamar = '$_POST[nama_kamar]', jenis = '$_POST[jenis]', kapasitas = '$_POST[kapasitas]', harga = '$_POST[harga]', jumlah = '$_POST[jumlah]' WHERE id_kamar = '$id_kamar' AND id_hotel = '$id_hotel'");
    if ($query) {
        echo "<script>alert('Kamar berhasil diedit!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Kamar gagal dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?kamar&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['addPhoto'])) {
    $id_pengurus = $_SESSION['id_pengurus'];
    $id_hotel = $_POST['id_hotel'];
    $nama_foto = "IMG_" . $id_pengurus . "_" . $id_hotel . "_" . $_FILES['foto']['name'];
    $nama_foto_sementara = $_FILES['foto']['tmp_name'];

    $lokasi = "../data/thumb/";
    $upload = move_uploaded_file($nama_foto_sementara, $lokasi . $nama_foto);

    if ($upload) {
        $query = mysqli_query($conn, "INSERT INTO foto (nama_foto, id_hotel) VALUES ('$nama_foto', '$id_hotel')");
        if ($query) {
            echo "<script>alert('Foto berhasil ditambahkan');</script>";
            echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
        } else {
            echo "<script>alert('Foto gagal ditambahkan!');</script>";
            echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
        }
    } else {
        echo "<script>alert('Foto gagal ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['deletePhoto'])) {
    $nama_foto = $_POST['nama_foto'];
    $id_hotel = $_POST['id_hotel'];

    $lokasi = "../data/thumb/";
    $delete = unlink($lokasi . $nama_foto);

    if ($delete) {
        $query = mysqli_query($conn, "DELETE FROM foto WHERE nama_foto = '$nama_foto' AND id_hotel = '$id_hotel'");
        if ($query) {
            echo "<script>alert('Foto berhasil dihapus');</script>";
            echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
        } else {
            echo "<script>alert('Foto gagal dihapus!');</script>";
            echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
        }
    } else {
        echo "<script>alert('Foto gagal dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?foto&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['addPbyHotel'])) {
    $id_hotel = $_POST['id_hotel'];
    $nama_bank = $_POST['nama_bank'];
    $no_rek = $_POST['no_rek'];
    $nama_pemilik = $_POST['nama_pemilik'];

    $query = mysqli_query($conn, "INSERT INTO pembayaranhotel (nama_bank, no_rek, nama_pemilik, id_hotel) VALUES ('$nama_bank', '$no_rek', '$nama_pemilik', '$id_hotel')");

    if ($query) {
        echo "<script>alert('Pembayaran berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Pembayaran gagal ditambahkan!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['deletePbyHotel'])) {
    $id_hotel = $_POST['id_hotel'];
    $id_pembayaranhotel = $_POST['id_pembayaranhotel'];

    $query = mysqli_query($conn, "DELETE FROM pembayaranhotel WHERE id_pembayaranhotel = '$id_pembayaranhotel' AND id_hotel = '$id_hotel'");

    if ($query) {
        echo "<script>alert('Pembayaran berhasil dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Pembayaran gagal dihapus!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
    }
}

if (isset($_POST['updatePbyHotel'])) {
    $id_hotel = $_POST['id_hotel'];
    $id_pembayaranhotel = $_POST['id_pembayaranhotel'];

    $query = mysqli_query($conn, "UPDATE pembayaranhotel SET nama_bank = '$_POST[nama_bank]', no_rek = '$_POST[no_rek]', nama_pemilik = '$_POST[nama_pemilik]' WHERE id_pembayaranhotel = '$id_pembayaranhotel' AND id_hotel = '$id_hotel'");

    if ($query) {
        echo "<script>alert('Pembayaran berhasil diubah!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
    } else {
        echo "<script>alert('Pembayaran gagal diubah!');</script>";
        echo "<script>window.location.href='hotel.php?pembayaran&id=" . $id_hotel . "';</script>";
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
                <div class="self-center tracking-wider text-sm mx-5 text-quaternary">
                    <?php echo $_SESSION['nama']; ?>
                    <i class="fa-solid fa-circle-user"></i>
                </div>
            </div>
            <!-- End Menu -->

        </div>
    </header>
    <!-- End Header -->

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

        <!-- Dashboard Hotel -->
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-4 gap-10">
                <div class="float-left">
                    <div class="border py-2 border-border rounded-md">
                        <?php
                        if (isset($_GET['informasiumum'])) {
                        ?>
                            <div class="py-3 px-5 text-primary font-bold">
                                Informasi Umum
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Fasilitas
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Kamar
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Foto
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Pembayaran
                            </div>
                        <?php
                        } else if (isset($_GET['fasilitas'])) {
                        ?>
                            <div class="py-3 px-5 text-quaternary">
                                Informasi Umum
                            </div>
                            <div class="py-3 px-5 text-primary font-bold">
                                Fasilitas
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Kamar
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Foto
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Pembayaran
                            </div>
                        <?php
                        } else if (isset($_GET['kamar'])) {
                        ?>
                            <div class="py-3 px-5 text-quaternary">
                                Informasi Umum
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Fasilitas
                            </div>
                            <div class="py-3 px-5 text-primary font-bold">
                                Kamar
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Foto
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Pembayaran
                            </div>
                        <?php
                        } else if (isset($_GET['foto'])) {
                        ?>
                            <div class="py-3 px-5 text-quaternary">
                                Informasi Umum
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Fasilitas
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Kamar
                            </div>
                            <div class="py-3 px-5 text-primary font-bold">
                                Foto
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Pembayaran
                            </div>
                        <?php
                        } else if (isset($_GET['pembayaran'])) {
                        ?>
                            <div class="py-3 px-5 text-quaternary">
                                Informasi Umum
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Fasilitas
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Kamar
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Foto
                            </div>
                            <div class="py-3 px-5 text-primary font-bold">
                                Pembayaran
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="float-left col-span-3">

                    <?php
                    if (isset($_GET['informasiumum'])) {
                        if (isset($_GET['id'])) {
                            $getHotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = '$_GET[id]' AND id_pengurus='$_SESSION[id_pengurus]'");
                            $dataHotel = mysqli_fetch_array($getHotel);
                    ?>
                            <!-- Informasi Umum -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Informasi Umum
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Rincian Hotel
                                    </div>
                                    <div class="py-5 px-10">
                                        <form action="" method="POST">
                                            <input type="hidden" name="updateHotel">
                                            <input type="hidden" name="id_hotel" value="<?php echo $dataHotel['id_hotel']; ?>">
                                            <input type="hidden" name="id_pengurus" value="<?php echo $_SESSION['id_pengurus']; ?>">
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Nama Hotel
                                                </div>
                                                <input type="text" name="nama_hotel" required autocomplete="off" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama hotel" value="<?php echo $dataHotel['nama_hotel']; ?>">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Deksripsi
                                                </div>
                                                <textarea autocomplete="off" class="border border-border w-full py-5 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan deskripsi hotel" name="deskripsi" required><?php echo $dataHotel['deskripsi']; ?></textarea>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Bintang
                                                </div>
                                                <input type="number" name="bintang" required autocomplete="off" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan bintang hotel" value="<?php echo $dataHotel['bintang']; ?>">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Lokasi Hotel
                                                </div>
                                                <textarea autocomplete="off" class="border border-border mb-1 w-full py-5 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan alamat hotel" name="alamat" required><?php echo $dataHotel['alamat']; ?></textarea>
                                                <select name="provinsi" required id="provinsi" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary mb-3">
                                                    <?php
                                                    $getProvinsi = mysqli_query($conn, "SELECT * FROM provinces WHERE id = '$dataHotel[provinsi]'");
                                                    $dataProvinsi = mysqli_fetch_array($getProvinsi);
                                                    ?>
                                                    <option value="<?php echo $dataHotel['provinsi']; ?>" selected><?php echo $dataProvinsi['name']; ?></option>
                                                </select>
                                                <select name="kota" required id="kota" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary mb-3">
                                                    <?php
                                                    $getKota = mysqli_query($conn, "SELECT * FROM regencies WHERE id = '$dataHotel[kota]'");
                                                    $dataKota = mysqli_fetch_array($getKota);
                                                    ?>
                                                    <option value="<?php echo $dataHotel['kota']; ?>" selected><?php echo $dataKota['name']; ?></option>
                                                </select>
                                                <div id="googleMap" style="height: 400px;" class="rounded-md"></div>
                                                <input type='hidden' value="<?php echo $dataHotel['lat']; ?>" required name='lat' id='lat'>
                                                <input type='hidden' value="<?php echo $dataHotel['lng']; ?>" required name='lng' id='lng'>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    No. Telepon
                                                </div>
                                                <input type="number" value="<?php echo $dataHotel['telepon']; ?>" name="telepon" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nomor telepon">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Waktu Check-In (Mulai dari)
                                                </div>
                                                <input type="time" value="<?php echo $dataHotel['checkin']; ?>" name="checkin" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan no telepon">
                                            </div>
                                            <div class="">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Waktu Chec-Out (Sebelum)
                                                </div>
                                                <input type="time" value="<?php echo $dataHotel['checkout']; ?>" name="checkout" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan no telepon">
                                            </div>
                                    </div>
                                </div>
                                <a href="?fasilitas&id=<?php echo $dataHotel['id_hotel']; ?>">
                                    <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                                <input type="submit" value="Simpan Perubahan" class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">
                                </form>
                            </div>
                            <!-- End of Informasi Umum -->
                        <?php
                        } else {
                        ?>
                            <!-- Informasi Umum -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Informasi Umum
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Rincian Hotel
                                    </div>
                                    <div class="py-5 px-10">
                                        <form action="" method="POST">
                                            <input type="hidden" name="addHotel">
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Nama Hotel
                                                </div>
                                                <input type="text" name="nama_hotel" required autocomplete="off" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama hotel">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Lokasi Hotel
                                                </div>
                                                <textarea class="border border-border mb-1 w-full py-5 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan alamat hotel" name="alamat" required></textarea>
                                                <select name="provinsi" required id="provinsi" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary mb-3">
                                                    <option value="">Pilih provinsi</option>
                                                </select>
                                                <select name="kota" required id="kota" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary mb-3">
                                                    <option value="">Pilih kota</option>
                                                </select>
                                                <div id="googleMap" style="height: 400px;" class="rounded-md"></div>
                                                <input type='hidden' required name='lat' id='lat'>
                                                <input type='hidden' required name='lng' id='lng'>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    No. Telepon
                                                </div>
                                                <input type="number" name="telepon" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nomor telepon">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Waktu Check-In (Mulai dari)
                                                </div>
                                                <input type="time" name="checkin" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan no telepon">
                                            </div>
                                            <div class="">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Waktu Chec-Out (Sebelum)
                                                </div>
                                                <input type="time" name="checkout" required class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan no telepon">
                                            </div>
                                    </div>
                                </div>
                                <input type="submit" value="Simpan dan Lanjutkan" class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">
                                </form>
                            </div>
                            <!-- End of Informasi Umum -->
                        <?php
                        }
                    } else if (isset($_GET['fasilitas'])) {
                        $checkQuery = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id_hotel = '$_GET[id]'");
                        if (mysqli_num_rows($checkQuery) > 0) {
                            $dataHotel = mysqli_fetch_assoc($checkQuery);
                        ?>
                            <!-- Fasilitas -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Fasilitas
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <form action="" method="POST">
                                        <input type="hidden" name="updateFacilities">
                                        <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                            Fasilitas Umum
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <?php
                                                if ($dataHotel['tempat_parkir'] == '1') {
                                                ?>
                                                    <input type="checkbox" checked name="tempat_parkir" value="Tempat Parkir" class="mr-2">
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="tempat_parkir" value="Tempat Parkir" class="mr-2">
                                                <?php
                                                }
                                                ?>
                                                <label class="text-sm text-quinary">
                                                    Tempat Parkir</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <?php
                                                if ($dataHotel['restoran'] == '1') {
                                                ?>
                                                    <input type="checkbox" checked name="restoran" value="Restoran" class="mr-2">
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="restoran" value="Restoran" class="mr-2">
                                                <?php
                                                }
                                                ?>
                                                <label class="text-sm text-quinary">
                                                    Restoran</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <?php
                                                if ($dataHotel['wifi_publik'] == '1') {
                                                ?>
                                                    <input type="checkbox" checked name="wifi_publik" value="WiFi Publik" class="mr-2">
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="wifi_publik" value="WiFi Publik" class="mr-2">
                                                <?php
                                                }
                                                ?>
                                                <label class="text-sm text-quinary">
                                                    WiFi Publik</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10">
                                            <div class="">
                                                <?php
                                                if ($dataHotel['coffee_shop'] == '1') {
                                                ?>
                                                    <input type="checkbox" checked name="coffee_shop" value="Coffee Shop" class="mr-2">
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="coffee_shop" value="Coffee Shop" class="mr-2">
                                                <?php
                                                }
                                                ?>
                                                <label class="text-sm text-quinary">
                                                    Coffee Shop</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Transportasi
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <?php
                                            if ($dataHotel['antar_jemput'] == '1') {
                                            ?>
                                                <input type="checkbox" checked name="antar_jemput" value="Antar-jemput Bandara" class="mr-2">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" name="antar_jemput" value="Antar-jemput Bandara" class="mr-2">
                                            <?php
                                            }
                                            ?>
                                            <label class="text-sm text-quinary">
                                                Antar-jemput Bandara</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10">
                                        <div class="">
                                            <?php
                                            if ($dataHotel['shuttle_bus'] == '1') {
                                            ?>
                                                <input type="checkbox" checked name="shuttle_bus" value="Shuttle Bus" class="mr-2">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" name="shuttle_bus" value="Shuttle Bus" class="mr-2">
                                            <?php
                                            }
                                            ?>
                                            <label class="text-sm text-quinary">
                                                Shuttle Bus</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Olahraga dan Hiburan
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <?php
                                            if ($dataHotel['fitness'] == '1') {
                                            ?>
                                                <input type="checkbox" checked name="fitness" value="Fitness" class="mr-2">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" name="fitness" value="Fitness" class="mr-2">
                                            <?php
                                            }
                                            ?>
                                            <label class="text-sm text-quinary">
                                                Fitness</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <?php
                                            if ($dataHotel['kolam_renang'] == '1') {
                                            ?>
                                                <input type="checkbox" checked name="kolam_renang" value="Kolam Renang" class="mr-2">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" name="kolam_renang" value="Kolam Renang" class="mr-2">
                                            <?php
                                            }
                                            ?>
                                            <label class="text-sm text-quinary">
                                                Kolam Renang</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10">
                                        <div class="">
                                            <?php
                                            if ($dataHotel['billiards'] == '1') {
                                            ?>
                                                <input type="checkbox" checked name="billiards" value="Billiards" class="mr-2">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" name="billiards" value="Billiards" class="mr-2">
                                            <?php
                                            }
                                            ?>
                                            <label class="text-sm text-quinary">
                                                Billiards</label>
                                        </div>
                                    </div>
                                </div>

                                <a href="?informasiumum&id=<?php echo $dataHotel['id_hotel']; ?>">
                                    <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </div>
                                </a>
                                <a href="?kamar&id=<?php echo $dataHotel['id_hotel']; ?>">
                                    <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                                <input type="submit" value="Simpan Perubahan" class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">
                                </form>
                            </div>
                            <!-- End of Fasilitas -->
                        <?php
                        } else {
                        ?>
                            <!-- Fasilitas -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Fasilitas
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <form action="" method="POST">
                                        <input type="hidden" name="addFacilities">
                                        <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                            Fasilitas Umum
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <input type="checkbox" name="tempat_parkir" value="Tempat Parkir" class="mr-2">
                                                <label class="text-sm text-quinary">
                                                    Tempat Parkir</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <input type="checkbox" name="restoran" value="Restoran" class="mr-2">
                                                <label class="text-sm text-quinary">
                                                    Restoran</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10 border-b border-border">
                                            <div class="">
                                                <input type="checkbox" name="wifi_publik" value="WiFi Publik" class="mr-2">
                                                <label class="text-sm text-quinary">
                                                    Wifi Publik</label>
                                            </div>
                                        </div>
                                        <div class="py-5 px-10">
                                            <div class="">
                                                <input type="checkbox" name="coffee_shop" value="Coffee Shop" class="mr-2">
                                                <label class="text-sm text-quinary">
                                                    Coffee Shop</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Transportasi
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <input type="checkbox" name="antar_jemput" value="Antar-jemput Bandara" class="mr-2">
                                            <label class="text-sm text-quinary">
                                                Antar-jemput Bandara</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10">
                                        <div class="">
                                            <input type="checkbox" name="shuttle_bus" value="Shuttle Bus" class="mr-2">
                                            <label class="text-sm text-quinary">
                                                Shuttle Bus</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Olahraga dan Hiburan
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <input type="checkbox" name="fitness" value="Fitness" class="mr-2">
                                            <label class="text-sm text-quinary">
                                                Fitness</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10 border-b border-border">
                                        <div class="">
                                            <input type="checkbox" name="kolam_renang" value="Kolam Renang" class="mr-2">
                                            <label class="text-sm text-quinary">
                                                Kolam Renang</label>
                                        </div>
                                    </div>
                                    <div class="py-5 px-10">
                                        <div class="">
                                            <input type="checkbox" name="billiards" value="Billiards" class="mr-2">
                                            <label class="text-sm text-quinary">
                                                Billiards</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Simpan dan Lanjutkan" class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">
                                </form>
                            </div>
                            <!-- End of Fasilitas -->

                        <?php
                        }
                    } else if (isset($_GET['kamar'])) {
                        if ($_GET['kamar'] !== "") {
                            $id_hotel  = $_GET['id'];
                            $id_kamar = $_GET['kamar'];
                            $query = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '$id_kamar'");
                            $data = mysqli_fetch_array($query);
                        ?>

                            <!-- Kamar -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Kamar
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Rincian Kamar
                                    </div>
                                    <div class="py-5 px-10">
                                        <form action="" method="POST">
                                            <input type="hidden" name="updateRoom">
                                            <input type="hidden" name="id_kamar" value="<?php echo $data['id_kamar']; ?>">
                                            <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Nama Kamar
                                                </div>
                                                <input type="text" name="nama_kamar" required autocomplete="off" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama kamar" value="<?php echo $data['nama_kamar']; ?>">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Jenis Kamar
                                                </div>
                                                <select name="jenis" required id="" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary">
                                                    <?php
                                                    if ($data['jenis'] == "Single Bed") {
                                                    ?>
                                                        <option value="Single Bed" selected>Single Bed</option>
                                                        <option value="Twin Bed">Twin Bed</option>
                                                        <option value="Double Bed">Double Bed</option>
                                                    <?php
                                                    } else if ($data['jenis'] == "Twin Bed") {
                                                    ?>
                                                        <option value="Twin Bed" selected>Twin Bed</option>
                                                        <option value="Single Bed">Single Bed</option>
                                                        <option value="Double Bed">Double Bed</option>
                                                    <?php
                                                    } else if ($data['jenis'] == "Double Bed") {
                                                    ?>
                                                        <option value="Double" selected>Double Bed</option>
                                                        <option value="Single Bed">Single Bed</option>
                                                        <option value="Twin Bed">Twin Bed</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Kapasitas Pengunjung
                                                </div>
                                                <input type="number" required name="kapasitas" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan kapasitas pengunjung" value="<?php echo $data['kapasitas']; ?>">
                                            </div>
                                            <div class=" mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Harga
                                                </div>
                                                <input type="number" required name="harga" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan harga" value="<?php echo $data['harga']; ?>">
                                            </div>
                                            <div class="">
                                                <div class=" text-sm text-quaternary mb-1">
                                                    Jumlah Kamar
                                                </div>
                                                <input type="number" required name="jumlah" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan jumlah kamar" value="<?php echo $data['jumlah']; ?>">
                                            </div>
                                    </div>
                                </div>
                                <input type="submit" value="Simpan Perubahan" class="inline tracking-wider bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer mb-5">
                                </form>
                            </div>
                            <!-- End of Kamar -->

                        <?php
                        } else {
                        ?>
                            <!-- Kamar -->
                            <div>
                                <div class="font-bold text-quaternary text-base mb-5">
                                    Kamar
                                </div>
                                <div class="border border-border rounded-md mb-5">
                                    <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                        Rincian Kamar
                                    </div>
                                    <div class="py-5 px-10">
                                        <form action="" method="POST">
                                            <input type="hidden" name="addRoom">
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Nama Kamar
                                                </div>
                                                <input type="text" name="nama_kamar" required autocomplete="off" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama kamar">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Jenis Kamar
                                                </div>
                                                <select name="jenis" required id="" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary">
                                                    <option value="" selected disabled>Pilih jenis kamar</option>
                                                    <option value="Single Bed">Single Bed</option>
                                                    <option value="Twin Bed">Twin Bed</option>
                                                    <option value="Double Bed">Double Bed</option>
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Kapasitas Pengunjung
                                                </div>
                                                <input type="number" required name="kapasitas" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan kapasitas pengunjung">
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Harga
                                                </div>
                                                <input type="number" required name="harga" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan harga">
                                            </div>
                                            <div class="">
                                                <div class="text-sm text-quaternary mb-1">
                                                    Jumlah Kamar
                                                </div>
                                                <input type="number" required name="jumlah" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan jumlah kamar">
                                            </div>
                                    </div>
                                </div>

                                <a href="?fasilitas&id=<?php echo $_GET['id']; ?>">
                                    <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </div>
                                </a>

                                <a href="?foto&id=<?php echo $_GET['id']; ?>">
                                    <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                                <input type="submit" value="Tambah" class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-5">
                                </form>

                                <?php
                                $id_hotel = $_GET['id'];
                                $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$id_hotel'");
                                while ($row = mysqli_fetch_array($getRoom)) {
                                ?>
                                    <div class="border border-border rounded-md mb-5">
                                        <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                            <div class="float-left py-3">
                                                <?php echo $row['nama_kamar'] ?>
                                            </div>
                                            <div class="float-right">
                                                <form action="" method="POST" class="inline">
                                                    <input type="hidden" name="deleteRoom">
                                                    <input type="hidden" name="id_kamar" value="<?php echo $row['id_kamar'] ?>">
                                                    <input type="hidden" name="id_hotel" value="<?php echo $id_hotel ?>">
                                                    <button class="bg-red-500 mr-2 text-white py-3 px-3 rounded-md">
                                                        <i class="fa-solid fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="?kamar=<?php echo $row['id_kamar']; ?>&id=<?php echo $id_hotel; ?>">
                                                    <button class="bg-primary text-white py-3 px-3 rounded-md">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="clear-both"></div>
                                        </div>
                                        <div class="py-5 px-10">
                                            <div class="mb-5">
                                                <div class="text-sm text-quinary mb-1">
                                                    Jenis Kamar
                                                </div>
                                                <div class="text-sm text-quaternary font-bold">
                                                    <?php echo $row['jenis'] ?>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quinary mb-1">
                                                    Kapasitas Pengunjung
                                                </div>
                                                <div class="text-sm text-quaternary font-bold">
                                                    <?php echo $row['kapasitas'] ?> orang
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-sm text-quinary mb-1">
                                                    Harga
                                                </div>
                                                <div class="text-sm text-quaternary font-bold">
                                                    Rp <?php echo $row['harga'] ?>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="text-sm text-quinary mb-1">
                                                    Jumlah Kamar
                                                </div>
                                                <div class="text-sm text-quaternary font-bold">
                                                    <?php echo $row['jumlah'] ?> kamar
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- End of Kamar -->
                        <?php
                        }
                    } else if (isset($_GET['foto'])) {
                        $id_hotel = $_GET['id'];
                        ?>

                        <!-- Foto -->
                        <div>
                            <div class="font-bold text-quaternary text-base mb-5">
                                Foto
                            </div>
                            <div class="border border-border rounded-md mb-5">
                                <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                    Tambahkan Foto
                                </div>
                                <div class="py-5 px-10">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="addPhoto">
                                        <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                        <div class="mb-5">
                                            <input type="file" name="foto" required>
                                        </div>
                                        <div class="mb-5">
                                            <input type="submit" value="Simpan Foto" class="tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                                        </div>
                                    </form>
                                    <div class="grid grid-cols-2 gap-5">
                                        <?php
                                        $getPhoto = mysqli_query($conn, "SELECT * FROM foto WHERE id_hotel = '$id_hotel'");
                                        while ($row = mysqli_fetch_array($getPhoto)) {
                                        ?>
                                            <div>
                                                <img src="../data/thumb/<?php echo $row['nama_foto']; ?>" alt="" class="rounded-md mb-5">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="deletePhoto">
                                                    <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                                    <input type="hidden" name="nama_foto" value="<?php echo $row['nama_foto']; ?>">
                                                    <input type="submit" value="Hapus" class="w-full py-4 text-sm rounded-md bg-red-400 text-center border border-border text-white hover:bg-red-500 cursor-pointer">
                                                </form>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <a href="?kamar&id=<?php echo $id_hotel; ?>">
                                <button class="tracking-wider bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                            </a>

                            <a href="?pembayaran&id=<?php echo $id_hotel; ?>">
                                <button class="tracking-wider bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </a>
                        </div>
                        <!-- End of Foto -->

                        <?php
                    } else if (isset($_GET['pembayaran'])) {
                        $id_hotel = $_GET['id'];
                        if ($_GET['pembayaran'] !== "") {
                            $pembayaran = $_GET['pembayaran'];
                            $getPembayaran = mysqli_query($conn, "SELECT * FROM pembayaranhotel WHERE id_pembayaranhotel='$pembayaran' AND id_hotel = '$id_hotel'");
                            $row = mysqli_fetch_array($getPembayaran);
                        ?>
                            <!-- Pembayaran -->
                            <div>
                                <div>
                                    <div class="font-bold text-quaternary text-base mb-5">
                                        Pembayaran
                                    </div>
                                    <div class="border border-border rounded-md mb-5">
                                        <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                            Transfer Bank
                                        </div>
                                        <div class="py-5 px-10">
                                            <form action="" method="POST">
                                                <input type="hidden" name="updatePbyHotel">
                                                <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                                <input type="hidden" name="id_pembayaranhotel" value="<?php echo $row['id_pembayaranhotel']; ?>">
                                                <div class="mb-5">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        Bank
                                                    </div>
                                                    <select name="nama_bank" required id="" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary">
                                                        <option value="" selected disabled><?php echo $row['nama_bank']; ?></option>
                                                        <?php
                                                        $queryBNI = "SELECT * FROM pembayaranhotel WHERE nama_bank='BNI' AND id_hotel = '$id_hotel'";
                                                        $resultBNI = mysqli_query($conn, $queryBNI);
                                                        $queryBRI = "SELECT * FROM pembayaranhotel WHERE nama_bank='BRI' AND id_hotel = '$id_hotel'";
                                                        $resultBRI = mysqli_query($conn, $queryBRI);
                                                        $queryBCA = "SELECT * FROM pembayaranhotel WHERE nama_bank='BCA' AND id_hotel = '$id_hotel'";
                                                        $resultBCA = mysqli_query($conn, $queryBCA);
                                                        if (mysqli_num_rows($resultBNI) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBNI);
                                                            echo "<option value='BNI'>BNI</option>";
                                                        }
                                                        if (mysqli_num_rows($resultBRI) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBRI);
                                                            echo "<option value='BRI'>BRI</option>";
                                                        }
                                                        if (mysqli_num_rows($resultBCA) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBCA);
                                                            echo "<option value='BCA'>BCA</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-5">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        No. Rekening
                                                    </div>
                                                    <input type="number" required name="no_rek" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nomor rekening" value="<?php echo $row['no_rek']; ?>">
                                                </div>
                                                <div class="">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        Nama Pemilik
                                                    </div>
                                                    <input type="text" autocomplete="off" required name="nama_pemilik" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama pemilik" value="<?php echo $row['nama_pemilik']; ?>">
                                                </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Simpan Perubahan" class="inline tracking-wider bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer mb-5">
                                    </form>
                                </div>
                            </div>
                            <!-- End of Pembayaran -->
                        <?php
                        } else {
                        ?>
                            <!-- Pembayaran -->
                            <div>
                                <div>
                                    <div class="font-bold text-quaternary text-base mb-5">
                                        Pembayaran
                                    </div>
                                    <div class="border border-border rounded-md mb-5">
                                        <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                            Transfer Bank
                                        </div>
                                        <div class="py-5 px-10">
                                            <form action="" method="POST">
                                                <input type="hidden" name="addPbyHotel">
                                                <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                                <div class="mb-5">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        Bank
                                                    </div>
                                                    <select name="nama_bank" required id="" class="border border-border py-3 px-5 w-full rounded-md text-sm text-quinary">
                                                        <option value="" selected disabled>Pilih Bank</option>
                                                        <?php
                                                        $queryBNI = "SELECT * FROM pembayaranhotel WHERE nama_bank='BNI' AND id_hotel = '$id_hotel'";
                                                        $resultBNI = mysqli_query($conn, $queryBNI);
                                                        $queryBRI = "SELECT * FROM pembayaranhotel WHERE nama_bank='BRI' AND id_hotel = '$id_hotel'";
                                                        $resultBRI = mysqli_query($conn, $queryBRI);
                                                        $queryBCA = "SELECT * FROM pembayaranhotel WHERE nama_bank='BCA' AND id_hotel = '$id_hotel'";
                                                        $resultBCA = mysqli_query($conn, $queryBCA);
                                                        if (mysqli_num_rows($resultBNI) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBNI);
                                                            echo "<option value='BNI'>BNI</option>";
                                                        }
                                                        if (mysqli_num_rows($resultBRI) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBRI);
                                                            echo "<option value='BRI'>BRI</option>";
                                                        }
                                                        if (mysqli_num_rows($resultBCA) == 0) {
                                                            $bank = mysqli_fetch_assoc($resultBCA);
                                                            echo "<option value='BCA'>BCA</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-5">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        No. Rekening
                                                    </div>
                                                    <input type="number" required name="no_rek" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nomor rekening">
                                                </div>
                                                <div class="">
                                                    <div class="text-sm text-quaternary mb-1">
                                                        Nama Pemilik
                                                    </div>
                                                    <input type="text" autocomplete="off" required name="nama_pemilik" class="border border-border w-full py-3 px-5 text-quinary text-sm rounded-md" placeholder="Masukkan nama pemilik">
                                                </div>
                                        </div>
                                    </div>

                                    <a href="?foto&id=<?php echo $id_hotel; ?>">
                                        <div class="tracking-wider inline-block bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </div>
                                    </a>
                                    <input type="submit" value="Tambah" class="inline tracking-wider bg-gray-600 py-4 px-5 text-sm rounded-md text-white hover:bg-gray-700 cursor-pointer mb-5">
                                    </form>
                                    <?php
                                    $getRoom = mysqli_query($conn, "SELECT * FROM pembayaranhotel WHERE id_hotel = $id_hotel");
                                    while ($row = mysqli_fetch_array($getRoom)) {
                                    ?>
                                        <div class="border border-border rounded-md mb-5">
                                            <div class="py-5 px-10 font-bold text-sm text-quaternary border-b">
                                                <div class="float-left py-3">
                                                    <?php echo $row['nama_bank'] ?>
                                                </div>
                                                <div class="float-right">
                                                    <form action="" method="POST" class="inline">
                                                        <input type="hidden" name="deletePbyHotel">
                                                        <input type="hidden" name="id_pembayaranhotel" value="<?php echo $row['id_pembayaranhotel'] ?>">
                                                        <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                                        <button class="bg-red-500 mr-2 text-white py-3 px-3 rounded-md">
                                                            <i class="fa-solid fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                    <a href="?pembayaran=<?php echo $row['id_pembayaranhotel']; ?>&id=<?php echo $id_hotel; ?>">
                                                        <button class="bg-primary text-white py-3 px-3 rounded-md">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                            <div class="py-5 px-10">
                                                <div class="mb-5">
                                                    <div class="text-sm text-quinary mb-1">
                                                        No. Rekening
                                                    </div>
                                                    <div class="text-sm text-quaternary font-bold">
                                                        <?php echo $row['no_rek'] ?>
                                                    </div>
                                                </div>
                                                <div class="mb-5">
                                                    <div class="text-sm text-quinary mb-1">
                                                        Nama Pemilik
                                                    </div>
                                                    <div class="text-sm text-quaternary font-bold">
                                                        <?php echo $row['nama_pemilik'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="dashboard.php">
                                            <button class="inline tracking-wider bg-secondary py-4 px-5 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">Selesai</button>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End of Pembayaran -->

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- End of Dashboard Hotel -->

    </div>
    <!-- End Content -->

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

<script>
    function initialize() {
        var defaultLat = 51.508742;
        var defaultLng = -0.120850;
        if (document.getElementById('lat').value !== "" && document.getElementById('lng').value !== "") {
            var currentLat = document.getElementById('lat').value;
            var currentLng = document.getElementById('lng').value;
            var myLatlng = new google.maps.LatLng(currentLat, currentLng);
            var mapProp = {
                center: myLatlng,
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!',
                draggable: true
            });
            document.getElementById('lat').value = currentLat;
            document.getElementById('lng').value = currentLng;
            // marker drag event
            google.maps.event.addListener(marker, 'drag', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });

            //marker drag event end
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });
        } else {
            var myLatlng = new google.maps.LatLng(defaultLat, defaultLng);
            var mapProp = {
                center: myLatlng,
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!',
                draggable: true
            });
            document.getElementById('lat').value = defaultLat;
            document.getElementById('lng').value = defaultLng;
            // marker drag event
            google.maps.event.addListener(marker, 'drag', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });

            //marker drag event end
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function() {
        var app = {
            show: function() {

                if ($("#provinsi").val() !== "") {
                    var province_id = $("#provinsi").val();
                    $.ajax({
                        url: "showwithval.php",
                        method: "GET",
                        data: {
                            province_id: province_id
                        },
                        success: function(data) {
                            $("#provinsi").html(data)
                        }
                    })
                } else {
                    $.ajax({
                        url: "show.php",
                        method: "GET",
                        success: function(data) {
                            $("#provinsi").html(data)
                        }
                    })
                }

            },
            tampil: function() {
                var province_id = $(this).val();
                $.ajax({
                    url: "data.php",
                    method: "POST",
                    data: {
                        province_id: province_id
                    },
                    success: function(data) {
                        $("#kota").html(data)
                    }
                })
            }
        }
        app.show();
        $(document).on("change", "#provinsi", app.tampil)
    })
</script>

</html>