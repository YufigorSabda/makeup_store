<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Ulasan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Tambah Ulasan</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email">
                </div>

                <div class="mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label><br>
                    <textarea class="form-control" name="ulasan" id="ulasan"></textarea>
                </div>
                <input name="tambah_ulasan" type="submit" class="btn btn-primary" value="Tambah">
                <a href="ulasan.php" type="button" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php

    // Buat kondisi jika tombol data di klik
    if (isset($_POST['tambah_ulasan'])) {
        // Membuat variable setiap field inputan agar kodingan lebih rapi.
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $ulasan = $_POST['ulasan'];

        // Membuat Query
        $query = "INSERT INTO ulasan (nama, email, ulasan) VALUES('$nama', '$email', '$ulasan')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location: ulasan.php");
        } else {
            echo "<script>alert('Ulasan Gagal di tambahkan!')</script>";
        }
    }

    ?>

</body>

</html>