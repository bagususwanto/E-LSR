<?php
// Koneksi ke database
include("koneksi.php");

// Mengambil nilai uniqueNoName dari parameter GET
$partNumber = $_GET['partNumber'];

// Query untuk mendapatkan data Source Type berdasarkan Unique Number
$query = "SELECT id_part, source_type FROM tb_master_part_dc WHERE id_part = '$partNumber'";
$result = mysqli_query($conn, $query);


// Mengirim data sebagai opsi HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id_part'] . "'>" . $row['source_type'] . "</option>";
}

// Menutup koneksi
mysqli_close($conn);
?>
