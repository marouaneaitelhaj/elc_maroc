<div class="container">
    <div class="d-flex justify-content-around flex-wrap">
        <?php
        if (mysqli_num_rows($data['query']) > 0) {
        while ($cat = mysqli_fetch_array($data['query'])) {
        ?>
            <div class="mt-4">
                <div class="wid500 card" style="width: 18rem;">
                    <img class="card-img-top" src="../uploads/<?= $cat['photo'] ?>" style="object-fit: cover;height: 180px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cat['nom'] ?></h5>
                        <p class="card-text"><?= $cat['description'] ?></p>
                        <a href="./productlist?cat=<?= $cat['IdCat'] ?>" class="btn m-4">See Product</a>
                        <br>
                        <?php
                        if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'admin') {
                        ?>
                            <a href="./DeleteCat?id=<?= $cat['IdCat'] ?>" class="btn p-1" style="background-color: #d9534f;">Delete</a>
                            <a href="./editCat?id=<?= $cat['IdCat'] ?>" class="btn p-1" style="background-color: #337ab7;">Edit</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
    }else{
            echo "<h1>NOTHING TO SHOW</h1>";
    }
        ?>
    </div>
</div>