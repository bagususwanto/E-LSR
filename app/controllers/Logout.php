<?php
class Logout extends Controller
{
    public function index()
    {
        $this->view('logout/index');
    }

    public function logoutUser()
    {
        // Hancurkan session dan hapus semua data session
        session_destroy();

        // Redirect ke halaman utama atau melakukan tindakan selanjutnya
        header('Location:' . BASEURL . '/login');
        exit;
    }
}

?>