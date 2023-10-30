<?php
$ambil = $connection->query("SELECT * FROM users WHERE id_users = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();


if (isset($_POST['update'])) {
  $namafoto = $_FILES['image']['name'];
  $lokasifoto = $_FILES['image']['tmp_name'];

  // jika foto dirubah
  if (!empty($lokasifoto)) {
    move_uploaded_file($lokasifoto, "../images/$namafoto");

    $connection->query("UPDATE users SET users_name='$_POST[nama]', users_img='$namafoto' WHERE id_users='$_GET[id]'");
  } else {
    $connection->query("UPDATE users SET users_name='$_POST[nama]' WHERE id_users='$_GET[id]'");
  }

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=produk';</script>";
}

?>


<h2>Ubah Produk</h2>

<div class="row">
  <div class="col-md-8">
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="name" class="form-control" value="<?= $pecah['users_name']; ?>">
      </div>
      <div class="form-group">
        <label for="">User Images</label><br>
        <img src="../images/<?= $pecah['users_img'] ?>" width="100%">
      </div>
      <div class="form-group">
        <label for="">Images Change</label>
        <input type="file" name="image" class="form-control">
      </div>
      <button name="update" class="btn btn-primary">Ubah</button>
    </form>
  </div>
</div>