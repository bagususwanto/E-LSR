<?php
class Data extends Controller
{
    public function index()
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
        $this->view('data/index', $data);
        $this->view('templates/footer');

        // Pindahkan pemanggilan JavaScript ke bagian bawah halaman atau setelah semua elemen HTML
        echo "<script>document.getElementById('data').classList.remove('collapsed');</script>";

    }

    public function getDataTable()
    {
        // Mendapatkan parameter dari request POST
        $tanggalFrom = $_POST['tanggalFrom'];
        $tanggalTo = $_POST['tanggalTo'];
        $line = $_POST['line'];
        $shift = $_POST['shift'];
        $material = $_POST['material'];

        // Mendapatkan data dari model
        $data = $this->model('Material_model')->getFilteredData($tanggalFrom, $tanggalTo, $line, $shift, $material);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }

    public function getDataDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestData = json_decode(file_get_contents("php://input"), true);

            if (isset($requestData['selectedData'])) {
                $selectedData = $requestData['selectedData'];

                // validasi atau pemrosesan tambahan
                // ...

                // Panggil model untuk menghapus data
                $result = $this->model('Material_model')->deleteData($selectedData);

                // Atur header untuk memberi tahu bahwa respons adalah JSON
                header('Content-Type: application/json');

                // Keluarkan respons dalam format JSON
                echo json_encode(['success' => $result]);
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
        $result = $this->model('Material_model')->UbahDataMaterial($_POST);

        if ($result > 0) {
            // header('location:' . BASEURL . '/data');
            exit;
        } else {
            // header('location:' . BASEURL . '/data');
            exit;
        }
    }

    public function getDataApprove()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestData = json_decode(file_get_contents("php://input"), true);

            if (isset($requestData['selectedData'])) {
                $selectedData = $requestData['selectedData'];

                // Validasi atau pemrosesan tambahan
                // ...

                try {
                    // Membuat instance dari Material_model (sebelumnya sudah ada di konstruktor)
                    $materialModel = $this->model('Material_model');

                    // Memanggil metode approveDataMaterial dari model
                    $result = $materialModel->approveDataMaterial($selectedData);

                    // Atur header untuk memberi tahu bahwa respons adalah JSON
                    header('Content-Type: application/json');

                    // Keluarkan respons dalam format JSON
                    echo json_encode(['success' => $result]);
                    exit();
                } catch (Exception $e) {
                    // Tangkap dan keluarkan pesan kesalahan sebagai respons JSON
                    http_response_code(500); // Internal Server Error
                    echo json_encode(['error' => $e->getMessage()]);
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







}
?>