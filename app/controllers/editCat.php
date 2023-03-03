<?php
class editCat extends controller{
    public function __construct()
    {
        $this->admin();

        $this->model('Database');
        $read = $this->model('crud');
        $read->readCatégorieByid($_GET['id']);
        $this->view('editCat', ['query' => $read->query]);
        if(isset($_POST['btn'])){
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["catPic"]["name"]);
            move_uploaded_file($_FILES["catPic"]["tmp_name"], $target_file);
            $update = $this->model('crud');
            $update->editcategory($_POST['libelle'], $_POST['description'], $_FILES["catPic"],$_GET['id']);
            header('location: ./Categorie');
        }
    }
}