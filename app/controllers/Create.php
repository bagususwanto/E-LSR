<?php
class Create extends Controller
{
    public function index()
    {
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        // $data['matId'] = $this->model('Material_model')->getAllMaterialById($id);
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('create/index', $data);
        $this->view('templates/footer');

        echo "<script>document.getElementById('create').classList.remove('collapsed');</script>";
    }

    public function tambah()
    {
        if ($this->model('Material_model')->tambahDataMaterial($_POST) > 0) {
            header('location' . BASEURL . '/create');
            exit;
        }
    }
}
?>