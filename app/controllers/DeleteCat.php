<?php
class DeleteCat extends controller{
    public function __construct(){
        $this->admin();

        $this->model('Database');
        $DeleteCat = $this->model('crud');
        $DeleteCat->DeleteCat($_GET['id']);
        header('location: ./dashboradcat');
    }
}