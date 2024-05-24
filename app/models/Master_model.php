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
        $this->db->bind('partNumber', $data['partNumber']);
        $this->db->bind('partName', $data['partName']);
        $this->db->bind('uniqueNo', $data['uniqueNo']);
        $this->db->bind('unitUsage', $data['unitUsage']);
        $this->db->bind('sourceType', $data['sourceType']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('user', $data['user']);
        $this->db->bind('id', $data['id']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            // Tampilkan pesan kesalahan atau log untuk debugging
            echo "Error: " . $e->getMessage();
            return -1;
        }
    }


    public function getAllUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


}

?>