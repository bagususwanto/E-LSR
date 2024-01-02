<?php
class Create extends Controller
{
    public function index()
    {
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('create/index', $data);
        $this->view('templates/footer');
    }
}
?>