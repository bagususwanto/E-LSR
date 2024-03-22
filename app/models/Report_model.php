<?php
class Report_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function generateUniqueID($validLineValue)
    {
        // Pemisahan kata kunci
        $keywords = explode(",", $validLineValue);
        $first_keyword = trim($keywords[0]);

        switch ($first_keyword) {
            case 'Main Line':
            case 'Sub Line':
                $prefix = 'K';
                $table = 'report_k';
                break;
            case 'Crankshaft':
            case 'Cylinder Block':
            case 'Cylinder Head':
            case 'Camshaft':
                $prefix = 'M';
                $table = 'report_m';
                break;
            case 'Die Casting':
                $prefix = 'C';
                $table = 'report_c';
                break;

            default:
                $prefix = 'X';
                $table = 'report_x';
        }

        $query = "SELECT MAX(no_lsr) AS max_id FROM $table";

        $this->db->query($query);
        $result = $this->db->single();
        $max_id = $result['max_id'];

        $new_id = $prefix . str_pad((intval(substr($max_id, 1)) + 1), 6, '0', STR_PAD_LEFT);

        return $new_id;
    }


}
?>