<?php
class addcategory extends controller
{
    public function __construct()
    {
        $this->view('addcategory');
        if (isset($_POST['btn'])) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["catPic"]["name"]);
            move_uploaded_file($_FILES["catPic"]["tmp_name"], $target_file);
            $this->model('Database');
            $addcategory = $this->model('crud');
            $addcategory->addcategory($_POST['libelle'], $_POST['description'], $_FILES["catPic"]);
        header('location: ./Categorie');

        }
    }
}
