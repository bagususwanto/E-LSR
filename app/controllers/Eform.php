<?php
class Eform extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        $dir = realpath(__DIR__ . '/../../public/img/sign/');

        // Pencarian file gambar dengan ekstensi apapun
        $files = glob($dir . '/' . $data['user']['username'] . '.*');

        if (!empty($files)) {
            // Ambil path dari file pertama yang ditemukan
            $imgFilePath = $files[0];
            $imgUrl = BASEURL . '/img/sign/' . basename($imgFilePath);
            $data['imgTag'] = "<img src='$imgUrl' width='100%' height='100%' alt='Signature'>";
        } else {
            // Jika tidak ada gambar yang ditemukan
            $data['imgTag'] = "Tidak ada gambar.";
        }
        // Tampilkan view
        $this->view('templates/header', $data);
        // $this->view('templates/sidebar');
        $this->view('eform/index', $data);
        $this->view('templates/footer');

    }

}
?>