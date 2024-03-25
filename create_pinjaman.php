<?php
   session_start();
   if(isset($_POST['submit'])) {
      require 'config.php';

      $insertOneResult = $collection_pinjaman->insertOne([
         '_id' => $_POST['id'],
         'pegawai_id' => $_POST['pegawai_id'],
          'nasabah_id' => $_POST['nasabah_id'],
          'jenisgadai' => $_POST['jenisgadai'],
          'tglgadai' => $_POST['tglgadai'],
          'tglpelunasan' => $_POST['tglpelunasan'],
          'nominalpinjaman' => $_POST['nominalpinjaman'],
          'totalpembayaran' => $_POST['totalpembayaran'],

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
                <strong>id Peminjam</strong>
                <input type="text" name="id" required="" class="form-control" placeholder="Masukkan id Peminjam">
            </div>
            <div class="form-group">
                <strong>Nasabah id</strong>
                <input type="text" name="nasabah_id" required="" class="form-control"
                    placeholder="Masukkan  Nasabah_id">
            </div>
            <div class="form-group">
                <strong>Jenisgadai</strong>
                <input type="text" name="jenisgadai" required="" class="form-control" placeholder="Masukkan jenisgadai">
            </div>
            <div class="form-group">
                <strong>Tglgadai</strong>
                <input type="text" name="tglgadai" required="" class="form-control" placeholder="Masukkan tglgadai">
            </div>
            <div class="form-group">
                <strong>Tglpelunasan</strong>
                <input type="text" name="tglpelunasan" required="" class="form-control"
                    placeholder="Masukkan pelanasan">
            </div>
            <div class="form-group">
                <strong>Nominalpinjaman</strong>
                <input type="text" name="nominalpinjaman" required="" class="form-control"
                    placeholder="Masukkan nominalpinjaman">
            </div>
            <div class="form-group">
                <strong>Totalpembayaran</strong>
                <input type="text" name="totalpembayaran" required="" class="form-control"
                    placeholder="Masukkan totalpembayaran">
            </div>
            <div class="form-group">
                <strong>id pegawai</strong>
                <input type="text" name="pegawai_id" required="" class="form-control"
                    placeholder="Masukkan totalpembayaran">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>