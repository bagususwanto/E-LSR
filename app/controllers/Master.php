<?php
class Master extends Controller
{
    public function material()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('master/material/index');
        $this->view('templates/footer');

        echo "<script>document.getElementById('master').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('expand').classList.remove('collapsed');</script>";
        echo "<script>document.getElementById('forms-nav').classList.add('show');</script>";
        echo "<script>document.getElementById('expand').setAttribute('area-expanded', 'true');</script>";
        echo "<script>document.addEventListener('DOMContentLoaded', function() {
            RefreshDataMasterMaterial();
        })</script>";
    }

    public function getMasterMaterial()
    {
        $data = $this->model('Master_model')->getMaterialData();

        echo json_encode($data);
    }

    public function getDataEditMaterial()
    {
        $id = $_POST['id'];
        $data = $this->model('Master_model')->getMaterialById($id);

        echo json_encode($data);
    }

}
?>