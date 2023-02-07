<?php
class delete extends controller{
    public function __construct()
    {
        $this->model('Database');
        $delete = $this->model('crud');
        $delete->delete($_GET['id']);
        header('location: ./dashborad');
    }
}