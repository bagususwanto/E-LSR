<?php
class Material_model
{
    private $db;
    private $table = 'data_dc';



    private $table2 = 'master_mat_dc';


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllMaterial()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    public function getAllMaterialById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function tambahDataMaterial($data)
    {
        $query = "INSERT INTO data_dc
        VALUES (null, :part_number, :part_name, :uniqe_no, :qty, :reason, :condition, :repair, :source_type, :remarks, :material, :tanggal, :waktu, :line_lsr, :shift, :user_lsr, :line_code, :cost_center, :status_lsr)";

        $this->db->query($query);
        $this->db->bind('part_number', $data['part_number']);
        $this->db->bind('part_name', $data['part_name']);
        $this->db->bind('uniqe_no', $data['uniqe_no']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('reason', $data['reason']);
        $this->db->bind('condition', $data['condition']);
        $this->db->bind('repair', $data['repair']);
        $this->db->bind('source_type', $data['source_type']);
        $this->db->bind('remarks', $data['remarks']);
        $this->db->bind('material', $data['material']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('waktu', $data['waktu']);
        $this->db->bind('line_lsr', $data['line_lsr']);
        $this->db->bind('shift', $data['shift']);
        $this->db->bind('user_lsr', 'bagus');
        $this->db->bind('line_code', $data['line_code']);
        $this->db->bind('cost_center', $data['cost_center']);
        $this->db->bind('status_lsr', '1');

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function getAllMaterialMaster()
    {
        $this->db->query('SELECT * FROM ' . $this->table2);
        return $this->db->resultSet();
    }


    public function getMasterByMaterial($material)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE material=:material');
        $this->db->bind('material', $material);
        return $this->db->resultSet();
    }

}

?>