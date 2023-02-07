<?php
class productlist extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $read = $this->model('crud');
        $read->productlist();
        $readcat = $this->model('crud');
        $readcat->readCatégorie();
        $pagination = $this->model('crud');
        $limitread = $this->model('crud');
        $this->viewjs('productlist', ['query' => $read->query, 'limitread' => $limitread->limitread(), 'count' => $pagination->count(), 'cat' => $readcat->query]);
    }
}
