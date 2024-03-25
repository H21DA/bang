<?php
   session_start();
   if(isset($_POST['submit'])) {
      require 'config.php';

      $insertOneResult = $collection_pegawai->insertOne([
         '_id' => $_POST['id'],
          'kartu_id' => $_POST['kartu_id'],
          'nama' => $_POST['nama'],
          'alamat' => $_POST['alamat'],
          'hp' => $_POST['hp'],
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
                <strong>id pegawai</strong>
                <input type="text" name="id" required="" class="form-control" placeholder="Masukkan id ">
            </div>
            <div class="form-group">
                <strong>Kartu id</strong>
                <input type="text" name="kartu_id" required="" class="form-control" placeholder="Masukkan id kartu ">
            </div>
            <div class="form-group">
                <strong>Nama pegawai</strong>
                <input type="text" name="nama" required="" class="form-control" placeholder="Masukkan Nama pegawai">
            </div>
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" required="" class="form-control" placeholder="Masukkan alamat">
            </div>
            <div class="form-group">
                <strong>Hp</strong>
                <input type="number" name="hp" required="" class="form-control" placeholder="Masukkan Hp">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>