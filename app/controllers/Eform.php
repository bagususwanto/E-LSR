<?php
class Eform extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari sesi
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // FUNGSI EFORM
        $noLsr = $_GET['no_lsr'];
        $roleQc = "approveqc";
        $data['dataLsr'] = $this->model('Material_model')->getMatData($noLsr);
        $data['dataLsrResult'] = $this->model('Material_model')->getMatDataResult($noLsr);
        $data['userQcApprove'] = $this->model('User_model')->getAllUserByRole($roleQc);

        // Pencarian file gambar dengan ekstensi apapun
        $dir = realpath(__DIR__ . '/../../public/img/sign/');

        // Cek apakah direktori gambar valid
        if ($dir !== false) {
            $filesLH = glob($dir . '/' . $data['dataLsr']['user_lsr'] . '.*');
            $filesSH = !empty($data['dataLsr']['approved_by']) ? glob($dir . '/' . $data['dataLsr']['approved_by'] . '.*') : [];
            $filesOrdering = !empty($data['dataLsr']['received_by']) ? glob($dir . '/' . $data['dataLsr']['received_by'] . '.*') : [];
        } else {
            $filesLH = $filesSH = $filesOrdering = [];
        }

        // Validasi untuk setiap tanda tangan
        $reason = substr($data['dataLsr']['reason'], 0, 1);
        $repair = substr($data['dataLsr']['repair'], 0, 1);

        // Fungsi untuk menghasilkan tag img atau pesan "Tidak ada gambar."
        function getImageHtml($files)
        {
            if (!empty($files)) {
                $imgPath = $files[0];
                $imgUrl = BASEURL . '/img/sign/' . basename($imgPath);
                return "<img src='$imgUrl' width='100%' height='100%' alt='Signature'>";
            } else {
                return "";
            }
        }

        $data['imgLH'] = getImageHtml($filesLH);

        // Hanya menampilkan gambar jika reason === "D" dan repair === "0"
        $data['imgQc'] = "";  // Inisialisasi imgQc

        if (is_array($data['dataLsrResult'])) {
            foreach ($data['dataLsrResult'] as &$row) {
                if (is_array($row)) {
                    $reason = substr($row['reason'], 0, 1);
                    $repair = substr($row['repair'], 0, 1);

                    if ($reason === "D" && $repair === "0") {
                        $filesQc = glob($dir . '/' . $data['userQcApprove']['username'] . '.*');
                        $data['imgQc'] = !empty($filesQc) ? "<img src='" . BASEURL . "/img/sign/" . basename($filesQc[0]) . "' width='100%' height='100%' alt='Signature'>" : "Tidak ada signature.";
                        break;  // Hentikan loop karena kondisi sudah terpenuhi
                    }
                } else {
                    error_log('Expected array, got: ' . gettype($row));
                }
            }
        } else {
            error_log('Expected array, got: ' . gettype($data['dataLsrResult']));
        }


        // Set gambar SH
        $data['imgSH'] = getImageHtml($filesSH);

        // Set gambar Ordering
        $data['imgOrdering'] = getImageHtml($filesOrdering);



        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('eform/index', $data);
        $this->view('templates/footer');
    }
}
?>