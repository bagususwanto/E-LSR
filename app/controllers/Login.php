<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }



    public function loginUser()
    {
        // Mendapatkan data dari formulir login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Memeriksa kredensial menggunakan UserModel
        $userModel = $this->model('User_model'); // Sesuaikan dengan cara pemanggilan model pada framework Anda
        $isValidCredentials = $userModel->checkCredentials($username, $password);

        // Handle hasil pemeriksaan kredensial
        if ($isValidCredentials) {
            // Menampilkan notifikasi JavaScript jika kredensial valid
            echo '<script>alert("Login successful!"); window.location.href = "' . BASEURL . '";</script>';
            exit;
        } else {
            // Menampilkan notifikasi JavaScript jika kredensial tidak cocok
            echo '<script>alert("Invalid credentials. Please try again.");</script>';
        }
    }







}
?>