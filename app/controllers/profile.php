<?php
class profile extends controller{
    public function __construct()
    {
        $this->model('Database');
        session_start();
        $profile = $this->model('crud');
        $profile->profile($_SESSION['id']);
        $this->view('profile', ['profile' => $profile->query]);
        if(isset($_POST['Cancel'])){
            $Cancel = $this->model('crud');
            $Cancel->Cancelcmnd($_POST['Cancelid']);
            header("Refresh:0");
        }
        if(isset($_POST['Valide'])){
            $Cancel = $this->model('crud');
            $Cancel->Validecmnd($_POST['Cancelid']);
            header("Refresh:0");
        }
    }
}