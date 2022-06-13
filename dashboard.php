<?php

include 'config/connect.php';

session_start();
if (!isset($_SESSION['id_pengguna'])) {
    header("location:masuk.php");
}

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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
                <div id="profile-name" class="self-center text-sm text-quinary cursor-pointer">
                    <?php echo $_SESSION['nama']; ?>
                    <i class="fa-solid fa-circle-user text-quaternary"></i>
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

    <!-- Menu -->
    <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-4 gap-10">
                    <div>
                        <div class="border py-2 border-border rounded-md">
                            <div class="py-3 px-5 text-primary font-bold">
                                Dashboard
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="p-5 bg-blue-100 rounded-md text-blue-800 mb-5">
                            Selamat Datang <?php echo $_SESSION['nama']; ?>
                        </div>
                        <div>
                            <table class="border border-border w-full">
                                <tr>
                                    <th>No</th>
                                    <th>Pesanan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                $id_pengguna = $_SESSION['id_pengguna'];
                                $getTransaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_pengguna = '$id_pengguna'");
                                $no = 1;
                                while ($row = mysqli_fetch_array($getTransaksi)) {
                                    $id_transaksi = $row['id_transaksi'];
                                ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu -->

    <!-- Footer -->
    <footer class="bg-quaternary py-10 text-sm text-center text-quinary">
        <div class=" font-playfair-display text-white font-bold text-base">
            Wonderlust
        </div>
        <div id="numberr">
            © 2022 Wonderlust Indonesia
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