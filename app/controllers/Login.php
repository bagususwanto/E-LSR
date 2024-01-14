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

            // Simpan ID pengguna dalam session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login'] = true;

            // Redirect ke halaman utama atau melakukan tindakan selanjutnya
            header('Location:' . BASEURL);
            exit;
        } else {
            header('Location:' . BASEURL . '/login');
            // Tampilkan pesan error jika kredensial tidak cocok
            Flasher::setFlash('username atau password tidak sesuai,', 'gagal', 'login', 'danger');
            // echo 'Invalid credentials. Please try again.';
        }
    }


}
?>