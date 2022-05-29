<?php
include "../config/connect.php";

$province_id = $_POST["province_id"];
if ($province_id !== "") {
    $query = mysqli_query($conn, "SELECT * FROM regencies WHERE province_id = '$province_id' ");
    $output = '<option value="">Pilih kota</option>';
    while ($row = mysqli_fetch_array($query)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
} else {
    $output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
