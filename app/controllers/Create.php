<?php
class Create extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];


        // Mendapatkan data material dan user berdasarkan ID
        // $data['matMaster'] = $this->model('Material_model')->getAllMaterialMaster();
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('create/index', $data);
        $this->view('templates/footer');

        // Pindahkan pemanggilan JavaScript ke bagian bawah halaman atau setelah semua elemen HTML
        echo "<script>document.getElementById('create').classList.remove('collapsed');</script>";
        // Flasher::toast();
    }

    public function tambah()
    {
        header('Content-Type: application/json');

        try {
            $result = $this->model('Material_model')->AddDataMaterial($_POST);
            $this->model('Material_model')->addReport($_POST);

            if ($result > 0) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan data dengan No LSR: ' . $_POST['no_lsr']
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menambahkan data, terjadi kesalahan.'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }


    // public function submitReport()
    // {
    //     $lineSub = isset($_POST['lineSub']) ? $_POST['lineSub'] : null;
    //     $noLSRSub = isset($_POST['noLSRSub']) ? $_POST['noLSRSub'] : null;
    //     $userNameSub = isset($_POST['userNameSub']) ? $_POST['userNameSub'] : null;
    //     $tanggalSub = isset($_POST['tanggalSub']) ? $_POST['tanggalSub'] : null;
    //     $waktuSub = isset($_POST['waktuSub']) ? $_POST['waktuSub'] : null;

    //     $data = [
    //         'noLSRSub' => $noLSRSub,
    //         'lineSub' => $lineSub,
    //         'userNameSub' => $userNameSub,
    //         'tanggalSub' => $tanggalSub,
    //         'waktuSub' => $waktuSub
    //     ];

    //     $report_model = $this->model('Report_model');
    //     $submit = $report_model->submitData($lineSub, $data);

    //     if ($submit > 0) {
    //         Flasher::setToast('Pesan sukses', 'Berhasil submit data dengan no LSR ' . $noLSRSub, 'success', 6000);
    //         header('location:' . BASEURL . '/create');
    //         exit;
    //     } else {
    //         Flasher::setToast('Pesan gagal', 'Gagal submit data', 'warning', 6000);
    //         header('location:' . BASEURL . '/create');
    //         exit;
    //     }
    // }


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
        $tanggalValue = isset($_POST['tanggalValue']) ? $_POST['tanggalValue'] : null;
        $shiftUser = isset($_POST['shiftUser']) ? $_POST['shiftUser'] : null;
        $lineUser = isset($_POST['lineUser']) ? $_POST['lineUser'] : null;

        if ($tanggalValue === null || $shiftUser === null || $lineUser === null) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        // Panggil fungsi dari model dengan parameter yang sesuai
        $materialModel = $this->model('Material_model');
        $materialData = $materialModel->getAllMaterialCrieteria($tanggalValue, $shiftUser, $lineUser);

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
        $tanggalValue = isset($_POST['tanggalValue']) ? $_POST['tanggalValue'] : null;
        $shiftUser = isset($_POST['shiftUser']) ? $_POST['shiftUser'] : null;
        $lineUser = isset($_POST['lineUser']) ? $_POST['lineUser'] : null;
        $lineCode = isset($_POST['lineCode']) ? $_POST['lineCode'] : null;
        $costCenter = isset($_POST['costCenter']) ? $_POST['costCenter'] : null;

        if ($tanggalValue === null || $shiftUser === null || $lineUser === null || $lineCode === null || $costCenter === null) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        // Panggil fungsi dari model dengan parameter yang sesuai
        $materialModel = $this->model('Material_model');
        $materialData = $materialModel->getAllMaterialCrieteriaChange($tanggalValue, $shiftUser, $lineUser, $lineCode, $costCenter);

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

        $categoryVal = $_POST['categoryVal'];

        $report_model = $this->model('Report_model');
        $id = $report_model->generateUniqueID($categoryVal);

        echo json_encode(array("no_lsr" => $id));
    }

    public function checkNoLsr()
    {
        header('Content-Type: application/json');

        $noLsr = $_POST['noLsr'];

        $material_model = $this->model('Material_model');
        $matData = $material_model->getMatData($noLsr);

        echo json_encode($matData);
    }

    public function checkNoLsrWithLine()
    {
        header('Content-Type: application/json');

        $lineName = $_POST['lineName'];

        $material_model = $this->model('Material_model');
        $lineData = $material_model->getLineDataByLine($lineName);

        echo json_encode($lineData);
    }



}
?>