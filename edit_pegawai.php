<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $pegawai = $collection_pegawai->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_pegawai->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'pegawai_id' => $_POST['pegawai_id'],
            'kartu_id' => $_POST['kartu_id'],
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat']
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
        <h1>Edit Data pegawai</h1>
        <a href="index.php" class="btn btn-primary">Kembali</a>

        <form method="POST">
            <div class="form-group">
                <strong>Pegawai id</strong>
                <input type="text" name="pegawai_id" value="<?php echo $pegawai->pegawai_id; ?>" required=""
                    class="form-control" placeholder="Masukkan Pegawai id">
            </div>
            <div class="form-group">
                <strong>Kartu id</strong>
                <input type="text" name="kartu_id" value="<?php echo $pegawai->kartu_id; ?>" required=""
                    class="form-control" placeholder="Masukkan kartu id">
            </div>
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" value="<?php echo $pegawai->nama; ?>" required="" class="form-control"
                    placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" value="<?php echo $pegawai->alamat; ?>" required=""
                    class="form-control" placeholder="Masukkan alamat">
            </div>
            <div class="form-group">
                <strong>Hp</strong>
                <input type="text" name="hp" value="<?php echo $pegawai->hp; ?>" required="" class="form-control"
                    placeholder="Masukkan hp">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>