<?php
class allclient extends controller{
    public function __construct()
    {
        $this->model('Database');
        $allclient = $this->model('crud');
        $allclient->allclient();
        $this->view('allclient', ['allclient' => $allclient->query]);
    }
}