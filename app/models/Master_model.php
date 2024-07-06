<?php

require_once realpath(__DIR__ . '/../composer/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;

class Master_model
{
    private $table = 'master_material';
    private $table2 = 'master_line';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getMaterialData()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function getCostCenterData()
    {
        $sql = 'SELECT * FROM ' . $this->table2;
        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function getMaterialById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function UbahDataMaterial($data)
    {

        $query = 'UPDATE ' . $this->table . ' SET 
                    part_number = :partNumber,
                    part_name = :partName,
                    uniqe_no = :uniqueNo,
                    unit_usage = :unitUsage,
                    source_type = :sourceType,
                    material = :material,
                    price = :price,
                    change_by = :user
                    WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('partNumber', $data['part_number']);
        $this->db->bind('partName', $data['part_name']);
        $this->db->bind('uniqueNo', $data['unique_no']);
        $this->db->bind('unitUsage', $data['unit_usage']);
        $this->db->bind('sourceType', $data['source_type']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('user', $data['userName']);
        $this->db->bind('id', $data['id']);

        try {
            $this->db->execute();
            $rowCount = $this->db->rowCount();
            if ($rowCount > 0) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => 'Berhasil mengubah data Part Number: ' . $data['part_number']
                ];
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'content' => 'Gagal mengubah data.'
                ];
            }
            return $rowCount;
        } catch (Exception $e) {
            // Menangani error dan mungkin log error atau memberi tahu pengguna
            error_log($e->getMessage());
            $_SESSION['message'] = [
                'type' => 'error',
                // 'content' => 'Terjadi kesalahan saat menambahkan data.'
                'content' => 'Terjadi kesalahan saat mengubah data: ' . $e->getMessage()
            ];
            return 0;
        }
    }

    public function UbahDataCostCenter($data)
    {
        // var_dump($data); // Hapus atau komentari perintah ini

        $query = 'UPDATE ' . $this->table2 . ' SET 
                    department = :department,
                    nama_line = :namaLine,
                    line_code = :lineCode,
                    cost_center = :costCenter,
                    material = :material,
                    change_by = :user
                    WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('department', $data['department']);
        $this->db->bind('namaLine', $data['nama_line']);
        $this->db->bind('lineCode', $data['line_code']);
        $this->db->bind('costCenter', $data['cost_center']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('user', $data['userName']);
        $this->db->bind('id', $data['id']);

        try {
            // Handle file upload
            if (!empty($_FILES['pictureLine']['name'])) {
                $uploadDir = realpath(__DIR__ . '/../../public/img/line') . '/';
                $fileName = $data['nama_line'] . '.gif';
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['pictureLine']['tmp_name'], $filePath)) {
                    // File upload successful
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'content' => 'Berhasil mengunggah gambar.'
                    ];
                } else {
                    // Handle file upload error
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'content' => 'Terjadi kesalahan saat mengunggah file gambar.'
                    ];
                    return 0;
                }
            }

            // Eksekusi query untuk mengubah data
            $this->db->execute();
            $rowCount = $this->db->rowCount();

            if ($rowCount > 0) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => 'Berhasil mengubah data.'
                ];
            }

            return $rowCount;
        } catch (Exception $e) {
            // Handle error and possibly log error
            error_log("Error updating data: " . $e->getMessage());
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'Terjadi kesalahan saat mengubah data: ' . $e->getMessage()
            ];
            return 0;
        }
    }


    public function getAllUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addMasterMaterial($data)
    {
        $query = 'INSERT INTO ' . $this->table .
            ' (id, part_number, part_name, uniqe_no, unit_usage, source_type, material, price, created_date, created_by, change_date, change_by) 
            VALUES (null, :part_number, :part_name, :uniqe_no, :unit_usage, :source_type, :material, :price, CURRENT_TIMESTAMP, :created_by, CURRENT_TIMESTAMP, :change_by)';

        $this->db->query($query);
        $this->db->bind('part_number', $data['part_number']);
        $this->db->bind('part_name', $data['part_name']);
        $this->db->bind('uniqe_no', $data['uniqe_no']);
        $this->db->bind('unit_usage', $data['unit_usage']);
        $this->db->bind('source_type', $data['source_type']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('created_by', $data['userName']);
        $this->db->bind('change_by', $data['userName']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Handle and log error
            error_log($e->getMessage());
            return 0;
        }
    }

    public function truncateTable()
    {
        $query = 'TRUNCATE TABLE ' . $this->table;
        $this->db->query($query);

        // $resetQuery = 'ALTER TABLE ' . $this->table . ' AUTO_INCREMENT = 1';
        // $this->db->query($resetQuery);

        try {
            $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo 'Error while truncating the table: ' . $e->getMessage();
            return false;
        }
    }


    public function importExcelFile($filePath, $userName)
    {
        // Load file Excel
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        try {
            $this->truncateTable();

            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                if (array_filter($row)) {
                    $col1 = $row[0];
                    $col2 = $row[1];
                    $col3 = $row[2];
                    $col4 = $row[3];
                    $col5 = $row[4];
                    $col6 = $row[5];
                    $col7 = $row[6];

                    // Buat query untuk insert data ke tabel
                    $query = 'INSERT INTO ' . $this->table .
                        ' (part_number, part_name, uniqe_no, unit_usage, source_type, material, price, created_date, created_by, change_by) 
                      VALUES (:partNumber, :partName, :uniqueNo, :unitUsage, :sourceType, :material, :price, CURRENT_TIMESTAMP, :user, :user)';

                    // Bind parameter ke query
                    $this->db->query($query);
                    $this->db->bind('partNumber', $col1);
                    $this->db->bind('partName', $col2);
                    $this->db->bind('uniqueNo', $col3);
                    $this->db->bind('unitUsage', $col4);
                    $this->db->bind('sourceType', $col5);
                    $this->db->bind('material', $col6);
                    $this->db->bind('price', $col7);
                    $this->db->bind('user', $userName);

                    $this->db->execute();
                }
            }
            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage();
            return false;
        }
    }
    public function getDeleteMasterMaterial($data)
    {
        $id = $data['id'];

        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Handle and log error
            error_log($e->getMessage());
            return 0;
        }
    }







}

?>