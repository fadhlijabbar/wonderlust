<?php

include "config/connect.php";

// $getRoom = mysqli_query($conn, "SELECT * FROM kamar WHERE id_hotel = '$data[id_hotel]' and tersedia>=1 ORDER BY id_kamar ASC");
$form_total = $_GET['form_total'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
for ($i = 1; $i < $form_total; $i++) {
    ${"id_kamar" . $i} = $_GET['id_kamar' . $i];
}

if ((!isset($_GET['id_kamar' . $i])) || $_GET['id_kamar' . $i] == '0') {
    // echo '<script>window.history.back()</script>';
}

echo $i;
