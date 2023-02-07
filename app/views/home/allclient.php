<div class="container">
  <img src="../uploads/<?= $_SESSION['userPic'] ?>" class="m-4 rounded-circle img-thumbnail" style="height: 150px;width:150px;" alt="">
  <h3><?= $_SESSION['username'] ?></h3>
  <div>
    <div class="m-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <?php
            if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'admin') {
            ?>
              <th scope="col">User</th>
              <th scope="col">Email</th>
              <!-- <th scope="col">Action</th> -->
            <?php
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($data['allclient'] as $profile) {
          ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <?php
            if (isset($_SESSION["TYPEACC"]) && $_SESSION["TYPEACC"] == 'admin') {
            ?>
              <td>
                <?= $profile['login'] ?>
              </td>
              <td>
                <?= $profile['email'] ?>
              </td>
              <?php
            }
            ?>

              <form action="" method="post">
                <input hidden name="Cancelid" value="<?= $profile['id'] ?>" type="text">
                
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