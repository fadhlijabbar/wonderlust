<?php
    $transaction = array();
    $records = mysqli_query($conn, 'SELECT kode_pembayaran, status, tanggal, total FROM transaksi');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="dist/output.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
    </head>
</head>

<body class="font-poppins"></body>

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

<body>
    <div class="py-14">
        <div class="w-full">
            <div class="container mx-auto px-6">
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <div>
                            <div class="py-7 px-5 border border-border rounded-md mb-10">
                                <div class="mb-10">
                                    <div>
                                        <img src="assets/img/user1.png" alt="" class="float-left mr-5 mb-5 usr-img">
                                    </div>
                                    <div class="float-left">
                                        <div class=" text-sm text-quinary tracking-wider">
                                            Fathoni Zikri Nugroho
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="My Booking" class="w-full inline rounded-md py-2 mb-1 hover:bg-primary-hover hover:duration-200">
                                <input type="submit" value="Purchase List" class="w-full inline rounded-md py-2 mb-1 hover:bg-primary-hover hover:duration-200">
                                <input type="submit" value="My Bills" class="w-full inline rounded-md py-2 mb-1 hover:bg-primary-hover hover:duration-200">
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 lg:grid-cols-1 gap-16">
                                <div class="w-full py-7 px-5 border border-border rounded-md mb-10 ">
                                    <div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Kode Pembayaran</th>
                                                    <th>Status</th>
                                                    <th>Tanggal</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                while (  $row =  mysqli_fetch_array($records)    )
                                                {
                                                    $transaction[] = $row;
                                                    foreach ($transaction as $transactions):
                                            ?>
                                            <tr>
                                                <td><?echo $transactions['kode_pembayaran']; ?></td>
                                                <td><?echo $transactions['status']; ?></td>
                                                <td><?echo $transactions['tanggal']; ?></td>
                                                <td><?echo $transactions['total']?></td>
                                            </tr>
                                            <?php endforeach; 
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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