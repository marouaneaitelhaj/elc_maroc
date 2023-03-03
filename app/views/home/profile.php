<div class="container w-100">
  <img src="../uploads/<?= $_SESSION['userPic'] ?>" class="m-4 rounded-circle img-thumbnail" style="height: 150px;width:150px;" alt="">
  <h3><?= $_SESSION['username'] ?></h3>
  <div class="w-100">
    <div class="w-100">
      <table class="table w-100">
        <thead>
          <tr>
            <th scope="col">#</th>
            <?php
            if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'admin') {
            ?>
              <th scope="col">User</th>
            <?php
            }
            ?>
            <th scope="col">Date de creation</th>
            <th scope="col">Date de livraison</th>
            <th scope="col">situation</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($data['profile'] as $profile) {
          ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <?php
              if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'admin') {
              ?>
                <td>
                  <a href="allclient">
                    <?= $profile['login'] ?>
                  </a>
                </td>
              <?php
              }
              ?>
              <td><?= $profile['datedecreation'] ?></td>
              <td><?= $profile['datedelivraison'] ?></td>
              <?php
              if ($profile['situation'] == '') {
              ?>
                <td>waiting for verification</td>
              <?php
              } elseif ($profile['situation'] == 'sent') {
              ?>
                <td id="Countdown<?= $i ?>"></td>
              <?php
              }
              ?>
              <td class="text-danger">-<?= $profile['prixtotaldelacommande'] ?>$</td>
              <form action="" method="post">
                <input hidden name="Cancelid" value="<?= $profile['id'] ?>" type="text">
                <td>
                  <?php
                  if (!$profile['situation'] == 'sent' and isset($_SESSION["TYPEACC"]) and $_SESSION["TYPEACC"] == 'admin') {
                  ?>
                    <button type="submit" name="Valide" class="btn btn-danger">Valide</button>
                  <?php
                  }
                  ?>
                  <button type="submit" name="Cancel" class="btn btn-danger">Cancel</button>
                  <a href="facture?id=<?= $profile['id'] ?>">
                    <button type="button" class="btn">Facture</button>
                  </a>
                </td>
              </form>
            </tr>
            <script>
              var countDownDate = new Date("<?= $profile['datedelivraison'] ?>").getTime();
              console.log("efgk");
              var now = new Date().getTime();
              var distance = countDownDate - now;
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              document.getElementById("Countdown<?= $i ?>").innerHTML = days + "d " + hours + "h"
              if (distance < 0) {
                clearInterval(x);
                document.getElementById("Countdown<?= $i ?>").innerHTML = "Delivered";
              }
            </script>
          <?php
            $i++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>