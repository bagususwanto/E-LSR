<?php
include("koneksi.php");


// insert data ke db
if (isset($_POST['add'])) {
    $partNumber = $_POST['partNumber'];
    $partName = $_POST['partName'];
    $uniqeNo = $_POST['uniqeNo'];
    $qty = $_POST['qty'];

    // Insert data 
    $sql = "INSERT INTO tb_data_dc (id_part, part_number, part_name, uniqe_no,part_qty) 
    VALUES (null, '$partNumber', '$partName', '$uniqeNo', '$qty')";

    if ($conn->query($sql) === TRUE) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Tutup koneksi database
$conn->close();

?>