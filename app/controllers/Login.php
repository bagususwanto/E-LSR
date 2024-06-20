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
            $_SESSION['user_line'] = $user['line_user'];
            $_SESSION['login'] = true;

            $dir = realpath(__DIR__ . '/../../public/img/sign/');

            // Pencarian file gambar dengan ekstensi apapun
            $files = glob($dir . '/' . $user['username'] . '.*');

            //check file tanda tangan ada atau ga
            if (!empty($files)) {
                $_SESSION['sign'] = true;
                header('Location:' . BASEURL);
                exit;
            } else {
                header('Location:' . BASEURL . '/sign');
                exit;
            }
        } else {
            header('Location:' . BASEURL . '/login');
            Flasher::setFlash('username atau password tidak sesuai,', 'gagal', 'login', 'danger');
            // echo 'Invalid credentials. Please try again.';
        }
    }


}
?>