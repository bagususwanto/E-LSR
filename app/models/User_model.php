<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    public function getAllUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllUserByRole($roleQc)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE role=:roleQc');
        $this->db->bind('roleQc', $roleQc);
        return $this->db->single();
    }

    // Metode untuk memeriksa kredensial pengguna
    public function checkCredentials($username, $password)
    {
        // Konsultasikan database untuk memeriksa kecocokan kredensial
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        $result = $this->db->single();  // Ambil satu baris hasil

        // Periksa apakah ada baris yang ditemukan
        if ($this->db->rowCount() > 0) {
            // Bandingkan password yang diberikan dengan password di database
            $hashedPassword = $result['password'];
            if (password_verify($password, $hashedPassword)) {
                // Kredensial cocok, kembalikan data pengguna
                return $result;
            }
        }

        // Tidak ada baris atau password tidak cocok
        return false;
    }



    public function doUploadSign($file, $username)
    {
        $targetDir = realpath(__DIR__ . '/../../public/img/sign') . '/';
        $fileInfo = pathinfo($file["name"]);
        $fileExtension = strtolower($fileInfo['extension']);
        $fileName = $username . '.' . $fileExtension;
        $targetFile = $targetDir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Cek apakah file sudah ada
        // if (file_exists($targetFile)) {
        //     return "File sudah ada.";
        // }

        // Cek ukuran file
        if ($file["size"] > 500000) {
            return "File terlalu besar.";
        }

        // Perbolehkan hanya format file tertentu
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        }

        // Unggah file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return "File tanda tangan berhasil diunggah.";
        } else {
            return "Terjadi kesalahan saat mengunggah file.";
        }
    }





}

?>