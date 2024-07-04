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
        $keywords = explode(",", $categoryVal);
        $first_keyword = trim($keywords[0]);

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

        $query = "SELECT MAX(no_lsr) AS max_id FROM $table";

        $this->db->query($query);
        $result = $this->db->single();
        $max_id = $result['max_id'];

        $new_id = $categoryVal . str_pad((intval(substr($max_id, 1)) + 1), 6, '0', STR_PAD_LEFT);

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