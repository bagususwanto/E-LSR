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
        $username = $_POST["signUser"];

        $uploadModel = $this->model('User_model');
        $result = $uploadModel->doUploadSign($file, $username);

        if ($result === "File tanda tangan berhasil diunggah.") {
            $_SESSION['sign'] = true;
            $_SESSION['message'] = [
                'type' => 'success',
                'content' => $result
            ];
            header("Location: " . BASEURL);
            exit;
        } elseif ($result === "File terlalu besar." || $result === "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.") {
            $_SESSION['message'] = [
                'type' => 'warning',
                'content' => $result
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'error',
                'content' => $result
            ];
        }

        header("Location: " . BASEURL . "/sign");
        exit;
    }



}
?>