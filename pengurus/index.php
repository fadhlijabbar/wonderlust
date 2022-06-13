<?php

include "../config/connect.php";

session_start();
if (isset($_SESSION['id_pengurus'])) {
    header("location:dashboard.php");
}

if (isset($_POST['in'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM pengurus WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['id_pengurus'] = $row['id_pengurus'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        echo "<script>window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Email atau kata sandi salah!');</script>";
    }
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Wonderlust/dist/output.css" rel="stylesheet">
    <title>Masuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body class="font-poppins bg-primary-light">

    <div class="w-full md:w-500px bg-white mx-auto">
        <div class="grid grid-cols-1">
            <div class="py-20 px-10">
                <div class="font-bold font-playfair-display text-quaternary text-lg text-center mb-14">
                    <a href="/wonderlust">
                        Wonderlust
                    </a>
                </div>
                <div class="font-bold tracking-wider text-quaternary text-base mb-2">
                    Masuk ke Akun Anda
                </div>
                <div class="text-sm tracking-wider text-quinary mb-5">
                    Silakan masukkan email dan kata sandi Anda untuk melanjutkan.
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="in">
                    <div class="font-bold text-sm text-quaternary mb-2">
                        Email
                    </div>
                    <input type="email" name="email" required placeholder="Masukkan email Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border mb-5">
                    <div class="font-bold text-sm text-quaternary mb-2">
                        Kata Sandi
                    </div>
                    <input type="password" name="password" required placeholder="Masukkan kata sandi Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border mb-5">
                    <input type="submit" value="Masuk" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover cursor-pointer mb-14">
                </form>
                <div class="text-sm text-quinary text-center">
                    Belum mempunyai akun?
                    <a href="daftar.php" class="text-secondary font-bold">Daftar</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>