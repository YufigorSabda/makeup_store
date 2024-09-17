<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku Tamu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Tambah Buku Tamu</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama pelanggan">
                </div>
                <div class="mb-3">
                    <label for="paket_diambil" class="form-label">Paket yang Diambil</label>
                    <input type="text" class="form-control" id="paket_diambil" name="paket_diambil" placeholder="Paket yang Diambil">
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari">
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="text" class="form-control" id="jam" name="jam" placeholder="Jam">
                </div>

                <input name="tambah" type="submit" class="btn btn-primary" value="Tambah">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php

    // Buat kondisi jika tombol data di klik
    if (isset($_POST['tambah'])) {
        // Membuat variable setiap field inputan agar kodingan lebih rapi.
        $nama = $_POST['nama'];
        $paket_diambil = $_POST['paket_diambil'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];

        // Membuat Query
        $query = "INSERT INTO buku_tamu (nama, paket_diambil, hari, jam ) VALUES('$nama', '$paket_diambil', '$hari', '$jam')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location: buku_tamu.php");
        } else {
            echo "<script>alert('Data Gagal di tambahkan!')</script>";
        }
    }

    ?>

</body>

</html>