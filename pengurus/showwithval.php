<?php
include "../config/connect.php";

$province_id = $_GET["province_id"];
$current = mysqli_query($conn, "SELECT * FROM provinces WHERE id = '$province_id' ");
$currentData = mysqli_fetch_array($current);
$provinsi = $currentData['name'];
$query = mysqli_query($conn, "SELECT * FROM provinces");
$output = '<option value="' . $province_id . '" selected>' . $currentData["name"] . '</option>';
while ($row = mysqli_fetch_array($query)) {
    $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
}
echo $output;
