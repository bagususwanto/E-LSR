<?php
class Home extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna dari session
        session_start();
        $id =  $_SESSION['user_id'];

        $data['user'] = $this->model('User_model')->getAllUserById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('home/index');
        $this->view('templates/footer');

        echo "<script>document.getElementById('dashboard').classList.remove('collapsed');</script>";
    }
}
?>