<?php

include "config/connect.php";

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
            <div class="float-right h-14 flex md:hidden bg-primary text-white rounded-lg cursor-pointer" id="bars-btn">
                <div class="self-center px-6">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <!-- End Bars Button -->

            <!-- Menu -->
            <div class="float-right h-14 hidden md:flex">
                <div class="self-center tracking-wider text-sm mx-5 text-quinary">
                    <a href="">
                        Tentang Kami
                    </a>
                </div>
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

        <!-- Dashboard Home -->
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-8 gap-5">
                <div class="col-span-2">
                    <div class="bg-white border border-border p-5 rounded-md">
                        <div class="text-sm text-quaternary font-bold tracking-wider mb-5">
                            Urutkan berdasarkan
                        </div>
                        <div class="grid grid-cols-2 text-sm gap-2">
                            <div class="">
                                <div>
                                    <input type="radio" name="sort">
                                    <div class="label inline-block text-quinary">Harga tertinggi</div>
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <input type="radio" name="sort">
                                    <div class="label inline-block text-quinary">Harga terendah</div>
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <input type="radio" name="sort">
                                    <div class="label inline-block text-quinary">Bintang tertinggi</div>
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <input type="radio" name="sort">
                                    <div class="label inline-block text-quinary">Bintang terendah</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-10">
                        <div class="float-left">
                            <div class="">
                                <div class=" text-base font-bold font-playfair-display text-quaternary">
                                    Hasil pencarian
                                </div>
                                <div class=" text-sm font-poppins text-quinary">
                                    Hasil pencarian dari kata kunci "<?php echo $_GET['q']; ?>"
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="">
                                <form action="" method="GET">
                                    <input type="text" autocomplete="off" name="q" placeholder="Cari hotel atau penginapan" class="border border-border py-4 px-5 text-sm w-52 md:w-96 inline rounded-md focus:outline-none text-quaternary tracking-wider" value="<?php echo $_GET['q']; ?>">
                                    <input type="submit" value="Cari" class="inline tracking-wider bg-secondary py-4 px-6 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer">
                                </form>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-10">
                        <?php
                        $q = $_GET['q'];
                        $query = "SELECT * FROM hotel WHERE nama_hotel LIKE '%$q%'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
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
                        } else {
                            ?>
                            <div class="w-full col-span-8 p-5 bg-red-500 rounded-md text-sm font-poppins text-white">
                                Hotel tidak ditemukan
                            </div>
                        <?php
                        }
                        ?>
                    </div>
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
            © 2022 Wonderlust Indonesia
        </div>
    </footer>
    <!-- End Footer -->

</body>

</html>