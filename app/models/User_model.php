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



    public function doUploadSign($file, $username) {
        $targetDir = "../uploads/";
        $fileName = $username . '_' . basename($file["name"]);
        $targetFile = $targetDir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($targetFile)) {
            return "File sudah ada.";
        }

        // Check file size
        if ($file["size"] > 500000) {
            return "File terlalu besar.";
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            return "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        }

        // Upload file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return "File ". htmlspecialchars($fileName). " berhasil diunggah.";
        } else {
            return "Terjadi kesalahan saat mengunggah file.";
        }
    }





}

?>