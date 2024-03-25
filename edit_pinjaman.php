<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $pinjaman = $collection_pinjaman->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_pinjaman->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'nasabah_id' => $_POST['nasabah_id'],
            'pegawai_id' => $_POST['pegawai_id'],
            'jenisgadai' => $_POST['jenisgadai'],
            'tglgadai' => $_POST['tglgadai'],
            'tglpelunasan' => $_POST['tglpelunasan'],
            'nominalpinjaman' => $_POST['nominalpinjaman'],
            'totalpembayaran' => $_POST['totalpembayaran']

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
                <strong>Nasabah id</strong>
                <input type="text" name="nasabah_id" value="<?php echo $pinjaman->nasabah_id; ?>" required=""
                    class="form-control" placeholder="Masukkan Nasbah id">
            </div>
            <div class="form-group">
                <strong>Pegawai id</strong>
                <input type="text" name="pegawai_id" value="<?php echo $pinjaman->pegawai_id; ?>" required=""
                    class="form-control" placeholder="Masukkan Pegawai id">
            </div>
            <div class="form-group">
                <strong>jenisgadai</strong>
                <input type="text" name="jenisgadai" value="<?php echo $pinjaman->jenisgadai; ?>" required=""
                    class="form-control" placeholder="Masukkan jenisgadai">
            </div>
            <div class="form-group">
                <strong>Tgl Gadai</strong>
                <input type="text" name="tglgadai" value="<?php echo $pinjaman->tglgadai; ?>" required=""
                    class="form-control" placeholder="Masukkan tglgadai">
            </div>
            <div class="form-group">
                <strong>Tgl Pelunasan</strong>
                <input type="text" name="tglpelunasan" value="<?php echo $pinjaman->tglpelunasan; ?>" required=""
                    class="form-control" placeholder="Masukkan Tgl pelunasan">
            </div>
            <div class="form-group">
                <strong>Nominal pinjaman</strong>
                <input type="text" name="nominalpinjaman" value="<?php echo $pinjaman->nominalpinjaman; ?>" required=""
                    class="form-control" placeholder="Masukkan Nominal pinjaman">
            </div>
            <div class="form-group">
                <strong>Total pembayaran</strong>
                <input type="text" name="totalpembayaran" value="<?php echo $pinjaman->totalpembayaran; ?>" required=""
                    class="form-control" placeholder="Masukkan Total pembayaran">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>