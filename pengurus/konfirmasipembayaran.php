<?php

include "../config/connect.php";

if (isset($_POST['kode_pembayaran'])) {
    $kode_pembayaran = $_POST['kode_pembayaran'];
    $updatePembayaran = mysqli_query($conn, "UPDATE pembayaran SET status = 'Sudah Dibayar' WHERE kode_pembayaran = '$kode_pembayaran'");
    echo "<script>alert('Pembayaran berhasil dikonfirmasi');</script>";
    echo "<script>location='dashboard.php';</script>";
} else {
    header("location: dashboard.php");
}
