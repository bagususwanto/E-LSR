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
     public function checkCredentials($username, $password) {
        // Konsultasikan database untuk memeriksa kecocokan kredensial
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        $result = $this->db->single();  // Ambil satu baris hasil
    
        // Periksa apakah ada baris yang ditemukan
        if ($this->db->rowCount() > 0) {
            // Bandingkan password yang diberikan dengan password di database
            $hashedPassword = $result['password'];
            if (password_verify($password, $hashedPassword)) {
                return true;  // Kredensial cocok
            }
        }
    
        return false;  // Tidak ada baris atau password tidak cocok
    }
    
    






}

?>