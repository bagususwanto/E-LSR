<?php
class Home extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}
?>