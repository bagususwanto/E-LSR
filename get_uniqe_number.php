<?php
include("koneksi.php");

// Mengambil nilai partNameId dari parameter GET
$partNumber = $_GET['partNumber'];

// Query untuk mendapatkan data Unique Number berdasarkan Part Name
$query = "SELECT id_part, uniqe_no FROM tb_master_part_dc WHERE id_part = '$partNumber'";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dijalankan
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

// Mengirim data sebagai opsi HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id_part'] . "'>" . $row['uniqe_no'] . "</option>";
}

// Menutup koneksi
mysqli_close($conn);
?>