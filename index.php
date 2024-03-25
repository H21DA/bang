<?php
   session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Basis Data Lanjut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 20px;
    }

    h1 {
        color: #007bff;
    }

    .alert {
        margin-top: 20px;
    }

    .nav-pills {
        background-color: #343a40;
        border-radius: 5px;
        color: white;
    }

    .nav-pills .nav-link {
        color: white;
    }

    .nav-pills .nav-link.active {
        background-color: #007bff;
    }

    .tab-pane {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .edit {
        margin-right: 5px;
    }
    </style>
    <style>
    /* ... Gaya yang sudah ada ... */

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 15px;
        text-align: center;
        border: 1px solid #dee2e6;
        white-space: nowrap;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    td {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #e0e0e0;
    }
    </style>

</head>

<body>
    <div class="container">
        <h1 class='text-center mt-3 border-bottom'>Admin Pegadaian</h1>

        <?php
         if(isset($_SESSION['success'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
         }
         require 'config.php';
         $bank = $collection_nasabah->find([]);
         $pegawai = $collection_pegawai->find([]);
         $pipeline = [
            [
              '$lookup'=> [
                'from' => 'pegawai',
                'localField'=> 'pegawai_id',
                'foreignField'=> '_id',
                'as' => 'pegawai'
              ]
            ],
            [
              '$unwind'=> '$pegawai'
            ],
            [
              '$lookup'=> [
                'from' => 'nasabah',
                'localField'=> 'nasabah_id',
                'foreignField'=> '_id',
                'as'=> 'nasabah'
              ]
            ],
            [
              '$unwind'=> '$nasabah'
            ],
            [
              '$project'=> [
                '_id' => 1,
                'nama_nasabah' => '$nasabah.nama_nasabah',
                'nama_pegawai' => '$pegawai.nama',
                'tglgadai' => 1,
                'jenisgadai' => 1,
                'tglpelunasan' => 1,
                'totalpembayaran' => 1,
                'nominalpinjaman' => 1,
                ]
              ]
        ];
        
        try {
            $pinjamans = $collection_pinjaman->aggregate($pipeline);
         } catch (\Exception $e) {
            echo "Error executing aggregation: " . $e->getMessage();
         }
     
      ?>
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <!-- <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button> -->
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="true">Nasabah</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">Pegawai</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">pinjaman</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">
                    <table class="table table-borderd">
                        <a href="create.php" class="btn btn-primary">Tambah Data Nasabah</a>
                        <tr>
                            <th class='text-center'>No</th>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Nama_Nasabah</th>
                            <th class='text-center'>Telpon</th>
                            <th class='text-center'>Alamat</th>
                            <th class='text-center'>Jenis_Kelamin</th>
                            <th class='text-center'>Action</th>
                        </tr>

                        <?php
                     $i = 1;
                     foreach($bank as $gadai) {   
                        echo "<tr>";
                        echo "<td class='text-center'>".$i."</td>";
                        echo "<td class='text-center'>".$gadai->_id."</td>";
                        echo "<td class='text-center'>".$gadai->nama_nasabah."</td>";
                        echo "<td class='text-center'>".$gadai->telpon."</td>";
                        echo "<td class='text-center'>".$gadai->alamat."</td>";
                        echo "<td class='text-center'>".$gadai->jeniskelamin."</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=".$gadai->_id."' class='edit btn btn-primary'>Edit</a>";
                        echo "<a href='delete.php?id=".$gadai->_id."' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        $i++;
                     };
                  
                  ?>


                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                    tabindex="0">
                    <table class="table table-borderd">
                        <a href="create_pegawai.php" class="btn btn-primary">Tambah Data Pegawai</a>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">id </th>
                            <th class="text-center">Kartu_id</th>
                            <th class="text-center">Nama_Pegawai</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Hp</th>
                            <th class="text-center">Action</th>

                            <?php
                           $i = 1;
                           foreach ($pegawai as $pgw) {
                              echo "<tr>";
                              echo "<td class='text-center'>" . $i . "</td>";
                              echo "<td class='text-center'>" . $pgw->_id . "</td>";
                              echo "<td class='text-center'>" . $pgw->kartu_id . "</td>";
                              echo "<td class='text-center'>" . $pgw->nama . "</td>";
                              echo "<td class='text-center'>" . $pgw->alamat . "</td>";
                              echo "<td class='text-center'>" . $pgw->hp . "</td>";
                              echo "<td>";
                              echo "<a href='edit_pegawai.php?id=" . $pgw->_id . "' class='edit btn btn-primary'>Edit</a>";
                              echo "<a href='delete_pegawai.php?id=" . $pgw->_id . "' class='btn btn-danger'>Delete</a>";
                              echo "</td>";
                              echo "</tr>";
                              $i++;
                           }
                           ?>
                        </tr>


                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
                    tabindex="0">
                    <table class="table table-borderd">
                        <a href="create_pinjaman.php" class="btn btn-primary">Tambah Data Pinjaman</a>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">id</th>
                            <th class="text-center">Nama_Nasabah</th>
                            <th class="text-center">Nama_Pegawai</th>
                            <th class="text-center">Jenis_Gadai</th>
                            <th class="text-center">Tgl_Gadai</th>
                            <th class="text-center">Tgl_Pelunasan</th>
                            <th class="text-center">Nominal_Pinjaman</th>
                            <th class="text-center">Total_Pembayaran</th>
                            <th class="text-center">Action</th>
                        </tr>



                        <?php
                        $i = 1;
                        foreach($pinjamans as $pinjaman) {                     
                           echo "<tr>";
                           echo "<td class='text-center'>".$i."</td>";
                           echo "<td class='text-center'>".$pinjaman->_id."</td>";
                           echo "<td class='text-center'>".$pinjaman->nama_nasabah."</td>";
                           echo "<td class='text-center'>".$pinjaman->nama_pegawai."</td>";
                           echo "<td class='text-center'>".$pinjaman->jenisgadai."</td>";
                           echo "<td class='text-center'>".$pinjaman->tglgadai."</td>";
                           echo "<td class='text-center'>".$pinjaman->tglpelunasan."</td>";
                           echo "<td class='text-center'>".$pinjaman->nominalpinjaman."</td>";
                           echo "<td class='text-center'>".$pinjaman->totalpembayaran."</td>";
                           echo "<td>";
                           echo "<a href='edit_pinjaman.php?id=".$pinjaman->_id."' class='edit btn btn-primary'>Edit</a>";
                           echo "<a href='delete_pinjaman.php?id=".$pinjaman->_id."' class='btn btn-danger'>Delete</a>";
                           echo "</td>";
                           echo "</tr>";
                           $i++;
                        };
                     
                     ?>



                    </table>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
session_destroy();
?>