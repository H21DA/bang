<?php
   session_start();
   if(isset($_POST['submit'])) {
      require 'config.php';

      $insertOneResult = $collection_nasabah->insertOne([
         '_id' => $_POST['id'],
          'nama_nasabah' => $_POST['nama_nasabah'],
          'telpon' => $_POST['telpon'],
          'alamat' => $_POST['alamat'],
          'jeniskelamin' => $_POST['jeniskelamin'],
      ]);


      $_SESSION['success'] = "Data Berhasil Ditambahkan";
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
        <h1>Buat Data baru</h1>
        <a href="index.php" class="btn btn-primary">Kembali</a>
        <form method="POST">
            <div class="form-group">
                <strong>id Nasabah</strong>
                <input type="text" name="id" required="" class="form-control" placeholder="Masukkan id ">
            </div>
            <div class="form-group">
                <strong>Nama Nasabah</strong>
                <input type="text" name="nama_nasabah" required="" class="form-control"
                    placeholder="Masukkan Nama Nasabah">
            </div>
            <div class="form-group">
                <strong>Telpon</strong>
                <input type="number" name="telpon" required="" class="form-control" placeholder="Masukkan Telpon">
            </div>
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" required="" class="form-control" placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
                <strong>Jenis Kelamin</strong>
                <input type="text" name="jeniskelamin" required="" class="form-control"
                    placeholder="Masukkan jenis kelamin">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>