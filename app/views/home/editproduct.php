<div class="container">
    <div class="container-fluid h-custom bg-light">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../app/views/home/images/two phones.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 m-4 offset-xl-1">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal m-4">Add Product</p>

                    </div>

                    <?php
                            while ($details = mysqli_fetch_array($data['details'])) {
                            ?>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" value="<?=$details['libelle']?>" name="libelle" class="border form-control form-control-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Name of Product</label>
                    </div>

                    <div class="form-outline mb-4">
                        <textarea class="w-100 border" placeholder="Description" name="description" id="" cols="" rows=""><?=$details['description']?></textarea>
                    </div>
                    <div class="form-outline mb-4" style="text-align: left;">
                        <label class="form-label" for="form3Example3">Catégorie</label>
                        <select id="select" class="form-select border" name="catégorie" aria-label="Default select example">
                            <option  selected hidden value="value="<?=$details['catégorie']?>""><?=$details['nom']?></option>
                            <?php
                            while ($cat = mysqli_fetch_array($data['query'])) {
                            ?>
                                <option value="<?php echo $cat['IdCat']; ?>">
                                    <?php
                                    echo $cat['nom'];
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-outline mb-4">
                        <input id="fileproductPic" type="file" name="productPic">
                    </div>
                            
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="Number" id="form3Example4" value="<?=$details['prixdachat']?>"  name="prixdachat" class="form-control border form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Buying price</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="Number" id="form3Example4" value="<?=$details['prixfinal']?>" name="prixfinal" class="form-control border form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Final price</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="Number" id="form3Example4" value="<?=$details['Prixoffre']?>" name="Prixoffre" class="form-control  border form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Price offer</label>
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="btn" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Add Product</button>
                    </div>

                </form>
            </div>
            <?php
}
?>
        </div>
    </div>

</div>
