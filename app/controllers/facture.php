<?php
class facture extends controller
{
    public function __construct()
    {
        session_start();
        $this->model('Database');
        $facture = $this->model('crud');
        $facture->factureModel();
        $this->view('facture', ['facture' => $facture->factureModel()]);
    }
}
