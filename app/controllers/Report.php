<?php
class Report extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        $id = $_SESSION['user_id'];
        $namaLine = $_SESSION['user_line'];

        $data['lineMaster'] = $this->model('Line_model')->getAllLine();
        $data['user'] = $this->model('User_model')->getAllUserById($id);
        $data['userMat'] = $this->model('Line_model')->getMatByLine($namaLine);

        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('report/index');
        $this->view('templates/footer');

    }

}
?>