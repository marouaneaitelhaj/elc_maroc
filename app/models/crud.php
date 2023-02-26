<?php

use LDAP\Result;

class crud extends Database
{
    public $query;

    public function addcategory($value1, $value2, $value3)
    {
        $image = $value3["name"];
        $sql = "INSERT INTO catégorie (nom, description, photo,visibility) VALUES ('$value1','$value2','$image','public');";
        mysqli_query($this->conn, $sql);
    }
    public function count()
    {
        $sql = "SELECT COUNT(`libelle`) FROM produit;";
        $res = [];
        foreach (mysqli_query($this->conn, $sql) as $re) {
            array_push($res, $re);
        }
        return $res;
    }
    public function limitread()
    {
        if (isset($_GET['id']) and isset($_GET['cat'])) {
            $id = ($_GET['id'] - 1) * 9;
            $cat = $_GET['cat'];
            $sql = "SELECT * FROM `produit` where `visibility`='public' and  `catégorie`='$cat' and (SELECT `visibility` FROM `catégorie` WHERE `IdCat`=$cat) ='public'  LIMIT $id,9;";
        } elseif (isset($_GET['id'])) {
            $id = ($_GET['id'] - 1) * 9;
            $sql = "SELECT p.* FROM `produit` p JOIN `catégorie` c ON p.`catégorie` = c.`IdCat` WHERE c.`visibility` = 'public' LIMIT $id, 9;";
        } elseif (isset($_GET['cat'])) {
            $cat = $_GET['cat'];
            $sql = "SELECT * FROM `produit` where `visibility`='public' and `catégorie`='$cat' and (SELECT `visibility` FROM `catégorie` WHERE `IdCat`=$cat) LIMIT 9;";
        } else {
            $sql = "SELECT p.* FROM `produit` p JOIN `catégorie` c ON p.`catégorie` = c.`IdCat` WHERE c.`visibility` = 'public' LIMIT 9;";
        }
        $res = [];
        foreach (mysqli_query($this->conn, $sql) as $re) {
            array_push($res, $re);
        }
        return $res;
    }
    public function visibility()
    {
        $id = $_GET['id'];
        $vis = $_GET['vis'];
        $sql = "UPDATE `produit` SET `visibility`='$vis' WHERE `IdPrd`=$id ";
        mysqli_query($this->conn, $sql);
    }
    public function visibilitycat()
    {
        $id = $_GET['id'];
        $vis = $_GET['vis'];
        $sql = "UPDATE `catégorie` SET `visibility`='$vis' WHERE `IdCat`=$id ";
        mysqli_query($this->conn, $sql);
    }
    public function admnlimitread()
    {
        $sql = "SELECT * FROM `produit`;";
        $res = [];
        foreach (mysqli_query($this->conn, $sql) as $re) {
            array_push($res, $re);
        }
        return $res;
    }
    public function dashboradcat()
    {
        $sql = "SELECT * FROM `catégorie`;";
        $res = [];
        foreach (mysqli_query($this->conn, $sql) as $re) {
            array_push($res, $re);
        }
        return $res;
    }
    public function DeleteCat($value1)
    {
        $sql = "DELETE FROM `catégorie` WHERE IdCat='$value1';";
        mysqli_query($this->conn, $sql);
    }
    public function editcategory($value1, $value2, $value3, $value4)
    {
        $image = $value3["name"];
        if (!$value3['size'] == 0) {
            $sql = "UPDATE  catégorie SET nom='$value1', description='$value2', photo='$image' where IdCat='$value4';";
        } else {
            $sql = "UPDATE  catégorie SET nom='$value1', description='$value2' where IdCat='$value4';";
        }
        mysqli_query($this->conn, $sql);
    }


