<?php

include 'config/connect.php';

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                            <div class="py-3 px-5 text-quaternary">
                                Layanan
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Tagihan
                            </div>
                            <div class="py-3 px-5 text-quaternary">
                                Riwayat
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="p-5 bg-blue-100 rounded-md text-blue-800 mb-5">
                            Selamat Datang Fathoni
                        </div>
                        <div>
                            <div class="grid grid-cols-3 gap-5">
                                <a href="">
                                    <div class="border border-border rounded-md p-10 text-center">
                                        <i class="fa-solid fa-house-user text-xl mb-2 text-secondary"></i>
                                        <div class="text-base text-quinary">
                                            <b class="text-quaternary">12</b> layanan
                                        </div>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="border border-border rounded-md p-10 text-center">
                                        <i class="fa-solid fa-receipt text-xl mb-2 text-secondary"></i>
                                        <div class="text-base text-quinary">
                                            <b class="text-quaternary">12</b> tagihan
                                        </div>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="border border-border rounded-md p-10 text-center">
                                        <i class="fa-solid fa-calendar-days text-xl mb-2 text-secondary"></i>
                                        <div class="text-base text-quinary">
                                            <b class="text-quaternary">12</b> riwayat
                                        </div>
                                    </div>
                                </a>
                            </div>
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
    <?php
    $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$data[id_hotel]' and tersedia>=1 ORDER BY id_kamar ASC");
    $number = 1;
    while ($dataRoom = mysqli_fetch_array($getRoom)) {
    ?>
        $("#roomList<?php echo $number; ?>").click(function() {
            if ($("#roomList<?php echo $number; ?>").hasClass("border-secondary")) {
                $("#roomList<?php echo $number; ?>").removeClass("border-secondary");
                $("#id_kamar<?php echo $number; ?>").val(0);
            } else {
                $("#roomList<?php echo $number; ?>").toggleClass("border-secondary");
                $("#id_kamar<?php echo $number; ?>").val(<?php echo $dataRoom['id_kamar'] ?>);
            }
        });
    <?php
        $number++;
    }
    ?>
</script>

</html>