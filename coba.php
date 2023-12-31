<?php
include("koneksi.php");

$qry = "SELECT * FROM tb_master_part_dc";
$hasil = mysqli_query($conn, $qry);

if (!$hasil) {
    die("Query gagal " . mysqli_error($conn));
}

echo '<option value="">Pilih</option>'; //nilai default
while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<option value='" . $row['part_name'] . "'>" . $row['part_name'] . "</option>";
}
?>
