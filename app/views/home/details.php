<form class="d-flex  flex-column justify-content-around" action="" method="post">

    <div class="shopping-cart container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Shopping Cart</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['cart'] as $cart) {
                        ?>
                            <tr>
                                <td><?= $cart['libelle'] ?></td>
                                <td>
                                    <input  value="1" min="1" class='quantity'  name="quantity[]" type="number" class="w-50">
                                    <input  value="1" min="1" class='minitotal'  hidden name="minitotal[]" type="number" class="w-50">
                                </td>
                                
                                <input type="text" value="<?= $cart['id'] ?>" hidden name="deleteid" id="">
                                <input type="text" value="<?= $cart['IdPrd'] ?>"  hidden name="productid[]" id="">
                                <input type="text" value="<?= $cart['prixfinal'] ?>" hidden name="productprice[]" id="">
                                <td class="price"><?= $cart['prixfinal'] ?></td>
                                <td>
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h2>Order Summary</h2>
                <p>Total: $<span id="total"></span></p>
                <input type="number" name="total" hidden id='total1'>
                <button type="submit" name="BuyNOW" class="btn  btn-block mt-5">Place Order</button>
            </div>
        </div>
    </div>

    <div>
        <?php
        while ($produit = mysqli_fetch_array($data['query'])) {
        ?>
            <div style="min-height: 10vh;" class="p-2 bg-light container  mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center"><?= $produit['libelle'] ?></h3>
                        <p class="text-center">Price: <?= $produit['prixfinal'] ?>$<span id="price">0</span></p>
                        <form>
                            <?php
                            if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'user') {
                            ?>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <p><?= $produit['description'] ?></p>
                            </div>
                            <?php
                            if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'user') {
                            ?>
                                <button type="submit" name="btn" class="btn  btn-block">Add to Cart</button>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="../uploads/<?= $produit['picProcuct'] ?>" style="width=450px;height: 250px;" alt="Product Image" class="mt-3 object-fit-cover img-fluid">
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <div class="d-flex justify-content-around flex-wrap">
            <?php
            while ($suggestion = mysqli_fetch_array($data['suggestion'])) {
            ?>
                <div class="mt-4">
                    <div class="card wid500" style="width: 18rem;">
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
</form>
<script>
    var total = 0;
    var quantity = 0;
    var price = 0;
    var minitotal = 0;
    for(var i = 0; i < document.getElementsByClassName('quantity').length; i++){
        document.getElementsByClassName('quantity')[i].addEventListener('input', function(){
            total = 0;
            quantity = 0;
            price = 0;
            for(var j = 0; j < document.getElementsByClassName('quantity').length; j++){
                quantity = document.getElementsByClassName('quantity')[j].value;
                price = document.getElementsByClassName('price')[j].innerHTML;
                total = total + (quantity * price);
                minitotal = quantity * price;
                document.getElementsByClassName('minitotal')[j].value = minitotal;
                minitotal = 0;
                document.querySelector("#total").innerHTML = total;
                document.querySelector("#total1").value = total;
            
        }
    })
    }
    for(var j = 0; j < document.getElementsByClassName('quantity').length; j++){
                quantity = document.getElementsByClassName('quantity')[j].value;
                price = document.getElementsByClassName('price')[j].innerHTML;
                total = total + (quantity * price);
                minitotal = quantity * price;
                document.getElementsByClassName('minitotal')[j].value = minitotal;
                minitotal = 0;
                document.querySelector("#total").innerHTML = total;
                document.querySelector("#total1").value = total;
            
        }
</script>