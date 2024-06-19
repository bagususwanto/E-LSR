<?php
class Sign extends Controller
{
    public function index()
    {
        $id = $_SESSION['user_id'];
        $data['user'] = $this->model('User_model')->getAllUserById($id);

        $this->view('templates/header', $data);
        $this->view('sign/index', $data);
    }

    public function signUpload()
    {
        $file = $_FILES["signFile"];

        $username = "signUser";

        $uploadModel = $this->model('User_model');

        $result = $uploadModel->doUploadSign($file, $username);

        echo $result;
    }




}
?>