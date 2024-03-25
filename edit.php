<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $bank = $collection_nasabah->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_nasabah->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'nama_nasabah' => $_POST['nama_nasabah'],
            'telpon' => $_POST['telpon'],
            'alamat' => $_POST['alamat'],
            'jeniskelamin' => $_POST['jeniskelamin'],
            ]
         ]
      );
      $_SESSION['success'] = "Data Berhasil Diupdate";
      header("Location: index.php");
   }
?>


<!DOCTYPE html>
<html>

<head>
    <title>PHP & MongoDB - CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Edit Data Barang</h1>
        <a href="index.php" class="btn btn-primary">Kembali</a>

        <form method="POST">
            <div class="form-group">
                <strong>Nama Nasabah</strong>
                <input type="text" name="nama_nasabah" value="<?php echo $bank->nama_nasabah; ?>" required=""
                    class="form-control" placeholder="Masukkan Nama Nasabah">
            </div>
            <div class="form-group">
                <strong>Telpon</strong>
                <input type="number" name="telpon" value="<?php echo $bank->telpon; ?>" required="" class="form-control"
                    placeholder="Masukkan telpon">
            </div>

            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" value="<?php echo $bank->alamat; ?>" required="" class="form-control"
                    placeholder="Masukkan alamat">
            </div>
            <div class="form-group">
                <strong>Jenis kelamin</strong>
                <input type="text" name="jeniskelamin" value="<?php echo $bank->jeniskelamin; ?>" required=""
                    class="form-control" placeholder="Masukkan jeniskelamin">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>