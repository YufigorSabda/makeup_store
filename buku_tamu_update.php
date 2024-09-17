<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku Tamu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

    <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM buku_tamu WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach ($result as $data) {
    ?>

        <section class="row">
            <div class="col-md-6 offset-md-3 align-self-center">
                <h1 class="text-center mt-4">Form Update Data</h1>
                <form method="POST">
                    <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" name="nama" placeholder="Masukan Nama">
                    </div>

                    <div class="mb-3">
                        <label for="paket_diambil" class="form-label">Paket yang Diambil</label>
                        <input type="text" class="form-control" id="paket_diambil" value="<?= $data['paket_diambil'] ?>" name="paket_diambil" placeholder="Paket yang Diambil">
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <input type="text" class="form-control" id="hari" value="<?= $data['hari'] ?>" name="hari" placeholder="Hari">
                    </div>

                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="text" class="form-control" id="jam" value="<?= $data['jam'] ?>" name="jam" placeholder="Jam">
                    </div>
                    <input name="daftar" type="submit" class="btn btn-primary" value="Update">
                    <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
                </form>
            </div>
        </section>

    <?php } ?>

    <?php

    // Buat kondisi jika tombol data di klik
    if (isset($_POST['daftar'])) {
        // Membuat variable setiap field inputan agar kodingan lebih rapi.
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $paket_diambil = $_POST['paket_diambil'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];

        // Membuat Query
        $query = "UPDATE buku_tamu SET nama = '$nama', paket_diambil = '$paket_diambil', hari = '$hari' , jam = '$jam' WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location: buku_tamu.php");
        } else {
            echo "<script>alert('Data Gagal di update!')</script>";
        }
    }

    ?>

</body>

</html>