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
                $total = 0;
                $total = $read['prixfinal'] * $_POST['quan'];
                $addtocart->addtocart($_GET['id'], $total, $read['prixfinal'], $_POST['quan'], $_SESSION['id']);
            }
            header("Refresh:0");
        }
        if (isset($_POST['BuyNOW'])) {
            $now = time();
            $two_days_from_now = strtotime("+2 days", $now);
            $seven_days_from_now = strtotime("+7 days", $now);
            $now_str = date("Y-m-d H:i:s", $now);
            $two_days_from_now_str = date("Y-m-d H:i:s", $two_days_from_now);
            $seven_days_from_now_str = date("Y-m-d H:i:s", $seven_days_from_now);
            $BuyNOW = $this->model('crud');
            $BuyNOW->addcommand("$now_str", "$two_days_from_now_str", "$seven_days_from_now_str", $_SESSION['id']);
            header("Refresh:0");
        }
        if (isset($_POST['delete'])) {
            $delete = $this->model('crud');
            $delete->deletefromcart($_POST['deleteid']);
            header("Refresh:0");
        }
    }
}
