<?php
class Data extends Controller
{
    public function traceability()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('data/traceability/index', $data);
        $this->view('templates/footer');

        // Pindahkan pemanggilan JavaScript ke bagian bawah halaman atau setelah semua elemen HTML
        echo "<script>document.getElementById('traceability').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('trace').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav-data').classList.add('show');</script>";
    }

    public function report()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('data/report/index', $data);
        $this->view('templates/footer');

        // Pindahkan pemanggilan JavaScript ke bagian bawah halaman atau setelah semua elemen HTML
        echo "<script>document.getElementById('report').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('trace').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav-data').classList.add('show');</script>";
    }

    public function getDataTable()
    {
        // Mendapatkan parameter dari request POST
        $tanggalFrom = $_POST['tanggalFrom'];
        $tanggalTo = $_POST['tanggalTo'];
        $line = $_POST['line'];
        $shift = $_POST['shift'];
        $material = $_POST['material'];
        $status = $_POST['status'];

        // Mendapatkan data dari model
        $data = $this->model('Material_model')->getFilteredData($tanggalFrom, $tanggalTo, $line, $shift, $material, $status);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }

    public function getTableReport()
    {
        // Mendapatkan parameter dari request POST
        $tanggalFrom = $_POST['tanggalFrom'];
        $tanggalTo = $_POST['tanggalTo'];
        $department = $_POST['department'];
        $line = $_POST['line'];
        $shift = $_POST['shift'];
        $lsrCode = $_POST['lsrCode'];
        $status = $_POST['status'];

        // Mendapatkan data dari model
        $data = $this->model('Material_model')->FilteredReport($tanggalFrom, $tanggalTo, $department, $line, $shift, $lsrCode, $status);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }

    public function getDataDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestData = json_decode(file_get_contents("php://input"), true);

            if (isset($requestData['selectedData'])) {
                $selectedData = $requestData['selectedData'];

                $result = $this->model('Material_model')->deleteData($selectedData);
                if ($result > 0) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Berhasil menghapus data.'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Gagal menghapus data.'
                    ]);
                }

                header('Content-Type: application/json');
                exit();
            } else {
                // Data 'selectedData' tidak ditemukan dalam request JSON
                http_response_code(400); // Bad Request
                echo json_encode(['error' => 'Invalid request. Missing selectedData.']);
                exit();
            }
        } else {
            // Metode HTTP tidak diizinkan
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Method Not Allowed']);
            exit();
        }
    }

    public function getDataEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestData = json_decode(file_get_contents("php://input"), true);

            if (isset($requestData['selectedData'])) {
                $selectedData = $requestData['selectedData'];

                // Validasi atau pemrosesan tambahan
                // ...

                // Panggil model 
                $result = $this->model('Material_model')->getMaterialBySelected($selectedData);

                if ($result) {
                    // Atur header untuk memberi tahu bahwa respons adalah JSON
                    header('Content-Type: application/json');

                    // Keluarkan respons dalam format JSON
                    echo json_encode(['success' => $result]);
                    exit();
                } else {
                    // Data tidak ditemukan atau kesalahan lain dalam pemanggilan model
                    http_response_code(404); // Not Found
                    echo json_encode(['error' => 'Data not found or error in model']);
                    exit();
                }
            } else {
                // Data 'selectedData' tidak ditemukan dalam request JSON
                http_response_code(400); // Bad Request
                echo json_encode(['error' => 'Invalid request. Missing selectedData.']);
                exit();
            }
        } else {
            // Metode HTTP tidak diizinkan
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Method Not Allowed']);
            exit();
        }
    }

    public function ubah()
    {
        header('Content-Type: application/json');
        $result = $this->model('Material_model')->UbahDataMaterial($_POST);

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil mengubah data.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal mengubah data.'
            ]);
        }
    }

    public function getDataApprove()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selectedData = json_decode(file_get_contents("php://input"), true);

            if (!isset($selectedData['selectedData']) || !is_array($selectedData['selectedData'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Data yang dikirim tidak valid.'
                ]);
                return;
            }

            $materialModel = $this->model('Material_model');

            // Memanggil metode approveDataMaterial dari model
            $result = $materialModel->approveDataMaterial($selectedData['selectedData']);
            if ($result > 0) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Berhasil accept data.'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal accept data.'
                ]);
            }
        }
    }


    public function approveReport()
    {
        header('Content-Type: application/json');

        // Pastikan untuk mengambil data dengan metode POST
        $selectedData = json_decode(file_get_contents("php://input"), true);

        // Lakukan validasi data yang diterima sesuai kebutuhan aplikasi
        if (!isset($selectedData['selectedData']) || !is_array($selectedData['selectedData'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data yang dikirim tidak valid.'
            ]);
            return;
        }

        $result = $this->model('Material_model')->updateStatus($selectedData['selectedData']);

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil approve data dengan No LSR: ' . implode(', ', array_column($selectedData['selectedData'], 'noLsr'))
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal approve data, terjadi kesalahan.'
            ]);
        }
    }

    public function rejectReport()
    {
        header('Content-Type: application/json');

        // Pastikan untuk mengambil data dengan metode POST
        $selectedData = json_decode(file_get_contents("php://input"), true);

        // Lakukan validasi data yang diterima sesuai kebutuhan aplikasi
        if (!isset($selectedData['selectedData']) || !is_array($selectedData['selectedData'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data yang dikirim tidak valid.'
            ]);
            return;
        }

        $result = $this->model('Material_model')->updateStatus($selectedData['selectedData']);

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil reject data dengan No LSR: ' . implode(', ', array_column($selectedData['selectedData'], 'noLsr'))
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal reject data, terjadi kesalahan.'
            ]);
        }
    }

    public function getDataReport()
    {
        // Mendapatkan parameter dari request POST
        $shift = $_POST['shift'];
        $lsrCode = $_POST['lsrCode'];
        $status = $_POST['status'];
        $line = $_POST['line'];
        $department = $_POST['department'];

        // Mendapatkan data dari model
        $data = $this->model('Material_model')->FilteredDataReport($shift, $lsrCode, $status, $line, $department);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }




}
?>