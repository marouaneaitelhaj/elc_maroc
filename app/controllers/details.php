<?php
class details extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $read = $this->model('crud');
        $read->details();
        $suggestion = $this->model('crud');
        $suggestion->suggestion();
        $readcart = $this->model('crud');
        session_start();
        $this->view('details', ['query' => $read->query, 'suggestion' => $suggestion->query, 'cart' => $readcart->readcart($_SESSION["id"])]);
        if (isset($_POST['btn'])) {
            foreach ($read->query as $read) {
                $addtocart = $this->model('crud');
                var_dump($_POST);
                $addtocart->addtocart($_GET['id'], $_SESSION['id']);
            }
            header("Refresh:0");
        }
        if (isset($_POST['BuyNOW'])) {
            $BuyNOW = $this->model('crud');
            $BuyNOW->addcommand($_POST['total'], $_SESSION['id'], $_POST['productid'], $_POST['productprice'], $_POST['quantity'], $_POST['minitotal']);
            header("Refresh:0");
        }
        if (isset($_POST['delete'])) {
            $delete = $this->model('crud');
            $delete->deletefromcart($_POST['deleteid']);
            header("Refresh:0");
        }
    }
}
