<?php
include("koneksi.php");

// insert data ke db
if (isset($_POST['add'])) {
    $partNumber = mysqli_real_escape_string($conn, $_POST['hiddenPartNumber']);
    $partName = mysqli_real_escape_string($conn, $_POST['hiddenPartName']);
    $uniqeNo = mysqli_real_escape_string($conn, $_POST['hiddenUniqeNo']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $sourceType = mysqli_real_escape_string($conn, $_POST['hiddenSourceType']);

    // Insert data 
    $sql = "INSERT INTO tb_data_dc (id_part, part_number, part_name, uniqe_no, part_qty, reason_lsr, condition_lsr, repair_lsr, source_type) 
            VALUES (null, '$partNumber', '$partName', '$uniqeNo', '$qty', '', '', '', '$sourceType')";

    // Cek apakah query berhasil dijalankan
    if ($conn->query($sql) === TRUE) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi database
$conn->close();
?>