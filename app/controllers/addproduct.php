<?php
class addproduct extends controller
{
    public function __construct()
    {
        $this->admin();

        $this->model('Database');
        $read = $this->model('crud');
        $read->readCatégorie();
        $this->view('addproduct', ['query' => $read->query]);
        if (isset($_POST['btn'])) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["productPic"]["name"]);
            move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file);
            $addproduct = $this->model('crud');
            $addproduct->addproduct($_POST['libelle'],   $_POST['prixdachat'], $_POST['prixfinal'], $_POST['Prixoffre'], $_POST['description'], $_POST['catégorie'], $_FILES['productPic']);
            header('location: ./productlist');
        }
    }
}
