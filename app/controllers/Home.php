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
        echo " <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>";
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

}
?>