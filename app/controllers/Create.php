<?php
class Create extends Controller
{
    public function index()
    {
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        $data['matMaster'] = $this->model('Material_model')->getAllMaterialMaster();
        // $data['matId'] = $this->model('Material_model')->getAllMaterialById($id);
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('create/index', $data);
        $this->view('templates/footer');

        echo "<script>document.getElementById('create').classList.remove('collapsed');</script>";
    }

    public function tambah()
    {
        // print_r($_POST);
        if ($this->model('Material_model')->tambahDataMaterial($_POST) > 0) {
            header('location:' . BASEURL . '/create');
            exit;
        }
    }

    public function getUbahSelectedMat()
    {
        // kirim kembali ID dalam format JSON
        // $id = $_POST['id'];

        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        // // Kembalikan respons dalam format JSON
        // echo json_encode(['id' => $id]);

        echo json_encode($this->model('Material_model')->getAllMaterialById($_POST['id']));
    }




}
?>