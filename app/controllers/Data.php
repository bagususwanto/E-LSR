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
        $costCenter = $_POST['costCenter'];
        $shift = $_POST['shift'];
        $material = $_POST['material'];

        // Mendapatkan data dari model
        $data = $this->model('Material_model')->getFilteredData($tanggalFrom, $tanggalTo, $line, $costCenter, $shift, $material);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }

}
?>