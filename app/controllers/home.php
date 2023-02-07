<?php
class home extends controller{
    public function __construct()
    {
        $this->model('Database');
        $suggestion = $this->model('crud');
        $suggestion->suggestion();
        $this->view('index', ['suggestion' => $suggestion->query]);
    }
}