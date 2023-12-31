<?php
// Koneksi ke database
include("koneksi.php");

// Check the type of request
if (isset($_GET['action'])) {
    $action = $_GET['action'];


    switch ($action) {
        // ================CASE UNTUK PART NUMBER CHANGE=================//
        case 'get_part_number':
            // Query untuk mendapatkan data Other Part berdasarkan Part Name
            $query = "SELECT * FROM tb_master_part_dc";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            echo '<option value="">Pilih Part Number</option>'; //nilai default
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




        // ================CASE UNTUK PART NAME CHANGE=================//
        case 'get_part_name2':
            // Query untuk mendapatkan data Other Part berdasarkan Part Name
            $query = "SELECT id_part, part_name FROM tb_master_part_dc";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            echo '<option value="">Pilih Part Name</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['part_name'] . "</option>";
            }
            break;

        case 'get_part_number2':
            // Mengambil nilai partNameId dari parameter GET
            $partName = $_GET['partName'];

            // Query untuk mendapatkan data Unique Number berdasarkan Part Name
            $query = "SELECT id_part, part_number FROM tb_master_part_dc WHERE id_part = '$partName'";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['part_number'] . "</option>";
            }
            break;

        case 'get_uniqe_number2':
            // Mengambil nilai partNameId dari parameter GET
            $partName = $_GET['partName'];

            // Query untuk mendapatkan data Unique Number berdasarkan Part Name
            $query = "SELECT id_part, uniqe_no FROM tb_master_part_dc WHERE id_part = '$partName'";
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

        case 'get_source_type2':
            // Mengambil nilai uniqueNoName dari parameter GET
            $partName = $_GET['partName'];

            // Query untuk mendapatkan data Source Type berdasarkan Unique Number
            $query = "SELECT id_part, source_type FROM tb_master_part_dc WHERE id_part = '$partName'";
            $result = mysqli_query($conn, $query);


            // Mengirim data sebagai opsi HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['source_type'] . "</option>";
            }
            break;


        // ================CASE UNTUK UNIQE NO CHANGE=================//
        case 'get_uniqe_number3':
            // Query untuk mendapatkan data Other Part berdasarkan Part Name
            $query = "SELECT id_part, uniqe_no FROM tb_master_part_dc";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            echo '<option value="">Pilih Uniqe No</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['uniqe_no'] . "</option>";
            }
            break;


        // ================CASE SOURCE TYPE CHANGE=================//
        case 'get_source_type4':
            // Query untuk mendapatkan data Other Part berdasarkan Part Name
            $query = "SELECT id_part, source_type FROM tb_master_part_dc";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            echo '<option value="">Pilih Source Type</option>'; //nilai default
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_part'] . "'>" . $row['source_type'] . "</option>";
            }
            break;




            // ================CASE CHANGE DATA FORM#1=================//
        case 'get_line':
            $lineVal = $_GET['lineVal'];

            // Query untuk mendapatkan data Unique Number berdasarkan Part Name
            $query = "SELECT id_line, nama_line FROM master_line";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah query berhasil dijalankan
            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            // Mengirim data sebagai opsi HTML
            // echo "<option value=''>$lineVal</option>"; //nilai default
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_line'] . "'>" . $row['nama_line'] . "</option>";
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