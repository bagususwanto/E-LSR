<?php
class Data extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);

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

                // Lakukan validasi atau pemrosesan tambahan
                // ...

                // Panggil model untuk menghapus data
                $result = $this->model('Material_model')->deleteData($selectedData);

                // Atur header untuk memberi tahu bahwa respons adalah JSON
                header('Content-Type: application/json');

                // Keluarkan respons dalam format JSON
                echo json_encode(['success' => $result]);
                exit(); // Pastikan keluar dari skrip setelah mengirim respons JSON
            } else {
                // Data 'selectedData' tidak ditemukan dalam request JSON
                http_response_code(400); // Bad Request
                echo json_encode(['error' => 'Invalid request. Missing selectedData.']);
                exit(); // Pastikan keluar dari skrip setelah mengirim respons JSON
            }
        } else {
            // Metode HTTP tidak diizinkan
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Method Not Allowed']);
            exit(); // Pastikan keluar dari skrip setelah mengirim respons JSON
        }
    }

}
?>