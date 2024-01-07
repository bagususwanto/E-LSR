<?php
class Create extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        session_start();
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
        if ($this->model('Material_model')->tambahDataMaterial($_POST) > 0) {
            header('location:' . BASEURL . '/create');
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
    
    public function getMasterPart()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');
       
        echo json_encode($this->model('Material_model')->getMasterByMaterial($_POST['validLineValue2']));
    }



}
?>