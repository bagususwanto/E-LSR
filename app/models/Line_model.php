<?php
class Line_model
{
    private $table = 'master_line';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllLine()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMatByLine($namaLine)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_line=:namaLine');
        $this->db->bind('namaLine', $namaLine);
        return $this->db->single();
    }


    public function getAllLineById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getLineByNamaLine($namaLine)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_line=:nama_line');
        $this->db->bind('nama_line', $namaLine);
        return $this->db->single();
    }


}

?>