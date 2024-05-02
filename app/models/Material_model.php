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
        // Menambahkan kalkulasi total price
        $total_price = $data['qty'] * $data['price'];

        $query = 'INSERT INTO ' . $this->table .
            ' VALUES (null, :no_lsr, :part_number, :part_name, :uniqe_no, :qty, :reason, :condition, :repair, :source_type, :remarks, :material, :tanggal, :waktu, :line_lsr, :shift, :user_lsr, :line_code, :cost_center, :status_lsr, :price, :total_price)';

        $this->db->query($query);
        $this->db->bind('no_lsr', $data['no_lsr']);
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
        $this->db->bind('user_lsr', $data['userName']);
        $this->db->bind('line_code', $data['line_code']);
        $this->db->bind('cost_center', $data['cost_center']);
        $this->db->bind('status_lsr', 'pending');
        $this->db->bind('price', $data['price']);
        $this->db->bind('total_price', $total_price);

        $this->db->execute();
        $rowCount = $this->db->rowCount();

        // query 2 untuk table report
        $line = $data['line_lsr'];
        switch ($line) {
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

        // Query untuk memeriksa apakah no_lsr sudah ada dalam tabel
        $checkQuery = "SELECT COUNT(*) as count FROM $table WHERE no_lsr = :no_lsr";
        $this->db->query($checkQuery);
        $this->db->bind(':no_lsr', $data['no_lsr']);
        $this->db->execute();

        $count = $this->db->single()['count'];

        if ($count > 0) {
            return 0;
        }

        $query2 = 'INSERT INTO ' . $table .
            ' VALUES (null, :no_lsr, :line, :pic, :tanggal, :waktu)';

        $this->db->query($query2);
        $this->db->bind('no_lsr', $data['no_lsr']);
        $this->db->bind('line', $data['line_lsr']);
        $this->db->bind('pic', $data['userName']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('waktu', $data['waktu']);

        $this->db->execute();
        $rowCount += $this->db->rowCount();

        return $rowCount;
    }


    public function UbahDataMaterial($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET 
                    qty = :qty,
                    reason = :reason,
                    `condition` = :condition,
                    repair = :repair,
                    remarks = :remarks,
                    status_lsr = :status
                    WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('reason', $data['reason']);
        $this->db->bind('condition', $data['condition']);
        $this->db->bind('repair', $data['repair']);
        $this->db->bind('remarks', $data['remarks']);
        $this->db->bind('status', $data['status']);
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

    public function approveDataMaterial($selectedData)
    {
        try {
            // Mengubah nilai kolom 'status_lsr' menjadi 'approved' berdasarkan ID
            $placeholders = implode(',', array_fill(0, count($selectedData), '?'));

            $query = "UPDATE $this->table SET status_lsr = 'approved' WHERE id IN ($placeholders)";

            $this->db->query($query);

            // Bind parameter sesuai dengan jumlah placeholder
            foreach ($selectedData as $index => $itemId) {
                $this->db->bind($index + 1, $itemId);
            }

            // Eksekusi query sekali saja setelah semua parameter di-bind
            $this->db->execute();

            // Mengembalikan pesan atau nilai sesuai kebutuhan
            return "Items approved successfully.";
        } catch (Exception $e) {
            // Tangkap dan lemparkan kembali pesan kesalahan
            throw new Exception("Error in approveDataMaterial: " . $e->getMessage());
        }
    }




    public function getAllMaterialMaster()
    {
        $this->db->query('SELECT * FROM ' . $this->table2);
        return $this->db->resultSet();
    }


    public function getMasterByMaterial($material)
    {
        error_log("Material received: " . $material);
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE material=:material');
        $this->db->bind('material', $material);
        $results = $this->db->resultSet();


        if (empty($results)) {
            $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE material=:default_material');
            $this->db->bind('default_material', 'Assembly');
            $results = $this->db->resultSet();

            if (empty($results)) {
                return array();
            } else {
                return $results;
            }
        } else {
            return $results;
        }
    }





    // UNTUK HALAMAN DASHBOARD BAGIAN CARD //
    public function getMaterialByCriteria($machiningLineValues, $castingLineValues, $assemblyLineValues, $dateCondition = null)
    {
        $placeholdersMachining = implode(',', array_fill(0, count($machiningLineValues), '?'));
        $placeholdersCasting = implode(',', array_fill(0, count($castingLineValues), '?'));
        $placeholdersAssembly = implode(',', array_fill(0, count($assemblyLineValues), '?'));

        $queryMachining = 'SELECT COALESCE(SUM(qty), 0) as total_qty FROM ' . $this->table . ' WHERE material IN (' . $placeholdersMachining . ')';
        $queryCasting = 'SELECT COALESCE(SUM(qty), 0) as total_qty FROM data_lsr WHERE material = ? AND YEAR(tanggal) = YEAR(CURDATE())';
        $queryAssembly = 'SELECT COALESCE(SUM(qty), 0) as total_qty FROM data_lsr WHERE material = ? AND YEAR(tanggal) = YEAR(CURDATE())';

        if ($dateCondition !== null) {
            if ($dateCondition === 'today') {
                $queryMachining .= ' AND DATE(tanggal) = CURDATE()';
                $queryCasting .= ' AND DATE(tanggal) = CURDATE()';
                $queryAssembly .= ' AND DATE(tanggal) = CURDATE()';
            } else if ($dateCondition === 'thisMonth') {
                $queryMachining .= ' AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())';
                $queryCasting .= ' AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())';
                $queryAssembly .= ' AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())';
            } else if ($dateCondition === 'thisYear') {
                $queryMachining .= ' AND YEAR(tanggal) = YEAR(CURDATE())';
                $queryCasting .= ' AND YEAR(tanggal) = YEAR(CURDATE())';
                $queryAssembly .= ' AND YEAR(tanggal) = YEAR(CURDATE())';
            }
        }

        $this->db->query($queryMachining);
        $this->bindValues($this->db, $machiningLineValues);
        $this->bindCondition($this->db, $dateCondition);
        $resultMachining = $this->db->single();

        $this->db->query($queryCasting);
        $this->bindValues($this->db, $castingLineValues);
        $resultCasting = $this->db->single();

        $this->db->query($queryAssembly);
        $this->bindValues($this->db, $assemblyLineValues);
        $resultAssembly = $this->db->single();

        return [
            'total_qty_machining' => $resultMachining['total_qty'],
            'total_qty_casting' => $resultCasting['total_qty'],
            'total_qty_assembly' => $resultAssembly['total_qty'],
        ];
    }




    private function bindValues($db, $values)
    {
        $index = 1;

        foreach ($values as $value) {
            $db->bind($index++, $value);
        }
    }

    private function bindCondition($db, $condition, $paramType = PDO::PARAM_STR)
    {
        if ($condition !== null) {
            $db->bind($db->rowCount() + 1, $condition, $paramType);
        }
    }
    // END //


    public function getDataChartHome()
    {
        $this->db->query('SELECT DAY(tanggal) AS hari, MONTH(tanggal) AS bulan, YEAR(tanggal) AS tahun, material, SUM(qty) AS total_qty 
                          FROM ' . $this->table . ' 
                          GROUP BY hari, bulan, tahun, material 
                          ORDER BY tahun DESC, bulan DESC, hari DESC');
        return $this->db->resultSet();
    }


    public function getDataPie()
    {
        $this->db->query('SELECT material, SUM(qty) AS total_qty 
                          FROM ' . $this->table . ' 
                          GROUP BY material');
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

    public function deleteDataCreate($data)
    {
        $id = $data['id'];

        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return -1;
        }
    }
    public function getDataByCriteria($years, $months)
    {
        if ($years === null) {
            $years = [];
        }
        if ($months === null) {
            $months = [];
        }

        $yearsPlaceholder = implode(',', array_fill(0, count($years), '?'));
        $monthsPlaceholder = implode(',', array_fill(0, count($months), '?'));

        $query = 'SELECT * FROM ' . $this->table . ' WHERE YEAR(tanggal) IN (' . $yearsPlaceholder . ')';

        if (!empty($months)) {
            $query .= ' AND MONTH(tanggal) IN (' . $monthsPlaceholder . ')';
        }

        $this->db->query($query);

        foreach ($years as $index => $year) {
            $this->db->bind($index + 1, $year);
        }

        foreach ($months as $index => $month) {
            $this->db->bind($index + count($years) + 1, $month);
        }

        return $this->db->resultSet();
    }

    public function getDataTanggal()
    {
        $this->db->query('SELECT DISTINCT YEAR(tanggal) AS year FROM ' . $this->table);
        return $this->db->resultSet();
    }






}

?>