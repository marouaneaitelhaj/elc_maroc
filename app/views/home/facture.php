<div class="container w-100 d-flex justify-content-center align-items-center">
    <div class="card w-100">
        <div class="card-body w-100 mx-4">
            <div class="container w-100">
                <p class="my-5 w-100 mx-5" style="font-size: 30px;">Thank for your purchase</p>
                <div class="w-100 row">
                    <hr>

                    <?php
                    foreach ($data['facture'] as $facture) {
                    ?>
                        <div class="col-xl-10">
                            <p><?= $facture['libelle'] ?></p>
                        </div>
                        <div class="col-xl-2">
                            <p><?= $facture['total'] ?>$</p>

                        </div>
                    <?php
                    }
                    ?>

                    <hr>
                </div>

                <div class="row text-black">

                    <div class="col-xl-12">
                        <p class=" fw-bold">Total : $<?= $facture['prixtotaldelacommande'] ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>