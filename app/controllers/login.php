<?php
class login extends controller
{
    public function __construct()
    {
        $this->view('login');
        if (!isset($_SESSION['login'])) {
            if (isset($_POST['btn'])) {
                $this->model('Database');
                $login = $this->model('crud');
                $login->login($_POST['email'], $_POST['Password']);
            }
        } else {
            header('location: ./');
        }
    }
}
