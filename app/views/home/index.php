<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h1>
                <span  class="ds display-1">SMART</span>
                <span style="color: black;" class="display-1">TV</span>
            </h1>
        </div>
        <div class="col">
            <img class="w-75" src="../app/views/home/images/Untitled design (1).png">
        </div>
    </div>
    <div class="container">
    <div class="d-flex justify-content-around flex-wrap">
        <?php
        while ($suggestion = mysqli_fetch_array($data['suggestion'])) {
        ?>
            <div class="mt-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../uploads/<?= $suggestion['picProcuct'] ?>" style="object-fit: cover;height: 180px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $suggestion['libelle'] ?></h5>
                        <p class="card-text"><?= $suggestion['description'] ?></p>
                        <a href="./details?id=<?= $suggestion['IdPrd'] ?>" class="btn">See Details</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>
