<?php
class Home extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('home/index');
        $this->view('templates/footer');

        echo "<script>document.getElementById('dashboard').classList.remove('collapsed');</script>";
        echo '<script src="' . BASEURL . '/js/home.js"></script>';
        echo '<script src="' . BASEURL . '/vendor/chart.js/chart.umd.js"></script>';
        echo '<script src="' . BASEURL . '/vendor/echarts/echarts.min.js"></script>';
        echo '<script src="' . BASEURL . '/vendor/apexcharts/apexcharts.min.js"></script>';
    }

    public function getDataTableHome()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        // Panggil fungsi dari model dengan parameter yang sesuai
        $materialModel = $this->model('Material_model');
        $materialData = $materialModel->getAllMaterial();

        if ($materialData !== false) {
            // Jika pengambilan data berhasil, encode dan echo respons JSON
            echo json_encode($materialData);
        } else {
            // Handle the case where there is an error in getting the data
            echo json_encode(['error' => 'Error getting data']);
        }
    }
    public function getDataCardHome()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            try {
                $machiningLineValues = isset($_POST['machiningLineValues']) ? explode(',', $_POST['machiningLineValues']) : [];
                $castingLineValues = isset($_POST['castingLineValues']) ? explode(',', $_POST['castingLineValues']) : [];
                $assemblyLineValues = isset($_POST['assemblyLineValues']) ? explode(',', $_POST['assemblyLineValues']) : [];
                $filter = isset($_POST['filter']) ? $_POST['filter'] : '';

                $materialModel = $this->model('Material_model');

                // Mendapatkan data dari model
                $materialData = $materialModel->getMaterialByCriteria($machiningLineValues, $castingLineValues, $assemblyLineValues, $filter);

                // Mengubah nilai null menjadi 0
                $totalQtyMachining = $materialData['total_qty_machining'] ?? 0;
                $totalQtyCasting = $materialData['total_qty_casting'] ?? 0;
                $totalQtyAssembly = $materialData['total_qty_assembly'] ?? 0;

                echo json_encode([
                    'qtyM' => $totalQtyMachining,
                    'qtyC' => $totalQtyCasting,
                    'qtyK' => $totalQtyAssembly,
                ]);
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['error' => 'Invalid request method']);
        }
    }

    public function getMachiningChartData()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            try {
                // Mendapatkan nilai dari elemen input tersembunyi machiningLine
                $machiningLineValues = isset($_POST['machiningLineValues']) ? explode(',', $_POST['machiningLineValues']) : [];

                // Dapatkan data machining dan kategori sesuai dengan nilai dari input
                $machiningModel = $this->model('Material_model');
                $machiningData = $machiningModel->getMachiningData($machiningLineValues);
                $machiningCategories = $machiningModel->getMachiningCategories(); // Sesuaikan dengan metode yang sesuai

                // Mengembalikan data machining dan kategori dalam format JSON
                echo json_encode(['machiningData' => $machiningData, 'categories' => $machiningCategories]);
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['error' => 'Invalid request method']);
        }
    }



    public function getDataChart()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Material_model')->getDataChartHome());
    }


    public function getPieChartData()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Material_model')->getDataPie());
    }






}
?>