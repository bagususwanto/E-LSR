<?php
class Material_model
{
    private $db;
    private $table = 'data_lsr';

    private $table2 = 'master_material';
    private $table3 = 'data_temp';


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

    public function getAllMaterialCrieteria($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table3 . ' WHERE user_lsr=:user_lsr');
        $this->db->bind('user_lsr', $username);
        return $this->db->resultSet();
    }

    public function AddDataMaterial($data)
    {
        $query = "INSERT INTO data_temp 
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
        $this->db->bind('user_lsr', $data['hiddenUser']);
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

    public function getDataFromTable3ByUsername($username)
    {
        $sql = "SELECT * FROM $this->table3 WHERE user_lsr = :user_lsr";
        $this->db->query($sql);
        $this->db->bind(':user_lsr', $username);

        return $this->db->resultSet();
    }


    public function insertMaterial($data)
    {
        // Memeriksa keberadaan kunci-kunci yang diharapkan dalam array
        $expectedKeys = [
            'part_number',
            'part_name',
            'uniqe_no',
            'qty',
            'reason',
            'condition',
            'repair',
            'source_type',
            'remarks',
            'material',
            'tanggal',
            'waktu',
            'line_lsr',
            'shift',
            'user_lsr',
            'line_code',
            'cost_center',
            'status_lsr'
        ];

        foreach ($expectedKeys as $key) {
            if (!isset($data[$key])) {
                // Jika kunci tidak ditemukan, berikan nilai default atau tangani sesuai kebutuhan
                $data[$key] = null;  // Nilai default bisa diubah sesuai kebutuhan
            }
        }

        $sql = "INSERT INTO $this->table (
            part_number, part_name, uniqe_no, qty, reason, `condition`, repair,
            source_type, remarks, material, tanggal, waktu, line_lsr, shift,
            user_lsr, line_code, cost_center, status_lsr
        )
        VALUES (
            :part_number, :part_name, :uniqe_no, :qty, :reason, :condition, :repair,
            :source_type, :remarks, :material, :tanggal, :waktu, :line_lsr, :shift,
            :user_lsr, :line_code, :cost_center, :status_lsr
        )";



        $this->db->query($sql);

        // Bind parameters with their values
        $this->db->bind(':part_number', $data['part_number']);
        $this->db->bind(':part_name', $data['part_name']);
        $this->db->bind(':uniqe_no', $data['uniqe_no']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':reason', $data['reason']);
        $this->db->bind(':condition', $data['condition']);
        $this->db->bind(':repair', $data['repair']);
        $this->db->bind(':source_type', $data['source_type']);
        $this->db->bind(':remarks', $data['remarks']);
        $this->db->bind(':material', $data['material']);
        $this->db->bind(':tanggal', $data['tanggal']);
        $this->db->bind(':waktu', $data['waktu']);
        $this->db->bind(':line_lsr', $data['line_lsr']);
        $this->db->bind(':shift', $data['shift']);
        $this->db->bind(':user_lsr', $data['user_lsr']);
        $this->db->bind(':line_code', $data['line_code']);
        $this->db->bind(':cost_center', $data['cost_center']);
        $this->db->bind(':status_lsr', $data['status_lsr']);

        // Execute the query
        $this->db->execute();

        // Return the number of affected rows
        return $this->db->rowCount();
    }




    public function deleteDataFromTable3ByUsername($username)
    {
        $sql = "DELETE FROM $this->table3 WHERE user_lsr = :user_lsr";
        $this->db->query($sql);
        $this->db->bind(':user_lsr', $username);
        $this->db->execute();

        // Return the number of affected rows
        return $this->db->rowCount();
    }


}

?>