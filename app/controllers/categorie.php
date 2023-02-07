<?php
class categorie extends controller{
    public function __construct()
    {
        
        $this->model('Database');
        $read = $this->model('crud');
        $read->readCatégorie();
        $this->view('categorie', ['query' => $read->query]);
    }
}