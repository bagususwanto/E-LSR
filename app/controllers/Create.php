<?php
class Create extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];


        // Mendapatkan data material dan user berdasarkan ID
        // $data['matMaster'] = $this->model('Material_model')->getAllMaterialMaster();
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('create/index', $data);
        $this->view('templates/footer');

        // Pindahkan pemanggilan JavaScript ke bagian bawah halaman atau setelah semua elemen HTML
        echo "<script>document.getElementById('create').classList.remove('collapsed');</script>";
    }

    public function tambah()
    {
        // print_r($_POST);
        if ($this->model('Material_model')->AddDataMaterial($_POST) > 0) {
            // Flasher::setFlash('data', 'berhasil', 'ditambahkan', 'success');
            // header('location:' . BASEURL . '/create#tabelData2');
            exit;
        } else {
            // Flasher::setFlash('data', 'gagal', 'ditambahkan', 'danger');
            // header('location:' . BASEURL . '/create#tabelData2');
            exit;
        }
    }

    public function getUbahSelectedMat()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        // // Kembalikan respons dalam format JSON
        // echo json_encode(['id' => $id]);

        echo json_encode($this->model('Material_model')->getAllMaterialById($_POST['id']));
    }

    public function getUbahSelectedLine()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('User_model')->getAllUserById($_POST['id']));
    }

    public function getUbahSelectedLineMaster()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Line_model')->getLineByNamaLine($_POST['validLineValue']));
    }

    public function changeUbahSelectedLine()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Line_model')->getAllLineById($_POST['id']));
    }
    public function getMasterPart()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Material_model')->getMasterByMaterial($_POST['validLineValue2']));
    }

    public function getMasterLine()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Line_model')->getAllLine());
    }

    public function getDataTable()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        // Validasi dan bersihkan input
        $material = isset ($_POST['material']) ? $_POST['material'] : null;
        $tanggalValue = isset ($_POST['tanggalValue']) ? $_POST['tanggalValue'] : null;
        $shiftUser = isset ($_POST['shiftUser']) ? $_POST['shiftUser'] : null;
        $lineUser = isset ($_POST['lineUser']) ? $_POST['lineUser'] : null;

        if ($material === null || $tanggalValue === null || $shiftUser === null || $lineUser === null) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        // Panggil fungsi dari model dengan parameter yang sesuai
        $materialModel = $this->model('Material_model');
        $materialData = $materialModel->getAllMaterialCrieteria($material, $tanggalValue, $shiftUser, $lineUser);

        if ($materialData !== false) {
            // Jika pengambilan data berhasil, encode dan echo respons JSON
            echo json_encode($materialData);
        } else {
            // Handle the case where there is an error in getting the data
            echo json_encode(['error' => 'Error getting data']);
        }
    }

    public function getDataTableChange()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        // Validasi dan bersihkan input
        $material = isset ($_POST['material']) ? $_POST['material'] : null;
        $tanggalValue = isset ($_POST['tanggalValue']) ? $_POST['tanggalValue'] : null;
        $shiftUser = isset ($_POST['shiftUser']) ? $_POST['shiftUser'] : null;
        $lineUser = isset ($_POST['lineUser']) ? $_POST['lineUser'] : null;
        $lineCode = isset ($_POST['lineCode']) ? $_POST['lineCode'] : null;
        $costCenter = isset ($_POST['costCenter']) ? $_POST['costCenter'] : null;

        if ($material === null || $tanggalValue === null || $shiftUser === null || $lineUser === null || $lineCode === null || $costCenter === null) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        // Panggil fungsi dari model dengan parameter yang sesuai
        $materialModel = $this->model('Material_model');
        $materialData = $materialModel->getAllMaterialCrieteriaChange($material, $tanggalValue, $shiftUser, $lineUser, $lineCode, $costCenter);

        if ($materialData !== false) {
            // Jika pengambilan data berhasil, encode dan echo respons JSON
            echo json_encode($materialData);
        } else {
            // Handle the case where there is an error in getting the data
            echo json_encode(['error' => 'Error getting data']);
        }
    }

    public function getDataDelete()
    {
        $result = $this->model('Material_model')->deleteDataCreate($_POST);

        if ($result > 0) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil dihapus.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menghapus data.']);
        }
    }

    public function getIdReport()
    {
        header('Content-Type: application/json');

        $validLineValue = $_POST['validLineValue'];

        $report_model = $this->model('Report_model');
        $id = $report_model->generateUniqueID($validLineValue);

        echo json_encode(array("no_lsr" => $id));
    }


}
?>