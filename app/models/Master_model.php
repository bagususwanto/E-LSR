<?php
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


    public function getMaterialById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


}

?>