    public function addproduct($value1, $value3, $value4, $value5, $value6, $value7, $value8)
    {
        $image = $value8["name"];
        $sql = "INSERT INTO produit (libelle, prixdachat, prixfinal, Prixoffre, description, catégorie,picProcuct,visibility) VALUES ('$value1','$value3','$value4','$value5','$value6','$value7','$image','public');";
        mysqli_query($this->conn, $sql);
    }
    public function readCatégorie()
    {
        $this->query = mysqli_query($this->conn, 'SELECT * FROM catégorie where `visibility`="public"');
    }
    public function readCatégorieByid($value1)
    {
        $this->query = mysqli_query($this->conn, "SELECT * FROM catégorie where IdCat='$value1'");
    }
    public function productlist()
    {
        // if (isset($_GET['cat'])) {
        // $cat = $_GET['cat'];

        // } else {
        // $sql = "SELECT * FROM `produit` where `visibility`='public';";
        // $this->query = mysqli_query($this->conn, "$sql");
        // }
    }
    public function suggestion()
    {
        $this->query = mysqli_query($this->conn, 'SELECT * FROM produit WHERE `visibility`="public" ORDER BY RAND() LIMIT 3');
    }
    public function details()
    {
        $idprd = mysqli_real_escape_string($this->conn, $_GET['id']);
        $this->query = mysqli_query($this->conn, "SELECT * FROM produit where IdPrd='$idprd'");
    }
    public function delete($value1)
    {
        $sql = "DELETE FROM `produit` WHERE IdPrd='$value1';";
        mysqli_query($this->conn, $sql);
    }
    public function editproduct($value1, $value2, $value3, $value4, $value5, $value6, $value7)
    {
        $idprd = mysqli_real_escape_string($this->conn, $_GET['id']);
        if (!$value7["size"] == 0) {
            $image = $value7["name"];
            $sql = "UPDATE produit SET libelle='$value1', prixdachat='$value2', prixfinal='$value3', Prixoffre='$value4',description='$value5', picProcuct='$image' where IdPrd='$idprd' ;";
        } else {
            $sql = "UPDATE produit SET libelle='$value1', prixdachat='$value2', prixfinal='$value3', Prixoffre='$value4',description='$value5'  where IdPrd='$idprd';";
        }
        mysqli_query($this->conn, $sql);

        header('location: ./productlist');
    }
    public function signup($value1, $value2, $value3, $value4)
    {
        $image = $value4["name"];
        $sql = "INSERT INTO `user` (`login`, `Password`, `email`, `TYPEACC`,`userPic`) VALUES ('$value1', '$value2', '$value3', 'user','$image');";
        mysqli_query($this->conn, $sql);
    }

    public function login($value1, $value2)
    {
        $sql = "SELECT * FROM `user`;";
        $result = mysqli_query($this->conn, $sql);
        foreach ($result as $user) {
            if ($value1 == $user['email'] and $value2 == $user['Password']) {
                $_SESSION["email"] = $user['email'];
                $_SESSION["username"] = $user['login'];
                $_SESSION["Password"] = $user['Password'];
                $_SESSION["TYPEACC"] = $user['TYPEACC'];
                $_SESSION["login"] = 'true';
                $_SESSION["userPic"] = $user['userPic'];
                $_SESSION["id"] = $user['id'];
                header('location: ./');
            }
        }
    }
    public function addtocart($value1, $value2)
    {
        $sql = "INSERT IGNORE INTO cart (IdPrd, client) VALUES ('$value1','$value2')";
        mysqli_query($this->conn, $sql);
    }
    public function factureModel()
    {
        $id = $_GET['id'];
        $clie = $_SESSION["id"];
        $sql = "SELECT * FROM `commande` WHERE `id`=$id;";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function readcart($value1)
    {
        $sql = "SELECT * FROM cart JOIN produit on cart.IdPrd = produit.IdPrd WHERE client='$value1'";
        return mysqli_query($this->conn, $sql);
    }
    public function allclient()
    {
        $sql = "SELECT * FROM `user` where TYPEACC=;";
        $this->query = mysqli_query($this->conn, $sql);
    }
    public function profile($value1)
    {
        if (isset($_SESSION['id']) and $_SESSION['id'] == 1) {
            $sql = "SELECT c.* , u.login FROM commande c LEFT JOIN user u ON c.idclient = u.id;";
        } else {
            $sql = "SELECT * FROM `commande` WHERE `idclient`=$value1;";
        }
        $this->query = mysqli_query($this->conn, $sql);
    }
    public function addcommand($value1, $value2, $value3, $value4, $value5, $value6)
    {
        $sql = "INSERT INTO `commande` (`datedecreation`,`idclient`, `prixtotaldelacommande`) VALUES (NOW(), '$value2', '$value1');";
        mysqli_query($this->conn, $sql);
        $sql = "SELECT LAST_INSERT_ID() as id;";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        for ($i = 0; $i < count($value3); $i++) {
            $sql = "INSERT INTO `productofcommand`(`ProductId`, `CommandId`, `Price`, `quan`, `total`) VALUES ($value3[$i],$id,$value4[$i],$value5[$i],$value6[$i])";
            mysqli_query($this->conn, $sql);
            $sql = "DELETE FROM cart where client=$value2;";
            mysqli_query($this->conn, $sql);
        }
    }
    public function deletefromcart($value1)
    {
        $sql = "DELETE FROM cart where id='$value1';";
        mysqli_query($this->conn, $sql);
    }
    public function Cancelcmnd($value1)
    {
        $sql = "DELETE FROM commande where id='$value1';";
        mysqli_query($this->conn, $sql);
    }
    public function Validecmnd($value1)
    {
        $sql = "UPDATE commande SET `situation`='sent', datedelivraison=DATE_ADD(NOW(), INTERVAL 3 DAY) WHERE `id`=$value1;";
        mysqli_query($this->conn, $sql);
    }
}
