<?php
include "../config/connect.php";

$query = mysqli_query($conn, "SELECT * FROM provinces");
$output = '<option value="">Pilih provinsi</option>';
while ($row = mysqli_fetch_array($query)) {
    $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
}
echo $output;
