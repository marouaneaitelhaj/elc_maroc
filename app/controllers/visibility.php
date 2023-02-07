<?php
class visibility extends controller{
    public function __construct()
    {
        $this->model('Database');
        session_start();
        $visibility = $this->model('crud');
        $visibility->visibility();
        header('location: ./dashborad');
    }
}