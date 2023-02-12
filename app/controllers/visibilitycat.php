<?php
class visibilitycat extends controller{
    public function __construct()
    {
        $this->model('Database');
        session_start();
        $visibility = $this->model('crud');
        $visibility->visibilitycat();
        header('location: ./dashboradcat');
    }
}