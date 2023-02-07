<select name="" id="select">
    <option value="0">All</option>
    <option selected hidden>SORT</option>
    <?php
    while ($cat = mysqli_fetch_array($data['cat'])) {
    ?>
        <option value="<?= $cat['IdCat'] ?>"><?= $cat['nom'] ?></option>
    <?php
    }
    ?>
</select>
<div id="container">

</div>
<div class="container" id="container">
    <div class="d-flex justify-content-around flex-wrap">
        <?php
        if (count($data['limitread']) > 0) {
            foreach ($data['limitread'] as $produit) {
        ?>
                <div class="mt-4">
                    <div class="wid500 card" style="width: 18rem;">
                        <img class="card-img-top" src="../uploads/<?= $produit['picProcuct'] ?>" style="object-fit: cover;height: 180px;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produit['libelle'] ?></h5>
                            <td><?= substr($produit["description"], 0, 20); ?>...</td>
                            <br>
                            <a href="./details?id=<?= $produit['IdPrd'] ?>" class="btn m-4">See Details</a>

                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h1>NOTHING TO SHOW</h1>";
        }
        ?>

    </div>
</div>
<div aria-label="Page navigation bg-white example">
    <ul class="justify-content-center bg-white m-4 pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php
        for ($i = 0; $i < ceil($data['count'][0]["COUNT(`libelle`)"] / 9); $i++) {
        ?>
            <?php
            if (isset($_GET['cat'])) {
            ?>
                <li class="page-item"><a class="page-link" href="?cat=<?= $_GET['cat'] ?>&id=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
            <?php
            } else {
            ?>
                <li class="page-item"><a class="page-link" href="?id=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
            <?php
            }
            ?>
        <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</div>