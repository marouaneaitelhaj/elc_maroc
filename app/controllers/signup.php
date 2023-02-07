<?php
class signup extends controller
{
    public function __construct()
    {
        $this->view('signup');
        if (isset($_SESSION['login'])) {

            header('location: ./');
        }else{
        if (isset($_POST['btn'])) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["userPic"]["name"]);
            move_uploaded_file($_FILES["userPic"]["tmp_name"], $target_file);
            $this->model('Database');
            $signup = $this->model('crud');
            $signup->signup($_POST['login'], $_POST['Password'], $_POST['email'], $_FILES["userPic"]);
        }
    }
    }
}
