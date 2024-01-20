<?php
class Material_model
{
    private $db;
    private $table = 'data_lsr';

    private $table2 = 'master_material';

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

    public function getMaterialBySelected($selectedData)
    {
        // Ubah array ID menjadi string dengan tanda koma sebagai pemisah
        $idString = implode(',', $selectedData);

        // Gunakan prepared statement untuk menghindari SQL injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id IN (' . $idString . ')');

        // Tidak perlu bind parameter karena ID sudah di-handle dalam query

        return $this->db->single();
    }


    public function getAllMaterialCrieteria($material, $tanggal, $shiftUser, $lineUser)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE material=:material AND tanggal=:tanggal AND shift=:shift AND line_lsr=:line_lsr');
        $this->db->bind('material', $material);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('shift', $shiftUser);
        $this->db->bind('line_lsr', $lineUser);
        return $this->db->resultSet();
    }

    public function getAllMaterialCrieteriaChange($material, $tanggal, $shiftUser, $lineUser, $lineCode, $costCenter)
    {
        $this->db->query('SELECT * FROM ' . $this->table .
            ' WHERE material=:material AND tanggal=:tanggal AND shift=:shift AND line_lsr=:line_lsr AND line_code=:line_code AND cost_center=:cost_center');
        $this->db->bind('material', $material);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('shift', $shiftUser);
        $this->db->bind('line_lsr', $lineUser);
        $this->db->bind('line_code', $lineCode);
        $this->db->bind('cost_center', $costCenter);
        return $this->db->resultSet();
    }

    public function getAllMaterialCrieteria2($tanggal)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tanggal=:tanggal');
        $this->db->bind('tanggal', $tanggal);
        return $this->db->resultSet();
    }

    public function AddDataMaterial($data)
    {
        $query = "INSERT INTO data_lsr
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
        $this->db->bind('user_lsr', $data['lineUser']);
        $this->db->bind('line_code', $data['line_code']);
        $this->db->bind('cost_center', $data['cost_center']);
        $this->db->bind('status_lsr', 'pending');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function UbahDataMaterial($data)
    {
        $query = "UPDATE data_lsr SET 
                    qty = :qty,
                    reason = :reason,
                    `condition` = :condition,
                    repair = :repair,
                    remarks = :remarks
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('reason', $data['reason']); 
        $this->db->bind('condition', $data['condition']);
        $this->db->bind('repair', $data['repair']);
        $this->db->bind('remarks', $data['remarks']);
        $this->db->bind('id', $data['id']);

        // Eksekusi query dan tangani kesalahan jika ada
        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            // Tampilkan pesan kesalahan atau log untuk debugging
            echo "Error: " . $e->getMessage();
            return -1; // Atau nilai lain yang menunjukkan kesalahan
        }
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


    public function getFilteredData($tanggalFrom, $tanggalTo, $line, $shift, $material)
    {
        // Jika tanggalTo kosong, atur nilai tanggalTo ke tanggalFrom
        if (empty($tanggalTo)) {
            $tanggalTo = $tanggalFrom;
        }

        $query = 'SELECT * FROM ' . $this->table;

        $params = [];

        // Tambahkan kondisi jika nilai bukan "All"
        if ($line !== 'All') {
            $query .= ' WHERE line_lsr = :line_lsr';
            $params[':line_lsr'] = $line;
        }

        if ($shift !== 'All') {
            $query .= (empty($params) ? ' WHERE' : ' AND') . ' shift = :shift';
            $params[':shift'] = $shift;
        }

        if ($material !== 'All') {
            $query .= (empty($params) ? ' WHERE' : ' AND') . ' material = :material';
            $params[':material'] = $material;
        }

        // Tambahkan kondisi tanggal
        $query .= (empty($params) ? ' WHERE' : ' AND') . ' tanggal BETWEEN :tanggalFrom AND :tanggalTo';
        $params[':tanggalFrom'] = $tanggalFrom;
        $params[':tanggalTo'] = $tanggalTo;

        $this->db->query($query);
        foreach ($params as $paramName => $paramValue) {
            $this->db->bind($paramName, $paramValue);
        }

        $result = $this->db->resultSet();

        return $result;
    }

    public function deleteData($selectedData)
    {
        $placeholders = implode(',', array_fill(0, count($selectedData), '?'));

        $query = 'DELETE FROM ' . $this->table . ' WHERE id IN (' . $placeholders . ')';
        $this->db->query($query);

        foreach ($selectedData as $index => $value) {
            $this->db->bind($index + 1, $value);
        }

        return $this->db->execute();
    }




}

?>