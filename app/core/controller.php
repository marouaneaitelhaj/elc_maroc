<?php

class controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    public function view($view, $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ob_get_clean();
        ob_start();
        echo '<script type="text/javascript">document.body.innerHTML = "";</script>';
        require_once '../app/views/home/header.php';
        require_once '../app/views/home/' . $view . '.php';
        require_once '../app/views/home/footer.php';
    }
    public function viewjs($view, $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ob_get_clean();
        ob_start();
        echo '<script type="text/javascript">document.body.innerHTML = "";</script>';
        require_once '../app/views/home/header.php';
        require_once '../app/views/home/' . $view . '.php';
        require_once '../app/views/home/footer.php';
        require_once '../app/views/home/main/main.js';
    }
}
