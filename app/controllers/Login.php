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
        $userModel = $this->model('User_model');
        $user = $userModel->checkCredentials($username, $password);

        // Handle hasil pemeriksaan kredensial
        if ($user) {
            // Memulai sesi
            session_start();

            // Simpan ID pengguna dalam session
            $_SESSION['user_id'] = $user['id']; // Gantilah dengan kolom ID yang sesuai di tabel pengguna

            // Redirect ke halaman utama atau melakukan tindakan selanjutnya
            header('Location:' . BASEURL);
            exit;
        } else {
            // Tampilkan pesan error jika kredensial tidak cocok
            echo 'Invalid credentials. Please try again.';
        }
    }








}
?>