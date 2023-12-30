<?php
// Koneksi ke database
include("koneksi.php");


// Mengambil nilai partNameId dari parameter GET
$partNameId = $_GET['partNameId'];

// Query untuk mendapatkan data Other Part berdasarkan Part Name
$query = "SELECT id_part, part_number FROM tb_master_part_dc WHERE id_part = $partNameId";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dijalankan
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

// Mengirim data sebagai opsi HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id_part'] . "'>" . $row['part_number'] . "</option>";
}

// Menutup koneksi
mysqli_close($conn);
?>