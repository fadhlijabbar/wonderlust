<?php
    include "../config/connect.php";
    
    if (isset($_POST['submit'])) {
        $email  = $_POST['email'];
        if ($email == '') {
            $err = "<script>alert('Silahkan Masukkan Email');</script>";
        }else{
            $query  = mysqli_query($conn, "SELECT * FROM pengurus where email = '$email'");
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['email'] = $data['email'];
                $to = $_SESSION['email'];

                $token_reset    = md5(rand(0,1000));
                $judul_email    = "Ganti Password";
                $isi_email      = "Seseorang meminta untuk mengganti password. Silahkan klik link dibawah ini: <br/>";
                $isi_email      .= base_url()."/ganti_password.php?email=$email&token=$token_reset";
                // kirim_email($email, $email, $judul_email, $isi_email);
                $headers="MIME-Version: 1.0"."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

                $headers .="From: <aryaputrahaidar@gmail.com>"."\r\n";
                
                mail($to,$judul_email,$isi_email,$headers);

                $query  = mysqli_query($conn, "UPDATE pengurus SET token_reset = '$token_reset WHERE email = '$email'");
                $sukses = "<script>alert('Link ganti password sudah dikirim ke email anda');</script>";
            }else {
                echo "<script>alert('Email: $email tidak ditemukan');</script>";
                echo "<script>location='lupakatasandi1.php';</script>";
            }
        }

    }
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
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

<body class="font-poppins">

    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="hidden md:grid bg-primary-light">
            <div class="grid justify-items-center">
                <img src="../src/assets/img/login-illust.png" alt="" class="self-center">
            </div>
        </div>
        <div class="py-40 px-10 md:px-20 xl:px-32 ">
            <div class="font-bold font-playfair-display text-quaternary text-lg text-center mb-14">
                <a href="../src">
                    Wonderlust
                </a>
            </div>
            <div class="font-bold tracking-wider text-quaternary text-base mb-2">
                Cari Akun Anda
            </div>
            <div class="text-sm tracking-wider text-quinary mb-5">
                Slakan masukkan email Anda untuk mengatur ulang kata sandi.
            </div>
            <div class="font-bold text-sm text-quaternary mb-2">
                Email
            </div>
            <?php if($err){echo"<div class='error'>$err</div>";}?>
            <?php if($sukses){echo"<div class='sukses'>$sukses</div>";}?>
            <form action="" method="POST">
                <input type="text" name="email" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border mb-5" value="<?php echo $email?>">
                <input type="submit" name="submit" value="Lupa Password" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2"/>
            </form>
        </div>
    </div>
    <!-- w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border mb-5
    <input type="submit" name="submit" value="Atur Ulang Sandi" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2"> -->
    <!-- <input type="text" placeholder="Masukkan email Anda" class="w-full py-4 px-5 text-sm inline rounded-md focus:outline-none text-quaternary tracking-wider border-border border mb-5">
    <a href="masuk.php">
    <input type="submit" value="Atur Ulang Sandi" class="w-full inline tracking-wider bg-secondary py-4 text-sm rounded-md text-white hover:bg-secondary-hover hover:duration-200 cursor-pointer mb-2">
    <a href="masuk.php">
    <input type="submit" value="Batal" class="w-full inline tracking-wider bg-white py-4 text-sm rounded-md text-quaternary border border-border hover:bg-primary hover:duration-200 hover:text-white cursor-pointer"> -->
</body>

</html>