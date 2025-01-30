<?php
class Report_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function generateUniqueID($categoryVal)
    {
        // Pemisahan kata kunci
        $keywords = $categoryVal;
        $first_keyword = substr($keywords, 0, 1); // Mengambil huruf pertama

        // Menentukan tabel berdasarkan kategori
        switch ($first_keyword) {
            case 'K':
                $table = 'report_k';
                break;
            case 'M':
                $table = 'report_m';
                break;
            case 'C':
                $table = 'report_c';
                break;
            default:
                $table = 'report_x';
        }
    
        // Menyusun query untuk mendapatkan no_lsr terbesar yang sudah ada
        $query = "SELECT MAX(no_lsr) AS max_id FROM $table WHERE no_lsr REGEXP '^(KM|KS|MA|MB|MR|MH|CD|CL|XY)[0-9]{8}$' AND no_lsr LIKE '$categoryVal%'";
        $this->db->query($query);
        $result = $this->db->single();
        $max_id = $result['max_id'];

        // Mendapatkan tahun sekarang
        $current_year = date('y');  // Tahun dua digit
        
        if ($max_id) {
            // Mengambil tahun dan nomor urut dari no_lsr yang terakhir
            $last_year = substr($max_id, 2, 2);
            $last_number = intval(substr($max_id, 4));
            
            if ($last_year == $current_year) {
                // Jika tahun sama, nomor urut ditambah 1
                $new_number = $last_number + 1;
            } else {
                // Jika tahun berbeda, mulai ulang nomor urut
                $new_number = 1;
            }
        } else {
            // Jika tidak ada no_lsr, mulai dari nomor urut pertama
            $new_number = 1;
        }
    
        // Membuat ID baru dengan format: K<tahun><nomor urut>
        $new_id = $categoryVal . $current_year . str_pad($new_number, 6, '0', STR_PAD_LEFT);
    
        return $new_id;
    }


    
    

    public function submitData($lineSub, $data)
    {
        $keywords = explode(",", $lineSub);
        $first_keyword = trim($keywords[0]);

        switch ($first_keyword) {
            case 'Main Line':
            case 'Sub Line':
                $table = 'report_k';
                break;
            case 'Crankshaft':
            case 'Cylinder Block':
            case 'Cylinder Head':
            case 'Camshaft':
                $table = 'report_m';
                break;
            case 'Die Casting':
                $table = 'report_c';
                break;
            default:
                $table = 'report_x';
        }

        $query = 'INSERT INTO ' . $table .
            ' VALUES (null, :no_lsr, :line, :pic, :tanggal, :waktu)';

        $this->db->query($query);
        $this->db->bind('no_lsr', $data['noLSRSub']);
        $this->db->bind('line', $data['lineSub']);
        $this->db->bind('pic', $data['userNameSub']);
        $this->db->bind('tanggal', $data['tanggalSub']);
        $this->db->bind('waktu', $data['waktuSub']);

        $this->db->execute();
        return $this->db->rowCount();
    }


}
?>