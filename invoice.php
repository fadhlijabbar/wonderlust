<?php

include "config/connect.php";

session_start();

if (isset($_GET['kode_pembayaran'])) {
    $kode_pembayaran = $_GET['kode_pembayaran'];

?>

    <!DOCTYPE html>
    <html id="content">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INVOICE - <?php echo $kode_pembayaran ?></title>
        <link href="dist/output.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/be579e605d.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <table class="w-full border border-black">
            <tr class="border border-black">
                <td class="p-5 text-base font-playfair-display font-bold text-quaternary">
                    Wonderlust<br>
                    <div class="font-poppins text-quinary text-sm font-normal tracking-wider">
                        Jl. Pendidikan, Cibiru Wetan,<br>
                        Kec. Cileunyi, Kabupaten Bandung,<br>
                        Jawa Barat
                    </div>
                </td>
                <td class="p-5 font-bold text-base text-secondary">
                    <div class="float-right">
                        INVOICE
                    </div>
                </td>
            </tr>
            <tr class="border border-black">
                <td class="p-5">
                    <?php
                    $getPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE kode_pembayaran = '$kode_pembayaran'");
                    $dataPembayaran = mysqli_fetch_assoc($getPembayaran);
                    $id_transaksi = $dataPembayaran['id_transaksi'];
                    $getTransaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
                    $dataTransaksi = mysqli_fetch_assoc($getTransaksi);
                    if (isset($_SESSION['id_pengguna'])) {
                        echo "<b>ID Transaksi : " . $dataPembayaran['id_transaksi'] . "</b><br>";
                        echo "Nama : " . $_SESSION['nama'] . "<br>";
                        echo "Email : " . $_SESSION['email'];
                    } else {
                        $getTamu = mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu = '$dataTransaksi[id_tamu]'");
                        $dataTamu = mysqli_fetch_array($getTamu);
                        echo "<b>ID Transaksi : " . $dataPembayaran['id_transaksi'] . "</b><br>";
                        echo "Nama : " . $dataTamu['nama_tamu'] . "<br>";
                        echo "Email : " . $dataTamu['email'];
                    }
                    ?>
                </td>
                <td class="p-5">
                    <?php
                    echo "<b>Kode Pembayaran : " . $kode_pembayaran . "</b><br>";
                    echo "Tanggal Pembayaran : " . $dataPembayaran['tanggal'] . "<br>";
                    echo "Batas Pembayaran : " . $dataPembayaran['kadaluarsa'] . "<br>";
                    ?>
                </td>
            </tr>
            <tr>
                <td class="p-5" colspan="2">
                    <table class="w-full border border-black">
                        <tr>
                            <th colspan="4" class="p-5 border border-black">Nama Hotel</th>
                        </tr>
                        <tr>
                            <th class="p-5 border border-black">No</th>
                            <th class="p-5 border border-black">Nama Kamar</th>
                            <th class="p-5 border border-black">Malam</th>
                            <th class="p-5 border border-black">Jumlah</th>
                        </tr>
                        <?php
                        $checkin = $dataTransaksi['checkin'];
                        $checkout = $dataTransaksi['checkout'];
                        $checkinNew = strtotime($checkin);
                        $checkoutNew = strtotime($checkout);
                        $jumlah_hari = ($checkoutNew - $checkinNew) / (60 * 60 * 24);
                        $no = 0;
                        $harga = 0;
                        $getDetail2 = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_transaksi = '$dataPembayaran[id_transaksi]'");
                        while ($dataDetail2 = mysqli_fetch_array($getDetail2)) {
                            $no++;
                            $getKamar = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '$dataDetail2[id_kamar]'");
                            $dataKamar = mysqli_fetch_array($getKamar);
                        ?>
                            <tr>
                                <td class="p-5 border border-black text-center"><?php echo $no; ?></td>
                                <td class="p-5 border border-black text-center"><?php echo $dataKamar['nama_kamar'] ?></td>
                                <td class="p-5 border border-black text-center"><?php echo $jumlah_hari . " malam" ?></td>
                                <td class="p-5 border border-black text-center">
                                    <?php
                                    $getHotel = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$dataKamar[id_hotel]'");
                                    $dataHotel = mysqli_fetch_array($getHotel);
                                    echo "Rp" . number_format($dataHotel['harga'], 2, '.', ',');;
                                    ?>
                                </td>
                            </tr>
                        <?php
                            $harga += $dataHotel['harga'];
                        }
                        ?>
                        <tr>
                            <td class="p-5 border border-black text-center" colspan="3">PPN 11%</td>
                            <td class="p-5 border border-black text-center">
                                <?php
                                $ppn = $harga * 0.11;
                                echo "Rp" . number_format($ppn, 2, '.', ',');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 border border-black text-center font-bold" colspan="3">Total</td>
                            <td class="p-5 border border-black text-center font-bold">
                                <?php
                                $total = $harga + $ppn;
                                echo "Rp" . number_format($total, 2, '.', ',');
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.onload = function() {
            var element = document.getElementById('content');
            var opt = {
                margin: 0.5,
                filename: '<?php echo "INVOICE - " . $dataPembayaran['kode_pembayaran'] ?>.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            var save = html2pdf().set(opt).from(element).save();
            setTimeout(function() {
                self.close();
            }, 2000);

        }
    </script>

    </html>

<?php
} else {
    echo "<script>alert('Kode pembayaran tidak ditemukan!');</script>";
    echo "<script>location='index.php';</script>";
}
?>