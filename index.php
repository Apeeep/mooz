<?php
session_start();
include './config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zoom Meeting</title>
  <link rel="shortcut icon" href="./assets/img/Camera.png" type="image/x-icon">
</head>

<body>
  <section class="content">
    <div class="container">
      <div class="row">
        <?php
        $get = $connection->query("SELECT * FROM users");
        while ($perproduk = $get->fetch_assoc()) :
        ?>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="images/<?= $perproduk['users_img']; ?>">
              <div class="caption">
                <h3><?= $perproduk['users_name']; ?></h3>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
</body>

</html>