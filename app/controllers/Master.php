<?php
class Master extends Controller
{
    public function material()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('master/material/index', $data);
        $this->view('templates/footer');

        echo "<script>document.getElementById('master').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('expand').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav').classList.add('show');</script>";
        echo "<script>document.getElementById('expand').setAttribute('area-expanded', 'true');</script>";
        echo "<script>$(document).ready(function () {
            RefreshDataMasterMaterial();
        })</script>";
    }

    public function cost_center()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('master/cost_center/index', $data);
        $this->view('templates/footer');

        echo "<script>document.getElementById('costCenterNav').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('expand').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav').classList.add('show');</script>";
        echo "<script>document.getElementById('expand').setAttribute('area-expanded', 'true');</script>";
        echo "<script>$(document).ready(function () {
            RefreshDataMasterCostCenter();
        })</script>";
    }

    public function user()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('master/user/index', $data);
        $this->view('templates/footer');

        echo "<script>document.getElementById('user').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('expand').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav').classList.add('show');</script>";
        echo "<script>document.getElementById('expand').setAttribute('area-expanded', 'true');</script>";
        echo "<script>$(document).ready(function () {
            RefreshDataMasterUser();
        })</script>";
    }

    public function getMasterMaterial()
    {
        $data = $this->model('Master_model')->getMaterialData();

        echo json_encode($data);
    }

    public function getMasterCostCenter()
    {
        $data = $this->model('Master_model')->getCostCenterData();

        echo json_encode($data);
    }

    public function getMasterUser()
    {
        $data = $this->model('Master_model')->getUserData();
        echo json_encode($data);
    }

    public function getDataEditMaterial()
    {
        $id = $_POST['id'];
        $data = $this->model('Master_model')->getMaterialById($id);

        echo json_encode($data);
    }

    public function updateDataMaterial()
    {
        $this->model('Master_model')->ubahDataMaterial($_POST);
        header('location:' . BASEURL . '/master/material');
    }

    public function updateDataCostCenter()
    {
        $this->model('Master_model')->ubahDataCostCenter($_POST);
        header('location:' . BASEURL . '/master/cost_center');
    }

    public function updateDataUser()
    {
        $this->model('Master_model')->ubahDataUser($_POST);
        header('location:' . BASEURL . '/master/user');
    }

    public function AddDataMaterial()
    {
        $result = $this->model('Master_model')->addMasterMaterial($_POST);

        if ($result > 0) {
            $_SESSION['message'] = [
                'type' => 'success',
                'content' => 'Berhasil menambahkan data dengan Part Number: ' . $_POST['part_number']
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'Gagal menambahkan data terjadi kesalahan.'
            ];
        }

        header('location:' . BASEURL . '/master/material');
    }

    public function AddDataCC()
    {
        $this->model('Master_model')->addMasterCC($_POST);
        header('location:' . BASEURL . '/master/cost_center');
    }

    public function AddDataUser()
    {
        $this->model('Master_model')->addMasterUser($_POST);
        header('location:' . BASEURL . '/master/user');
    }

    public function uploadMasterMaterial()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excelFile'])) {
            $file = $_FILES['excelFile']['tmp_name'];
            $userName = $_POST['userName'];

            // Panggil metode model untuk memproses file
            $result = $this->model('Master_model')->importExcelFile($file, $userName);

            if ($result) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'content' => 'File berhasil diproses.'
                ];
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'content' => 'Terjadi kesalahan saat memproses file.'
                ];
            }

        } else {
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => 'File tidak ditemukan atau permintaan tidak valid.'
            ];
        }

        header('Location: ' . BASEURL . '/master/material');
        exit;
    }

    public function downloadTemplate()
    {
        $templateFilePath = realpath(__DIR__ . '/../../public/template_excel/Format upload material master.xlsx');

        $fileName = 'Format upload material master.xlsx';

        if (file_exists($templateFilePath)) {
            // Tentukan header Content-Type untuk file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            // Tentukan header Content-Disposition untuk menentukan nama file yang akan didownload
            header('Content-Disposition: attachment; filename="' . $fileName . '"');

            // Baca file template Excel dan keluarkan ke output
            readfile($templateFilePath);
            exit;
        } else {
            echo 'File template tidak ditemukan.';
        }
    }

    public function masterMaterialDelete()
    {
        header('Content-Type: application/json');

        $result = $this->model('Master_model')->getDeleteMasterMaterial($_POST);

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil menghapus data dengan Part Number: ' . $_POST['partNumber']
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data.'
            ]);
        }
    }

    public function masterCCDelete()
    {
        header('Content-Type: application/json');

        $result = $this->model('Master_model')->deleteMasterCC($_POST);

        if ($result <= -1) {
            echo json_encode([
                'status' => 'error',
                'message' => 'File gambar tidak ditemukan terjadi kesalahan.'
            ]);
            exit;
        }

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil menghapus data dengan Line: ' . $_POST['lineCC']
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data.'
            ]);
        }
    }

    public function masterUserDelete()
    {
        header('Content-Type: application/json');

        $result = $this->model('Master_model')->deleteMasterUser($_POST);

        if ($result <= -1) {
            echo json_encode([
                'status' => 'error',
                'message' => 'File gambar tidak ditemukan terjadi kesalahan.'
            ]);
            exit;
        }

        if ($result > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil menghapus data dengan Username: ' . $_POST['username']
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data.'
            ]);
        }
    }







}
?>