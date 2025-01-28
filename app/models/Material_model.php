<?php
class Material_model
{
    private $db;
    private $table = 'data_lsr';

    private $table2 = 'master_material';

    private $table3 = 'master_line';

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


    public function getAllMaterialCrieteria($tanggal, $shiftUser, $lineUser)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tanggal=:tanggal AND shift=:shift AND line_lsr=:line_lsr');
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('shift', $shiftUser);
        $this->db->bind('line_lsr', $lineUser);
        return $this->db->resultSet();
    }

    public function getAllMaterialCrieteriaChange($tanggal, $shiftUser, $lineUser, $lineCode, $costCenter)
    {
        $this->db->query('SELECT * FROM ' . $this->table .
            ' WHERE tanggal=:tanggal AND shift=:shift AND line_lsr=:line_lsr AND line_code=:line_code AND cost_center=:cost_center');
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
            ' VALUES (null, :no_lsr, :part_number, :part_name, :uniqe_no, :qty, 
            :reason, :condition, :repair, :source_type, :remarks, :material, :tanggal, 
            :waktu, :department, :line_lsr, :shift, :user_lsr, :line_code, :cost_center, :status_lsr,
            "", "", 
            :price, :total_price, CURRENT_TIMESTAMP, :user_lsr)';

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
        $this->db->bind('department', $data['department']);
        $this->db->bind('line_lsr', $data['line_lsr']);
        $this->db->bind('shift', $data['shift']);
        $this->db->bind('user_lsr', $data['userName']);
        $this->db->bind('line_code', $data['line_code']);
        $this->db->bind('cost_center', $data['cost_center']);
        $this->db->bind('status_lsr', 'Waiting Approved');
        $this->db->bind('price', $data['price']);
        $this->db->bind('total_price', $total_price);

        $this->db->execute();
        $rowCount = $this->db->rowCount();

        return $rowCount;
    }

    public function addReport($data)
    {
        // query 2 untuk table report
        $category = $data['category'];
        switch ($category) {
            case 'K':
                $tableValid = 'report_k';
                break;
            case 'M':
                $tableValid = 'report_m';
                break;
            case 'C':
                $tableValid = 'report_c';
                break;
            default:
                $tableValid = 'report_x';
        }

        // Query untuk memeriksa apakah no_lsr sudah ada dalam tabel
        $checkQuery = "SELECT COUNT(*) as count FROM $tableValid WHERE no_lsr = :no_lsr";
        $this->db->query($checkQuery);
        $this->db->bind(':no_lsr', $data['no_lsr']);
        $this->db->execute();

        $count = $this->db->single()['count'];

        if ($count > 0) {
            return 0;
        }

        $query2 = 'INSERT INTO ' . $tableValid .
            ' VALUES (null, :no_lsr, :line, :pic, :tanggal, :waktu)';

        $this->db->query($query2);
        $this->db->bind('no_lsr', $data['no_lsr']);
        $this->db->bind('line', $data['line_lsr']);
        $this->db->bind('pic', $data['userName']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('waktu', $data['waktu']);

        $this->db->execute();
        $rowCount = $this->db->rowCount();
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
                    status_lsr = :status,
                    change_by = :change
                    WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('reason', $data['reason']);
        $this->db->bind('condition', $data['condition']);
        $this->db->bind('repair', $data['repair']);
        $this->db->bind('remarks', $data['remarks']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('change', $data['userEdit']);
        $this->db->bind('id', $data['id']);

        // Eksekusi query dan tangani kesalahan jika ada
        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return -1;
        }
    }

    public function approveDataMaterial($selectedData)
    {
        try {
            $query = "UPDATE $this->table SET status_lsr = 'Uploaded To Ifast', received_by = :user WHERE id = :id";
            $this->db->query($query);

            foreach ($selectedData as $index) {
                $this->db->bind(':id', $index['id']);
                $this->db->bind(':user', $index['user']);
                $this->db->execute(); // Eksekusi query untuk setiap data yang dipilih
            }
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Tangkap dan lemparkan kembali pesan kesalahan
            throw new Exception("Error in approveDataMaterial: " . $e->getMessage());
        }
    }

    public function updateStatus($selectedData)
    {
        $query = "UPDATE $this->table SET status_lsr = :statusVal, approved_by = :user WHERE no_lsr = :noLsr";
        $this->db->query($query);

        try {
            foreach ($selectedData as $index) {
                $this->db->bind(':noLsr', $index['noLsr']);
                $this->db->bind(':statusVal', $index['statusVal']);
                $this->db->bind(':user', $index['user']);
                $this->db->execute(); // Eksekusi query untuk setiap data yang dipilih
            }

            return $this->db->rowCount();
        } catch (Exception $e) {
            // Handle and log error
            error_log($e->getMessage());
            return 0;
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



    public function getFilteredData($tanggalFrom, $tanggalTo, $line, $shift, $material, $status)
    {
        $query = 'SELECT * FROM ' . $this->table;

        $params = [];
        $conditions = [];

        // Tambahkan kondisi jika nilai bukan "All"
        if ($line !== 'All') {
            $conditions[] = 'line_lsr = :line_lsr';
            $params[':line_lsr'] = $line;
        }

        if ($shift !== 'All') {
            $conditions[] = 'shift = :shift';
            $params[':shift'] = $shift;
        }

        if ($material !== 'All') {
            $conditions[] = 'material = :material';
            $params[':material'] = $material;
        }

        if ($status !== 'All') {
            $conditions[] = 'status_lsr = :status';
            $params[':status'] = $status;
        }

        // Tambahkan kondisi tanggal jika salah satu atau keduanya tidak kosong
        if (!empty($tanggalFrom) || !empty($tanggalTo)) {
            // Jika tanggalTo kosong, atur nilai tanggalTo ke tanggalFrom
            if (empty($tanggalTo)) {
                $tanggalTo = $tanggalFrom;
            }

            if (!empty($tanggalFrom)) {
                $conditions[] = 'tanggal BETWEEN :tanggalFrom AND :tanggalTo';
                $params[':tanggalFrom'] = $tanggalFrom;
                $params[':tanggalTo'] = $tanggalTo;
            }
        }

        // Gabungkan kondisi ke dalam query
        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

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

        $this->db->execute();
        return $this->db->rowCount();
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


    public function getMatData($noLsr)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE no_lsr=:noLsr');
        $this->db->bind('noLsr', $noLsr);
        return $this->db->single();
    }

    public function getLineDataByLine($lineName)
    {
        $this->db->query('SELECT * FROM ' . $this->table3 . ' WHERE nama_line=:lineName');
        $this->db->bind('lineName', $lineName);
        return $this->db->single();
    }

    public function getMatDataResult($noLsr)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE no_lsr=:noLsr');
        $this->db->bind('noLsr', $noLsr);
        return $this->db->resultSet();
    }

    public function FilteredReport($tanggalFrom, $tanggalTo, $department, $line, $shift, $lsrCode, $status)
    {
        // Tentukan kolom yang ingin ditampilkan
        $query = 'SELECT no_lsr, MAX(tanggal) as tanggal, MAX(department) as department, MAX(line_lsr) as line_lsr, MAX(cost_center) as cost_center, 
                  MAX(shift) as shift, MAX(user_lsr) as user_lsr, MAX(waktu) as waktu, MAX(approved_by) as approved_by,
                  MAX(received_by) as received_by, MAX(status_lsr) as status_lsr 
                  FROM ' . $this->table;

        $params = [];
        $conditions = [];

        // Tambahkan kondisi jika nilai bukan "All"
        if ($department !== 'All') {
            $conditions[] = 'department = :department';
            $params[':department'] = $department;
        }

        if ($line !== 'All') {
            $conditions[] = 'line_lsr = :line_lsr';
            $params[':line_lsr'] = $line;
        }

        if ($shift !== 'All') {
            $conditions[] = 'shift = :shift';
            $params[':shift'] = $shift;
        }

        if ($lsrCode !== 'All') {
            $conditions[] = 'no_lsr LIKE :lsrCode';
            $params[':lsrCode'] = $lsrCode . '%';
        }

        if ($status !== 'All') {
            $conditions[] = 'status_lsr = :status';
            $params[':status'] = $status;
        }

        // Tambahkan kondisi tanggal jika salah satu atau keduanya tidak kosong
        if (!empty($tanggalFrom) || !empty($tanggalTo)) {
            // Jika tanggalTo kosong, atur nilai tanggalTo ke tanggalFrom
            if (empty($tanggalTo)) {
                $tanggalTo = $tanggalFrom;
            }

            if (!empty($tanggalFrom)) {
                $conditions[] = 'tanggal BETWEEN :tanggalFrom AND :tanggalTo';
                $params[':tanggalFrom'] = $tanggalFrom;
                $params[':tanggalTo'] = $tanggalTo;
            }
        }

        // Gabungkan kondisi ke dalam query
        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

        // Tambahkan GROUP BY untuk no_lsr
        $query .= ' GROUP BY no_lsr';

        $this->db->query($query);
        foreach ($params as $paramName => $paramValue) {
            $this->db->bind($paramName, $paramValue);
        }

        $result = $this->db->resultSet();

        return $result;
    }

    public function FilteredDataReport($shift, $lsrCode, $status, $line, $department)
    {
        // cek apakah ada data dengan variabel $line di kolom line_lsr
        $lineExistsQuery = 'SELECT COUNT(*) as count FROM ' . $this->table3 . ' WHERE nama_line = :line';
        $this->db->query($lineExistsQuery);
        $this->db->bind(':line', $line);
        $lineCountResult = $this->db->single();

        // Tentukan kolom yang ingin ditampilkan
        $query = 'SELECT no_lsr, MAX(tanggal) as tanggal, MAX(department) as department, MAX(line_lsr) as line_lsr, MAX(cost_center) as cost_center, 
                  MAX(shift) as shift, MAX(user_lsr) as user_lsr, MAX(waktu) as waktu, MAX(approved_by) as approved_by,
                  MAX(received_by) as received_by, MAX(status_lsr) as status_lsr 
                  FROM ' . $this->table . ' WHERE 1=1 ';

        // Tambahkan kondisi berdasarkan parameter
        $bindParams = [];

        if (!empty($department) && $department !== "All") {
            $query .= ' AND department = :department';
            $bindParams[':department'] = $department;
        }
        if (!empty($shift) && $shift !== "All") {
            $query .= ' AND shift = :shift';
            $bindParams[':shift'] = $shift;
        }
        if (!empty($lsrCode)) {
            $query .= ' AND no_lsr LIKE :lsrCode';
            $bindParams[':lsrCode'] = $lsrCode . '%';
        }
        if (!empty($status)) {
            $query .= ' AND status_lsr = :status';
            $bindParams[':status'] = $status;
        }
        // Tambahkan kondisi line jika data dengan variabel $line ada di kolom line_lsr
        if ($lineCountResult['count'] > 0 && !empty($line)) {
            $query .= ' AND line_lsr = :line';
            $bindParams[':line'] = $line;
        }

        // Kelompokkan hasil berdasarkan kolom no_lsr
        $query .= ' GROUP BY no_lsr';

        $this->db->query($query);

        // Bind parameter jika tidak kosong
        foreach ($bindParams as $param => $value) {
            $this->db->bind($param, $value);
        }

        // Eksekusi query dan ambil hasil
        $result = $this->db->resultSet();

        return $result;
    }






}

?>