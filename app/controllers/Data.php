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
}
?>