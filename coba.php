<?php
include("koneksi.php");

// Variabel yang dicari
$namaUser = "Murtala"; // Ganti dengan nilai yang sesuai

// Query SQL untuk mendapatkan nilai shift berdasarkan nama
$sql = "SELECT nama, shift_user FROM user WHERE nama = '$namaUser'";
$result = $conn->query($sql);


// Periksa apakah hasil query ada
if ($result->num_rows > 0) {
    // Ambil nilai shift
    $row = $result->fetch_assoc();
    $shiftUser = $row["shift_user"];
    echo $shiftUser;
}
// Tutup koneksi database
$conn->close();
?>




<!-- UNTUK MENGAMBIL NILAI DI DATABSE METHODE OFFSET -->
<?php
// include("koneksi.php");

// // Variabel yang dicari
// $namaUser = "Murtala"; // Ganti dengan nilai yang sesuai

// // Query SQL untuk mendapatkan nilai shift berdasarkan nama
// $sql = "SELECT nama, shift_user FROM user WHERE nama = '$namaUser'";
// $result = $conn->query($sql);

// // Periksa apakah hasil query ada
// if ($result->num_rows > 0) {
//     // Ambil nilai shift
//     $row = $result->fetch_assoc();
//     $shiftUser = $row["shift_user"];
//     echo "Nilai shift untuk $namaUser adalah: $shiftUser";
// } else {
//     echo "Nilai tidak ditemukan untuk $namaUser";
// }

// // Tutup koneksi database
// $conn->close();
?>