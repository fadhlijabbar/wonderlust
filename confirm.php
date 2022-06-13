<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "config/connect.php";

session_start();

if (isset($_POST['insert'])) {
    if (isset($_SESSION['id_pengguna'])) {
        $id_pengguna = $_SESSION['id_pengguna'];
        $nama_pengguna = $_SESSION['nama'];
        $email = $_SESSION['email'];
        $id_hotel = $_POST['id'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $getTamu = mysqli_query($conn, "SELECT * FROM tamu WHERE email = '$email'");
        $addBooking = mysqli_query($conn, "INSERT INTO transaksi (id_hotel, checkin, checkout, id_pengguna, id_tamu) VALUES ('$id_hotel', '$checkin', '$checkout', '$id_pengguna', 0)");
        $getBooking = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_tamu = '$id_tamu' ORDER BY id_transaksi DESC LIMIT 1");
        $transaksi = mysqli_fetch_assoc($getBooking);
        $id_transaksi = $transaksi['id_transaksi'];
        for ($i = 1; $i <= $_POST['form_total']; $i++) {
            if (isset($_POST['id_kamar' . $i])) {
                ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                $addDetailTransaksi = mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_hotel, id_kamar) VALUES ('$id_transaksi', '$id_hotel', '${'id_kamar' .$i}')");
            } else {
            }
        }
        $total = $_POST['total'];
        $now = date("Ymd");
        $kode_pembayaran = $now . $id_transaksi . $id_tamu;
        $kadaluarsa = date("Y-m-d", strtotime($now . "+1 day"));
        $status = "Menunggu Pembayaran";
        $addPembayaran = mysqli_query($conn, "INSERT INTO pembayaran (id_transaksi, total, kode_pembayaran, tanggal, kadaluarsa, bukti, status) VALUES ('$id_transaksi', '$total', '$kode_pembayaran', NOW(),'$kadaluarsa', '', '$status')");
        header("Location: payment.php?kode_pembayaran=$kode_pembayaran");
    } else {
        $nama = $_POST['nama_pemesan'];
        $email = $_POST['email_pemesan'];
        $addGuest = mysqli_query($conn, "INSERT INTO tamu (nama_tamu, email) VALUES ('$nama', '$email')");
        if ($addGuest) {
            $id_hotel = $_POST['id'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $getTamu = mysqli_query($conn, "SELECT * FROM tamu WHERE email = '$email'");
            $tamu = mysqli_fetch_assoc($getTamu);
            $id_tamu = $tamu['id_tamu'];
            $addBooking = mysqli_query($conn, "INSERT INTO transaksi (id_hotel, checkin, checkout, id_pengguna, id_tamu) VALUES ('$id_hotel', '$checkin', '$checkout', 0, '$id_tamu')");
            $getBooking = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_tamu = '$id_tamu' ORDER BY id_transaksi DESC LIMIT 1");
            $transaksi = mysqli_fetch_assoc($getBooking);
            $id_transaksi = $transaksi['id_transaksi'];
            for ($i = 1; $i <= $_POST['form_total']; $i++) {
                if (isset($_POST['id_kamar' . $i])) {
                    ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                    $addDetailTransaksi = mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_hotel, id_kamar) VALUES ('$id_transaksi', '$id_hotel', '${'id_kamar' .$i}')");
                } else {
                }
            }
            $total = $_POST['total'];
            $now = date("Ymd");
            $kode_pembayaran = $now . $id_transaksi . $id_tamu;
            $kadaluarsa = date("Y-m-d", strtotime($now . "+1 day"));
            $status = "Menunggu Pembayaran";
            $addPembayaran = mysqli_query($conn, "INSERT INTO pembayaran (id_transaksi, total, kode_pembayaran, tanggal, kadaluarsa, bukti, status) VALUES ('$id_transaksi', '$total', '$kode_pembayaran', NOW(),'$kadaluarsa', '', '$status')");
        }
        header("Location: payment.php?kode_pembayaran=$kode_pembayaran");
    }

    //Load Composer's autoloader
    require getcwd() . '/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aryaputrahaidar@gmail.com';                     //SMTP username
        $mail->Password   = 'ntgtebrwtzqxqoqr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('aryaputrahaidar@gmail.com', 'Mailer');
        $mail->addAddress($email, $nama);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'INVOICE';
        // $mail->Body    = 'Unduh Invoice Anda<br><b>http://localhost/wonderlust/invoice.php?kode_pembayaran=' . $kode_pembayaran . '</b>';
        $mail->Body    = '<b>' . $status . ' sebelum ' . $kadaluarsa . '</b><br>Total Bayar : ' . $total . '<br>Kode Pembayaran :' . $kode_pembayaran . '<br>Unduh Invoice Anda<br><b>http://localhost/wonderlust/invoice.php?kode_pembayaran=' . $kode_pembayaran . '</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
                                    <input type="hidden" name="insert">
                                    <input type="hidden" name="id" value="<?php echo $id_hotel; ?>">
                                    <input type="hidden" name="nama_pemesan" value="<?php echo $_POST['nama_pemesan'] ?>">
                                    <input type="hidden" name="email_pemesan" value="<?php echo $_POST['email_pemesan'] ?>">
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
                                            if (isset($_POST['id_kamar' . $i])) {
                                                ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                                            } else {
                                                ${"id_kamar" . $i} = "";
                                            }
                                            $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                            if (mysqli_num_rows($getRoom) > 0) {
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
                                                </div>
                                        <?php
                                            } else {
                                            }
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
                                        if (isset($_POST['id_kamar' . $i])) {
                                            ${"id_kamar" . $i} = $_POST['id_kamar' . $i];
                                        } else {
                                            ${"id_kamar" . $i} = "";
                                        }
                                        $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar='${"id_kamar" .$i}'");
                                        if (mysqli_num_rows($getRoom) > 0) {
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
                                        } else {
                                        }
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
                                <input type="hidden" name="total" value="<?php echo $totalharga; ?>">
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