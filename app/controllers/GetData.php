<?php
class GetData extends Controller
{

    public function index()
    {
        $data['mat'] = $this->model('Material_model')->getAllMaterial();
        // Tampilkan view
        $this->view('getdata/index', $data);
    }

    public function dataLsr()
    {
        // Atur header untuk memberi tahu bahwa respons adalah JSON
        header('Content-Type: application/json');

        echo json_encode($this->model('Material_model')->getAllMaterial());
    }

}
?>