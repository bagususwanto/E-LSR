<?php
// Koneksi ke database
include("koneksi.php");

// Check the type of request
if (isset($_GET['action'])) {
    $action = $_GET['action'];


    switch ($action) {
        case 'get_part_number':
            // Query untuk mendapatkan data Other Part berdasarkan Part Name
            $query = "SELECT id_part, part_number FROM tb_master_part_dc";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            echo '<option value="">Pilih</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['part_number'] . "</option>";
            }
            break;

        case 'get_part_name':
            // Mengambil nilai partNameId dari parameter GET
            $partNumber = $_GET['partNumber'];

            // Query untuk mendapatkan data Unique Number berdasarkan Part Name
            $query = "SELECT id_part, part_name FROM tb_master_part_dc WHERE id_part = '$partNumber'";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['part_name'] . "</option>";
            }
            break;

        case 'get_uniqe_number':
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
            break;

        case 'get_source_type':
            // Mengambil nilai uniqueNoName dari parameter GET
            $partNumber = $_GET['partNumber'];

            // Query untuk mendapatkan data Source Type berdasarkan Unique Number
            $query = "SELECT id_part, source_type FROM tb_master_part_dc WHERE id_part = '$partNumber'";
            $result = mysqli_query($conn, $query);


            // Mengirim data sebagai opsi HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['source_type'] . "</option>";
            }
            break;

        case 'partNameVal':
            $qry = "SELECT * FROM tb_master_part_dc";
            $hasil = mysqli_query($conn, $qry);

            if (!$hasil) {
                die("Query gagal " . mysqli_error($conn));
            }

            echo '<option value="">Pilih</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<option value='" . $row['part_name'] . "'>" . $row['part_name'] . "</option>";
            }
            break;

        case 'uniqeNoVal':
            $qry = "SELECT * FROM tb_master_part_dc";
            $hasil = mysqli_query($conn, $qry);

            if (!$hasil) {
                die("Query gagal " . mysqli_error($conn));
            }

            echo '<option value="">Pilih</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<option value='" . $row['uniqe_no'] . "'>" . $row['uniqe_no'] . "</option>";
            }
            break;

        default:
            // Handle unknown action
            break;
    }
} else {
    // Handle case where no action is specified
}

// Menutup koneksi
mysqli_close($conn);
?>