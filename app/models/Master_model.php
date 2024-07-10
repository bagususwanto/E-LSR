<?php

require_once realpath(__DIR__ . '/../composer/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;

class Master_model
{
    private $table = 'master_material';
    private $table2 = 'master_line';
    private $table3 = 'user';
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

    public function getUserData()
    {
        $sql = 'SELECT * FROM ' . $this->table3;
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
                    'content' => 'Berhasil mengubah data dengan Line: ' . $data['nama_line']
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

    public function addMasterCC($data)
    {
        $query = 'INSERT INTO ' . $this->table2 .
            ' (id, department, nama_line, line_code, cost_center, material, category, created_date, created_by, change_date, change_by) 
            VALUES (null, :department, :nama_line, :line_code, :cost_center, :material, :category, CURRENT_TIMESTAMP, :created_by, CURRENT_TIMESTAMP, :change_by)';

        $this->db->query($query);
        $this->db->bind('department', $data['department']);
        $this->db->bind('nama_line', $data['nama_line']);
        $this->db->bind('line_code', $data['line_code']);
        $this->db->bind('cost_center', $data['cost_center']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('created_by', $data['userName']);
        $this->db->bind('change_by', $data['userName']);

        try {
            // Handle file upload
            $fileUploaded = $this->uploadFile('pictureLine', '/../../public/img/line', $data['nama_line'] . '.gif');
            if (!$fileUploaded) {
                return 0;
            }

            $this->db->execute();
            $rowCount = $this->db->rowCount();

            if ($rowCount > 0) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => 'Berhasil menambahkan data dengan Line: ' . $_POST['nama_line']
                ];
            }

            return $rowCount;
        } catch (Exception $e) {
            // Handle and log error
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'Terjadi kesalahan error' . $e->getMessage()
            ];
            error_log($e->getMessage());
            return 0;
        }
    }

    public function addMasterUser($data)
    {
        // Check if username already exists
        $checkQuery = 'SELECT COUNT(*) as count FROM ' . $this->table3 . ' WHERE username = :username';
        $this->db->query($checkQuery);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        $result = $this->db->single();

        if ($result['count'] > 0) {
            // Username already exists
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'Username sudah terdaftar, Gagal menambahkan data.'
            ];
            return 0;
        }

        // Insert new user
        $query = 'INSERT INTO ' . $this->table3 .
            ' (id, username, password, nama, department, line_user, shift_user, position, role, category, created_date, created_by, change_date, change_by) 
            VALUES (null, :username, :password, :nama, :department, :line_user, :shift_user, :position, :role, :category, CURRENT_TIMESTAMP, :created_by, CURRENT_TIMESTAMP, :change_by)';

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('department', $data['department']);
        $this->db->bind('line_user', $data['line_user']);
        $this->db->bind('shift_user', $data['shift_user']);
        $this->db->bind('position', $data['position']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('created_by', $data['userlog']);
        $this->db->bind('change_by', $data['userlog']);

        try {
            // Handle file upload
            $profileUploaded = $this->uploadFile('profile', '/../../public/img/profile', $data['username'] . '.jpg');
            $signUploaded = $this->uploadFile('signature', '/../../public/img/sign', $data['username'] . '.png');
            if (!$profileUploaded || !$signUploaded) {
                return 0;
            }

            $this->db->execute();
            $rowCount = $this->db->rowCount();

            if ($rowCount > 0) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => 'Berhasil menambahkan data dengan Username: ' . $_POST['username']
                ];
            }

            return $rowCount;
        } catch (Exception $e) {
            // Handle and log error
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'Terjadi kesalahan error' . $e->getMessage()
            ];
            error_log($e->getMessage());
            return 0;
        }
    }


    public function uploadFile($fileKey, $uploadDir, $fileName, $successMessage = 'Berhasil mengunggah gambar.', $errorMessage = 'Terjadi kesalahan saat mengunggah file gambar.')
    {
        if (!empty($_FILES[$fileKey]['name'])) {
            $uploadDir = realpath(__DIR__ . $uploadDir) . '/';
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $filePath)) {
                // File upload successful
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => $successMessage
                ];
                return true;
            } else {
                // Handle file upload error
                $_SESSION['message'] = [
                    'type' => 'error',
                    'content' => $errorMessage
                ];
                return false;
            }
        }
        return true;
    }

    public function deleteFileIfExists($dir, $fileName, $extension)
    {
        $uploadDir = realpath(__DIR__ . $dir) . '/';
        $filePath = $uploadDir . $fileName . '.' . $extension;

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                // File deletion successful
                return true;
            } else {
                // Handle file deletion error
                $_SESSION['message'] = [
                    'type' => 'error',
                    'content' => 'Terjadi kesalahan saat menghapus file gambar.'
                ];
                return false;
            }
        }
        // File does not exist, no need to delete
        return true;
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

    public function deleteMasterCC($data)
    {
        $query = 'DELETE FROM ' . $this->table2 . ' WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        try {
            $deleteSucces = $this->deleteFileIfExists('/../../public/img/line', $data['lineCC'], 'gif');
            if (!$deleteSucces) {
                return 0;
            }

            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Handle and log error
            error_log($e->getMessage());
            return 0;
        }
    }


    public function deleteMasterUser($data)
    {
        $query = 'DELETE FROM ' . $this->table3 . ' WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        try {
            $deleteProfile = $this->deleteFileIfExists('/../../public/img/profile', $data['username'], 'jpg');
            $deleteSignature = $this->deleteFileIfExists('/../../public/img/sign', $data['username'], 'png');
            if (!$deleteProfile && !$deleteSignature) {
                return 0;
            }

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