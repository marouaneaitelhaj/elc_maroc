<?php
class productlist extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $readcat = $this->model('crud');
        $readcat->readCatégorie();
        $pagination = $this->model('crud');
        $limitread = $this->model('crud');
        $this->viewjs('productlist', ['limitread' => $limitread->limitread(), 'count' => $pagination->count(), 'cat' => $readcat->query]);
    }
}
